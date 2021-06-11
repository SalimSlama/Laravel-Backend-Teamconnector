<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'email' => 'required|email',
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'password' => 'required|confirmed|min:6',


        ];
    }
    
public function messages() {
    return [
    'name.required' => 'Vous devez spécifier votre nom',
    'email.required' => 'Vous devez spécifier votre email',
    'email.unique' => 'Cet email est déjà utilisé',
    'password.min' => 'Votre mot de passe doit faire au minimum 8 caractères',
    'confirm_password.same' => 'Votre mot de passe et votre mot de passe de confirmation doivent être identiques'
    
    ];
    }
}
