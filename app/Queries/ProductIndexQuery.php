<?php


namespace App\Queries;





use App\Models\Products\Product;
use Spatie\QueryBuilder\QueryBuilder;

class ProductIndexQuery extends QueryBuilder
{
    public function __construct()
    {
        $subject = Product::query()->orderBy('created_at','desc');

        parent::__construct($subject);
    }
}
