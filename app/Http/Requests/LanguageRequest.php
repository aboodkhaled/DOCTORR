<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
            'abbr' => 'required|string|max:191',
            //'active' => 'required|in:1',
            'direction' => 'required|in:ltr,rtl',
        ];
    }

    public function messages()
    {
        return [
            'requierd' => 'هذا الحقل مطلوب',
            'in' => 'القيمة غير صحيحة',
            'name.string' => 'أسم اللغة يجب أن يكون أحرف وليس ارقام',
            'name.max' => 'أسم اللغة يجب أن لا يزيد عن 191 حرف',
            'abbr.string' => 'أختصار اللغة يجب أن يكون أحرف وليس ارقام',
            'abbr.max' => 'أختصار اللغة يجب أن لا يزيد عن 191 حرف',
            
        ];
    }
}
