<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Serve3Request extends FormRequest
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
           
            'name' => 'required|string|max:191',
            
            'price' => 'required',
            'thin_price' => 'required',
            'think' => 'required',
            'total' => 'required'
           
           
            
        ];
    }

    public function messages()
    {
        return [
            'requierd' => 'هذا الحقل مطلوب',
            
            'name.string' => 'أسم ألطبيب يجب أن يكون أحرف وليس ارقام',
            
            'max' => '  يجب أن لا يزيد عن 191 حرف'
            
            
        ];
    }

}
