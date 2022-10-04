<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
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
     * @return array<string, mixed>
     */
    public function rules()
    { 
        return [
            'name'=>'required|min:2|max:255',
            'password'=>'required',
            'email'=>'required',
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'A title is required',
        'password.required' => 'A message is required',
    ];
}


}
