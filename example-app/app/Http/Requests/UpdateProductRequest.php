<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>[ 'required', Rule::unique('products')->ignore($this->product), 'max:100'],
            'price'=>['required', 'numeric', 'integer', 'min:0'],
            'category'=>['required', 'exists:categories,id'],
            'desc'=>['required'],
            'image'=> ['mimes:png,jpg, bmp']
        ];
    }

    public function messages(){
        return[
            'name.required'=>'tên sản phẩm không được bỏ trống',
            'name.unique'=>'tên sản phẩm đã tồn tại',
            'name.max'=>'tên sản phẩm không được quá 100 ký tự',

            'price.required'=>'giá sản phẩm không được bỏ trống',
            'price.numeric'=>'giá sản phẩm là kiểu số',
            'price.integer'=>'giá sản phẩm là số nguyên',
            'price.min'=>'giá sản phẩm không được nhỏ hơn 0',

            'category.required'=>'loại sản phẩm không được bỏ trống',
            'category.exists'=>'id không tồn tại',

            'desc.required'=>'mô tả sản phẩm không được bỏ trống',


            'image.mimes'=>'file không hợp lệ'
        ];
    }
}
