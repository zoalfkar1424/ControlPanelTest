<?php

namespace App\Modules\TechnicalCharacteristic\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTechnicalCharacteristicRequest extends FormRequest
{

    /**
     * Determine if the TechnicalCharacteristic is authorized to make this request.
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
            'name' => ['required'],
            'catalog_id'=>['required'],
            'category'=>['required']
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'name is Required',
            'catalog_id.required'=> 'catalog_id is Required',
            'category.required'=>'category is required'
        ];
    }
}
