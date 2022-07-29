<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            case "POST":
                return [
                    'name_ar' => 'required|max:255',
                    'name_en' => 'required|max:255',
                    'specification_ar' => 'required',
                    'specification_en' => 'required',
                    'detail_ar' => 'required',
                    'detail_en' => 'required',
                    'price_before' => 'required|numeric|gt:price_after',
                    'price_after' => 'nullable|numeric|lt:price_before',
                    'sku' => 'nullable|max:255',
                    'in_Stock' => 'required|numeric|min:1',
                    'video_url' => 'nullable|url|max:255',
                    'category_id' => 'required|exists:categories,id',
                    'brand_id' => 'nullable|exists:brands,id',
                    'color' => 'required',
                    'paths' => 'required|array',
                    'paths.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
                    '3d' => 'required|array',
                    '3d.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
                    'delivery_cost' => 'required|array',
                    'delivery_cost.*' => 'numeric',
                    'governorate_id' => 'required|array',
                    'governorate_id.*' => 'exists:governorates,id',
                ];
            case "PUT":
            case "PATCH":
                return [
                    'name_ar' => 'required|max:255',
                    'name_en' => 'required|max:255',
                    'specification_ar' => 'required',
                    'specification_en' => 'required',
                    'detail_ar' => 'required',
                    'detail_en' => 'required',
                    'price_before' => 'required|numeric|gt:price_after',
                    'price_after' => 'nullable|numeric|lt:price_before',
                    'sku' => 'nullable|max:255',
                    'in_Stock' => 'required|numeric|min:1',
                    'video_url' => 'nullable|url|max:255',
                    'category_id' => 'required|exists:categories,id',
                    'brand_id' => 'nullable|exists:brands,id',
                    'color' => 'required',
                    'paths' => 'array',
                    'paths.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
                    '3d' => 'array',
                    '3d.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
                    'delivery_cost' => 'required|array',
                    'delivery_cost.*' => 'numeric',
                    'governorate_id' => 'required|array',
                    'governorate_id.*' => 'exists:governorates,id',
                ];
        }
    }
}
