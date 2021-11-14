<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'title' => ['required', 'max:255'],
            'category_id' => ['required', 'integer'],
            'content' => ['required', 'min:10'],
            'quantity' => ['required', 'integer', 'min:1'],
            'price' => ['required'],
            'old_price' => ['present'],
            'status' => ['digits_between:0,1'],
            'description' => ['required', 'min:10'],
            'images' => ['image', 'mimes:jpeg,bmp,png,jpg', 'max:2048'],
            'hit' => ['digits_between:0,1'],
            'related' => ['present'],
            'imgages' => ['nullable'],
        ];
    }
}
