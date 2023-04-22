<?php


namespace App\Actions\Products;


use App\DataTransferObjects\Products\CreateProductData;
use App\Models\Products\Product;
use Illuminate\Support\Carbon;

class CreateProductAction
{
    public function __invoke(CreateProductData $data) : Product
    {
        $product = Product::create([
            'name' => $data->name,
            'category_id' => $data->category_id,
            'description' => $data->description,
            'date_and_time' => Carbon::parse($data->dateTime),
        ]);

        return $product->refresh();
    }
}
