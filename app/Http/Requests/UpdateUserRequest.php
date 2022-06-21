<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user),
            ],
            'phone' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('users')->ignore($this->user),
            ],
            'profile_photo_path' => 'nullable|image|mimes:bpm,gif,jpeg,jpg,jpe,png,svg,svgz|max:2048',
            'roles' => 'required|array',
        ];
    }
}
