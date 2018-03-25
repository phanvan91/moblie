<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|unique:users,email',
            'pass' => 'required',
            'repass' => 'required|same:pass',
        ];
    }
    public function messages(){
      return [
        'name.required' => 'Vui lòng không được để trống Tên',
        'email.required' =>'Vui lòng không được để trống Email',
        'pass.required' => 'Vui lòng không để trống password',
        'repass.required' =>'Vui lòng không để trống password',
        'repass.same' => '2 password phải giống nhau'
      ];
    }
}
