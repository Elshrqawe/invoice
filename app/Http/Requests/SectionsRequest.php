<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionsRequest extends FormRequest
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
            'section_name' => 'required|unique:sections,section_name->ar,'.$this->id,
            'section_name_en' => 'required|unique:sections,section_name->en,'.$this->id,
        ];
    }
    public function messages()
    {
        return [
            'section_name.required' =>'لا يمكن ترك هذه الخانه فارغه',
            'section_name.unique' => 'هذا القسم موجود بلفعل',
            'section_name_en.required' =>'لا يمكن ترك هذه الخانه فارغه',
            'section_name_en.unique' => 'هذا القسم موجود بلفعل',
        ];
    }
}
