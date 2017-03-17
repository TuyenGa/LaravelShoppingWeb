<?php
/**
 * Created by PhpStorm.
 * User: phuon
 * Date: 2/27/2017
 * Time: 11:22 PM
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }
}