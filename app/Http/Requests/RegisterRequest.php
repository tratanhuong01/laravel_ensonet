<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }
    public function rules()
    {
        return [
            'firstName' => array(
                'required',
                'regex:/^([a-zA-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'
            ),
            'lastName' => array(
                'required',
                'regex:/^([a-zA-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'
            ),
            'emailOrPhone' => 'required', 
            'emailAgain' => 'required',  
            'passWord'  => 'required'
        ];
    }
    public function messages()
    {
        return [
            'firstName.required' => 'Họ không được để trống!',
            'lastName.required' => 'Tên không được để trống!',
            'emailOrPhone.required' => 'Email hoặc số điện thoại không được để trống!',
            'emailAgain.required' => 'Email không được để trống!',
            'passWord.required' => 'Mật khẩu không được để trống!',
            'firstName.required' => 'Họ không được để trống!',
            'lastName.required' => 'Tên không được để trống!',
            'firstName.regex' => 'Họ không đúng định dạng!',
            'lastName.regex' => 'Tên không đúng định dạng!',
        ];
    }
}
