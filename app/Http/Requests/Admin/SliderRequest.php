<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        switch($this->method()) {
            case "POST":
                return [
                    'title_ar' => 'nullable|max:255',
                    'title_en' => 'nullable|max:255',
                    'path' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048',
                ];

            case "PUT":
            case "PATCH":
                return [
                    'title_ar' => 'nullable|max:255',
                    'title_en' => 'nullable|max:255',
                    'path' => 'image|mimes:png,jpg,jpeg,gif|max:2048',
                ];
        }
    }
}
