<?php

namespace App\Modules\ProductTechnicalCharacteristic\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductTechnicalCharacteristicRequest extends FormRequest
{

    /**
     * Determine if the ProductTechnicalCharacteristic is authorized to make this request.
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
            'characteristic_value' => ['required'],
            'tech_char_id'=>['required'],
            'product_id'=>['required']
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
            'characteristic_value.required' => 'characteristic_value Field is Required',
            'tech_char_id.required' => 'tech_char Field is Required',
            'product_id'=>'product_id Field is Required'
        ];
    }
}
