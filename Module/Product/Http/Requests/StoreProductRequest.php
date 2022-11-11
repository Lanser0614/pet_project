<?php
declare(strict_types=1);

namespace Module\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'description' => ['required','string'],
            'price' => ['required','integer'],
            'cover_img' => ['required','string'],
            'shop_id' => ['required','integer'],
            'product_attributes' => ['required','array'],
            'real_price' => ['required','integer'],
        ];
    }

}
