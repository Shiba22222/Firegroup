<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
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
            'description' => 'max:600',
            'image' => 'image|max:2048|mimes:jpg,png,gif,jpeg'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'description.max' => 'Mô tả không được quá 600 chữ',
            'image.image' => 'Tệp tải lên phải là hình ảnh',
            'image.max' => 'Không được quá 2MB',
            'image.mimes' => 'Không đúng định dạng ảnh.Định dạng đúng là: jpg, png, gif, jpeg'
        ];
    }
}
