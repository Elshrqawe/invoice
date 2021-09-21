<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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

            'section_id' => 'required',
            'product_name' => 'required|unique:sections,section_name->ar,'.$this->id,
            'product_name_en' => 'required|unique:sections,section_name->en,'.$this->id,
        ];
    }
    public function messages()
    {
        return [
            'product_name.required' =>'لا يمكن ترك اسم المنتج AR فارغه',
            'product_name.unique' => ' هذا المنتج موجود بلفعل بلغه العربيه',
            'product_name_en.required' =>'لا يمكن ترك اسم المنتج EN فارغه',
            'product_name_en.unique' => 'هذا المنج موجود بلفعل  بلغه الانجليزيه',
            'section_id.required' => 'يجب تحديد القسم',
        ];
    }
}
