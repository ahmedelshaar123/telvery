<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
                    'name_ar'=>'required|max:255',
                    'name_en'=>'required|max:255',
                    'job_ar'=>'required|max:255',
                    'job_en'=>'required|max:255',
                    'path' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048',
                    'desc_ar'=>'required',
                    'desc_en'=>'required',
                ];
            case "PUT":
            case "PATCH":
                return [
                    'name_ar'=>'required|max:255',
                    'name_en'=>'required|max:255',
                    'job_ar'=>'required|max:255',
                    'job_en'=>'required|max:255',
                    'path' => 'image|mimes:png,jpg,jpeg,gif|max:2048',
                    'desc_ar'=>'required',
                    'desc_en'=>'required',
                ];
        }
    }
}
