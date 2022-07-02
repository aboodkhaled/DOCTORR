<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Hdoctor_serveRequest extends FormRequest
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
           
            
            'hserve_id' => 'required|exists:hserves,id',
            'hdoctor_id' => 'required|exists:hdoctors,id',
            'price' =>     'required' 
        ];
    }

    public function messages()
    {
        return [
            
            
            'requierd' => 'هذا الحقل مطلوب',
            'hdoctor_id.exists' => 'ألطبيب هذا غير موجود',
            'hserve_id.exists' => 'ألخدمة هذا غير موجود'
            
            
        ];
    }

}
