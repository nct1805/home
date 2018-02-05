<?php
namespace App\Validate\admin;
use Illuminate\Foundation\Http\FormRequest;
class LoginValidate extends FormRequest
{
    public function authorize(){
        return true;
    }
    public function rules(){
        $rules = [
            'email'=>'required|min:3|max:128|email',
            'password'=>'required|min:6|max:32'
        ];
        return $rules;
    }
}