<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PaymentMethodRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'name_ar' => 'required|max:20|unique:payment_methods,name_ar',
                    'name_en' => 'required|max:20|unique:payment_methods,name_en',
                ];
            case 'PUT':
            case 'PATCH':
                $id = $this->route("payment_method");
                return [
                    'name_ar' => 'required|max:20|unique:payment_methods,name_ar,' . $id,
                    'name_en' => 'required|max:20|unique:payment_methods,name_en,' . $id,
                ];
        }
    }
}
