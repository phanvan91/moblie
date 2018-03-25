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
            'name' => 'required',
            'danhmuc' => 'required',
            'priceold' => 'required',
            'mota' =>'required',
            'content' => 'required',
            'image' => 'required|image'
        ];
    }
    public function messages(){
      return [
        'name.required' => 'Vui lòng không được để trống tên sản phẩm',
        'danhmuc.required' => 'Vui lòng Không được để trống danh mục',
        'priceold.required' => 'Vui lòng không để trống giá',
        'mota.required' => 'Vui lòng không để trống mô tả',
        'content.required' => 'Vui lòng không để trống nội dung',
        'image.required' => 'Vui lòng không để trống hình ảnh',
        'image.image'=>'File này không phải file ảnh'
      ];
    }
}
