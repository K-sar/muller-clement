<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBase extends FormRequest
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
            'name' => ['required', Rule::unique('folders')->ignore($this->request->get('name'), 'name'), 'max:255'],
            'link' => 'required|max:255',
            'miniature' => 'max:255',
            'ordre' => 'numeric',
            'description' => 'required',
        ];
    }
}
