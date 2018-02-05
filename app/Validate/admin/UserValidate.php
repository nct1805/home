<?php
namespace App\Validate\admin;
class UserValidate extends BaseValidate
{

    public function rules(){
        $rules = [
            'email'=>'required|min:3|max:128|email',
            'password'=>'required|min:6|max:32'
        ];
        return $rules;
    }
}