<?php
declare(strict_types=1);

namespace Module\Shop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShopRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'long' => ['required', 'string'],
            'lat' => ['required', 'string'],
        ];
    }
}
