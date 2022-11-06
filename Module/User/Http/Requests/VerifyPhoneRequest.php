<?php
declare(strict_types=1);

namespace Module\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyPhoneRequest extends FormRequest
{
    public function rules(): array
    {
        return  [
            'phone' => ['required', 'integer'],
            'code' => ['required', 'integer'],
        ];
    }
}
