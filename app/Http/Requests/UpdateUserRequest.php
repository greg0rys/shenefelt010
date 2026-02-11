<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'company_id' => 'required|exists:companies,id',
            'first_name' => ['required'],
            'last_name' => ['required'],
            'full_name' => ['required'],
            'system_role' => ['required'],

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
