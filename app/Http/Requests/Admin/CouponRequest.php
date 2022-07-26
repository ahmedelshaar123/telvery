<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'num_users' => 'nullable|numeric|min:1',
            'expiry_date' => 'nullable|date|after:today|required_without:num_users',
            'code' => 'required|unique:coupons,code',
            'discount' => 'required|numeric|min:0.01|max:0.99',
            'brand_id' => 'nullable|exists:brands,id',
        ];
    }
}
