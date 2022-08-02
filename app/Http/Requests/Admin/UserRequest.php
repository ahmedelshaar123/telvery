<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            case 'Post':
                return [
                    'name'=>'required|unique:users,name',
                    'email'=>'required|unique:users,email',
                    'password'=>'required|min:6|max:20|confirmed',
                    'phone'=>'nullable|unique:users,phone|digits_between:10,12',
                    'address'=>'nullable|max:255',
                    'desc_ar'=>'nullable',
                    'desc_en'=>'nullable',
                    'facebook_url' => 'nullable|url|max:255',
                    'twitter_url' => 'nullable|url|max:255',
                    'google_url' => 'nullable|url|max:255',
                    'instagram_url' => 'nullable|url|max:255',
                    'company_name' => 'nullable|max:255',
                    'company_age' => 'nullable|date',
                    'category_id' => 'nullable|exists:categories,id',
                    'path'=>'required|image|mimes:png,jpg,jpeg,gif|max:2048',
                    'paths'=>'array',
                    'paths.*'=>'image|mimes:png,jpg,jpeg,gif|max:2048',
                    'permissions'=>'required|array'
                ];
            case 'PUT':
            case 'PATCH':
                $id = $this->route("user");
                return [
                    'name'=>'required|unique:users,name,' . $id,
                    'email'=>'required|unique:users,email,' . $id,
                    'password'=>'nullable|min:6|max:20|confirmed',
                    'phone'=>'nullable|unique:users,phone|digits_between:10,12,' . $id,
                    'address'=>'nullable|max:255',
                    'desc_ar'=>'nullable',
                    'desc_en'=>'nullable',
                    'facebook_url' => 'nullable|url|max:255',
                    'twitter_url' => 'nullable|url|max:255',
                    'google_url' => 'nullable|url|max:255',
                    'instagram_url' => 'nullable|url|max:255',
                    'company_name' => 'nullable|max:255',
                    'company_age' => 'nullable|date',
                    'category_id' => 'nullable|exists:categories,id',
                    'path'=>'image|mimes:png,jpg,jpeg,gif|max:2048',
                    'paths'=>'array',
                    'paths.*'=>'image|mimes:png,jpg,jpeg,gif|max:2048',
                    'permissions'=>'array'
                ];
        }
    }
}
