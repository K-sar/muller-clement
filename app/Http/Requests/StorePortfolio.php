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
            'name' => ['required', Rule::unique('Portfolios')->ignore($this->request->get('name'), 'name'), 'max:255'],
            'slug' => [Rule::unique('portfolios')->ignore($this->request->get('slug'), 'slug'), 'max:255'],
            'description' => 'required',
            'link' => ['required', Rule::unique('Portfolios')->ignore($this->request->get('link'), 'link')],
        ];
    }
}
