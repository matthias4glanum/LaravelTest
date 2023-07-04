<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePostRequest extends FormRequest
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
            'slug' => ['required', 'regex:/^[0-9a-z\-]+$/', Rule::unique('posts')], // $this->post est le post appelé dans edit et permet d'ignorer l'erreur le slug est déjà utilisé
            'content' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('Le champ titre est obligatoire'),
            'title.min' => __('Le champ titre doit faire au minimum 8 caractères'),
            'content.required' => __('Le champ description est obligatoire'),
            'slug.unique' => __('le slug est déjà utilisé'),
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->input('slug') ?: Str::slug($this->input('title'))
        ]);
    }
}
