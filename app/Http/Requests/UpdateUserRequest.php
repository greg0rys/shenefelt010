<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'company_id' => 'required|exists:companies,id',
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'full_name' => ['required', 'string', 'max:255'],
            'system_role' => ['required', 'string', 'max:255'],

        ];
    }

    public function authorize(): bool
    {
        // verify logged-in users ability make update request.
        if(Auth::check() && Auth::user()->is_editor)
            return true;
        elseif (Auth::check() && Auth::user()->is_admin)
            return true;

        return false; // no ability to make an update request - reject
    }
}
