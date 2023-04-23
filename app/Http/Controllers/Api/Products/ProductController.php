<?php

namespace App\Http\Controllers\Api\Products;

use App\Actions\Products\CreateProductAction;
use App\Actions\Products\UpdateProductAction;
use App\DataTransferObjects\Products\CreateProductData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\CreateProductFormRequest;
use App\Http\Requests\Products\UpdateProductFormRequest;
use App\Http\Resources\Categories\CategoryCollection;
use App\Http\Resources\Products\ProductCollection;
use App\Models\Categories\Category;
use App\Models\Products\Product;
use App\Queries\ProductIndexQuery;
use App\ViewModels\Products\ProductFormViewModel;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index(ProductIndexQuery $query) : Response
    {
        // Retrieve the tasks from the database using the provided query object.
        $product = $query->allowedFilters(['name', 'description','category'])
            ->when(\Illuminate\Support\Facades\Request::input('category'),function ($query,$category){
                $query->where('category_id', $category);
            })
            ->when(\Illuminate\Support\Facades\Request::input('search'),function ($query,$search){
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->orderBy('date_and_time','desc')
            ->paginate(15)
            ->withQueryString();

        // Render the task index view.
        return Inertia::render('Product/Index',[
            'products' => new ProductCollection($product),
            'categories' => new CategoryCollection(Category::all()),
            'filters' => \Illuminate\Support\Facades\Request::only(['search','category'])
        ]);
    }

    public function create() : Response
    {
        // Render the task create view.
        return Inertia::render('Product/Create',[
            'categories' => new CategoryCollection(Category::all()),
        ]);
    }

    public function store(CreateProductFormRequest $request,CreateProductAction $createProductAction)
    {
        $data = CreateProductData::fromRequest($request);

        ($createProductAction)($data);

        return redirect(route('products.index'));
    }

    public function show(string $id)
    {
        return Inertia::render('Product/Edit');
    }

    public function edit(Product $product) : Response
    {
        // Render the task edit form view.
        return Inertia::render('Product/Edit',[
            'data' => new ProductFormViewModel($product)
        ]);
    }

    public function update(Product $product,UpdateProductFormRequest $request, UpdateProductAction $updateProductAction)
    {
        $data = CreateProductData::fromRequest($request);

        ($updateProductAction)($product,$data);

        return redirect(route('products.index'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
    }
}
