<?php
declare(strict_types=1);

namespace Module\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return  [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ];
    }
}
