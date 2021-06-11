<?php

namespace App\Http\Validation;


class registerValidators
{
    public function rules()
    {
        return [
            'nom' => ['required', 'string', 'max:150', 'min:3'],
            'prenom' => ['required', 'string', 'max:150', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:150', 'min:3', 'unique:users'],
            'adresse' => ['required', 'string', 'max:150', 'min:3'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Vous devez spécifier votre nom',
            'email.required' => 'Vous devez spécifier votre email',
            'email.unique' => 'Cet email est déjà utilisé',
            'password.min' => 'Votre mot de passe doit faire au minimum 8 caractères',
            'confirm_password.same' => 'Votre mot de passe et votre mot de passe de confirmation doivent être identiques'

        ];
    }
}
