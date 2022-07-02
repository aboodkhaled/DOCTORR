<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServeRequest extends FormRequest
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
           
            'serv_name' => 'required|string|max:191',
            
            
           
           
            
        ];
    }

    public function messages()
    {
        return [
            'requierd' => 'هذا الحقل مطلوب',
            
            'serv_name.string' => 'أسم ألمعمل يجب أن يكون أحرف وليس ارقام',
            
            
            'max' => '  يجب أن لا يزيد عن 191 حرف'
            
            
        ];
    }

}
