<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'address' => 'nullable|max:255',
            'title' => 'nullable|max:255',
            'footer_desc' => 'nullable|max:255',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'google_url' => 'nullable|url',
            'email' => 'nullable|email',
            'phone' => 'nullable|digits_between:10,12',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
        ];
    }
}
