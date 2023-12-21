<?php

namespace App\Modules\Workarea\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreWorkareaRequest extends FormRequest
{

    /**
     * Determine if the Workarea is authorized to make this request.
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
            'name' => ['required','unique:workareas'],
            'catalog_id' => ['required','unique:workareas']
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
            'catalog_id.required' => 'catalog is required'
        ];
    }
}
