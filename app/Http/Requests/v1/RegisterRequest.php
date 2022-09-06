<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::guest();
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'phone' => ['required', 'numeric', 'min:11', 'max:11',
                Rule::unique('users', 'phone')
                    ->whereNull('deleted_at')
            ],
            'email' => ['required', 'email',
                Rule::unique('users', 'email')
                    ->whereNull('deleted_at')],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
