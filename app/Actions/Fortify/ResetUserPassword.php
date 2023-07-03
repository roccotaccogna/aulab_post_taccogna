<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

class ResetUserPassword implements ResetsUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and reset the user's forgotten password.
     *
     * @param  array<string, string>  $input
     */
    public function reset(User $user, array $input): void
    {
        Validator::make($input, [

            $messages = [
                'password.required' => 'La Password è richiesta',
                'password.min:8' => 'Minimo 8 caratteri',
                'password.regex' => 'Deve contenere almeno una lettera maiuscola, un carattere speciale e un numero',
                'password_confirmation.required' => 'La Password deve essere confermata',
                'password_confirmation.min:8' => 'Minimo 8 caratteri',
                'password_confirmation.regex' => 'Deve contenere almeno una lettera maiuscola, un carattere speciale e un numero'

            ],

            // 'password' => $this->passwordRules(),
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],

            'password_confirmation' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ]
        ],$messages)->validate();

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}
