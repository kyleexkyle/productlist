<?php


namespace App\Actions\Products;


use App\DataTransferObjects\Products\CreateProductData;
use App\Models\Products\Product;

class UpdateProductAction
{
    public function __invoke(Product $product, CreateProductData $data) : Product
    {
        $product->name = $data->name;
        $product->category_id = $data->category_id;
        $product->description = $data->description;
        $product->date_and_time = $data->dateTime;

        $product->save();

        return $product->refresh();
    }
}
