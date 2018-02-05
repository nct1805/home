<?php
namespace App\Validate\admin;
use Illuminate\Foundation\Http\FormRequest;


class BaseValidate extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules(){
        return [];
    }
}