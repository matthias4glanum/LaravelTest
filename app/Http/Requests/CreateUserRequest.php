<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'email' => ['required', 'email', 'string'],
            'type' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => __('Le champ nom est obligatoire'),
            'lastname.required' => __('Le champ prénom est obligatoire'),
            'email.unique' => __('Cet email est déjà utilisé'),
            'email.required' => __('Le champ email est obligatoire'),
        ];
    }
}
