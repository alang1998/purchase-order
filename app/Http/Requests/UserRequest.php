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
        if ($this->_method == 'put') {
            $check =  'mimes:jpg,png,jpeg';
        } else {
            $check =  'required|mimes:jpg,png,jpeg';
        }
        return [
            'name' => 'required',
            'username' => 'required|unique:users,username,'.optional($this->user)->id,
            'role_id' => 'required',
            'signature' => $check
        ];
    }
}
