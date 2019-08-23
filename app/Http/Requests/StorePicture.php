<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


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
            'name' => ['required', Rule::unique('pictures')->ignore($this->request->get('name'), 'name'), 'max:255'],
            'access' => 'required|numeric',
            'ordre' => 'nullable|numeric',
            'info' => 'max:255',
            'alternative' => 'required|max:64',

        ];
    }
}