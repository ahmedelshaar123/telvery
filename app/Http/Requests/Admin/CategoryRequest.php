<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                    'name_ar' => 'required|max:50',
                    'name_en' => 'required|max:50',
                ];
            case 'PUT':
            case 'PATCH':
                $id = $this->route("category");
                return [
                    'name_ar' => 'required|max:50,' . $id,
                    'name_en' => 'required|max:50,' . $id,
                ];
        }
    }
}
