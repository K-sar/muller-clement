<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePicture extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'folder_id' => 'required|numeric',
            'access' => 'required|numeric',
            'link' => 'required',
            'info' => 'required|max:255',
            'alternative' => 'required|max:64',
            'slug' => 'required|unique:pictures|max:255',
        ];
    }
}