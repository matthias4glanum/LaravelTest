<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => ['required', 'min:8'],
            'content' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('Le champ titre est obligatoire'),
            'title.min' => __('Le champ titre doit faire au minimum 8 caractères'),
            'content.required' => __('Le champ description est obligatoire'),
        ];
    }
}
