<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required'
        ];
    }
    /**
     * Description: 
     * Method that get the credentials of the user trying to log in, and confirm if
     * it's an email instead to get logged in anyway if it match with the user password.
     * @return  array[]
     */
    public function getCredentials(){
        $username = $this->get('username');
        if($this->isEmail($username)){
            return [
                'email' => $username,
                'password' => $this->get('password')    
            ];
        }
        return $this->only('username', 'password');
    }
    /**
     * Description: 
     * Method that get the value of the username, and compare if it's and email.
     * If it's an email, return a new key-value pair with the email instead of the username.
     * @param   string  $value
     * @return  boolean 
     */
    public function isEmail($value){
        $factory = $this->container->make(ValidationFactory::class);
        return !$factory->make(['username' => $value], ['username' => 'email'])->fails();
    }
}
