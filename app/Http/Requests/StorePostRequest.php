<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts',
            'thumbnail' => 'image|mimes:bpm,gif,jpeg,jpg,jpe,png,svg,svgz|max:2048',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
