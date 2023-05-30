<?php

namespace App\Actions\Fortify;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Detail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [

            $messages = [
                'email.required' => 'Devi inserire il tuo indirizzo Email',
                'name.required' => 'Devi inserire il tuo Username',
                'firstName.required' => 'Devi inserire il tuo Nome',
                'firstName.alpha' => 'Il nome può contenere solo lettere',
                'surname.required' => 'Devi inserire il tuo Cognome',
                'surname.alpha' => 'Il cognome può contenere solo lettere',
                'city.required' => 'Devi inserire il nome della tua Città',
                'city.alpha' => 'Il nome della tua Città può contenere solo lettere',
                'dateBirth.required' => 'Devi inserire la tua data di nascita',
                'dateBirth.date' => 'Devi inserire una data',
                'dateBirth.before' => 'Devi avere 18 anni',
                'password.required' => 'La Password è richiesta',
                'password.min:8' => 'Minimo 8 caratteri',
                'password.regex' => 'Deve contenere almeno una lettera maiuscola, un carattere speciale e un numero'

            ],


            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
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
            'firstName' => [
                'required',
                'alpha'
            ],
            'surname' => [
                'required',
                'alpha'
            ],
            'city' => [
                'required',
                'alpha'
            ],
            'dateBirth' => [
                'required',
                'date',
                'before:'.Carbon::now()->subYears(18)->format('Y-m-d')
            ]

            ],$messages)->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        Detail::create([
            'firstName' => $input['firstName'],
            'surname' => $input['surname'],
            'city' => $input['city'],
            'dateBirth' => $input['dateBirth'],
            'user_id' => $user->id
        ]);

        return $user;
    }
}
