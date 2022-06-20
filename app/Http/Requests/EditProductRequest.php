<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'name' => 'required',
            'title' => 'required|max:255',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'max:600',
            'image' => 'image|max:2048|mimes:jpg,jpeg,png,gif'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được bỏ trống',
            'title.required' => 'Tiêu đề không được bỏ trống',
            'title.max' => 'Tiêu đề không được quá 255 chữ',
            'price.required' => 'Giá không được để trống',
            'description.max' => 'Mô tả không được quá 600 chữ',
            'image.image' => 'Phải là hình ảnh',
            'image.max' => 'Không quá 2MB'
        ];
    }
}
