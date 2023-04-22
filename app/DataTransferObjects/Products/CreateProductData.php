<?php


namespace App\DataTransferObjects\Products;


use Illuminate\Foundation\Http\FormRequest;
use Spatie\LaravelData\Data;

class CreateProductData extends Data
{
    public function __construct(
        public string $name,
        public int $category_id,
        public string $description,
        public string $dateTime,
    ){}

    public static function fromRequest(FormRequest $request) : static
    {
        return new self(
            $request->input('name'),
            $request->input('category'),
            $request->input('description'),
            $request->input('dateTime'),
        );
    }
}
