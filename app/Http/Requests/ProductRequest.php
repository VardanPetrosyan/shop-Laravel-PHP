<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' => 'required|min:1|max:250|unique:products,name',
            'img' => 'required',
            'product_description' => 'required|min:5|max:250',
            'price'=> 'required|min:1|max:250',
        ];
    }
}
