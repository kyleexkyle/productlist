<?php


namespace App\ViewModels\Products;


use App\Http\Resources\Categories\CategoryCollection;
use App\Http\Resources\Products\ProductResource;
use App\Models\Categories\Category;
use App\Models\Products\Product;
use Spatie\ViewModels\ViewModel;

class ProductFormViewModel extends ViewModel
{
    public function __construct(public ?Product $product = null)
    {
        $this->product = $this->product ?? new Product();
    }

    public function product() : ProductResource
    {
        return new ProductResource($this->product);
    }

    public function productCategories() : CategoryCollection
    {
        return new CategoryCollection(Category::all());
    }
}
