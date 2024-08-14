<?php

namespace App\Http\Requests\auth\posts;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'file' => ['required', 'image', 'mimes:png,jpg,jpeg,htm,webp'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:3000'],
            'status' => ['required', 'integer', 'max:255'],
            'category' => ['required', 'integer', 'max:255'],
            'tags' => ['required', 'array'],
            'tags.*' => ['required', 'string', 'max:255']
        ];
    }
}
