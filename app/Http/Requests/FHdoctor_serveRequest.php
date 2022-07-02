<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FHdoctor_serveRequest extends FormRequest
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
           
            
            'fserve_id' => 'required|exists:fserves,id',
            'fdoctor_id' => 'required|exists:fdoctors,id',
            'price' =>     'required' 
        ];
    }

    public function messages()
    {
        return [
            
            
            'requierd' => 'هذا الحقل مطلوب',
            'fdoctor_id.exists' => 'ألطبيب هذا غير موجود',
            'fserve_id.exists' => 'ألخدمة هذا غير موجود'
            
            
        ];
    }

}
