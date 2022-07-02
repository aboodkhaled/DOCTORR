<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HdepartmentRequest extends FormRequest
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
            'photo' => 'required_without:id|mimes:jpg,jpeg,png',
            'dept_name' => 'required|string|max:191',
            
            'dept_des' => 'required_without:id|'
        ];
    }

    public function messages()
    {
        return [
            'requierd' => 'هذا الحقل مطلوب',
            
            'dept_name.string' => 'أسم ألقسم يجب أن يكون أحرف وليس ارقام',
            
            'max' => '  يجب أن لا يزيد عن 191 حرف',
            
            'photo.required_without' => 'ألصورة مطلوبة'
            
        ];
    }


}
