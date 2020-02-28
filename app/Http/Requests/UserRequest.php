<?php

namespace App\Http\Requests;

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
        return [
            'email' => 'required|email|min:3|max:50|unique:users,email,'.$this->id,
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:1999',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => trans('setting.name_required'),
            'name.min' => trans('setting.name_min'),
            'name.max' => trans('setting.name_max'),
        ];
    }
}
