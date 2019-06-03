<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePortfolio extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('Portfolio')->ignore($this->request->get('name'), 'name'), 'max:255'],
            'picture' => 'required',
            'link' => [Rule::unique('Portfolio')->ignore($this->request->get('link'), 'link')],
        ];
    }
}
