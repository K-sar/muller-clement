<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreXp extends FormRequest
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
            'year' => 'required|max:255',
            'exp_title' => 'max:255',
            'exp_link' => 'max:255',
            'for_title' => 'max:255',
            'for_link' => 'max:255',
        ];
    }
}
