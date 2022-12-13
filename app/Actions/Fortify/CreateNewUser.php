<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\vuser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use RealRashid\SweetAlert\Facades\Alert;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        Validator::make($input, [
            'family_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string','min:10', 'max:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => ['required', 'date','before:2018-02-01'],
            'line1' => ['required', 'string', 'max:255'],
            'line2' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'pin' => ['required', 'string', 'max:6'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'family_name' => $input['family_name'],
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'mobile' => $input['mobile'],
            'email' => $input['email'],
            'dob' => $input['dob'],
            'line1' => $input['line1'],
            'line2' => $input['line2'],
            'city' => $input['city'],
            'state' => $input['state'],
            'pin' => $input['pin'],
            'password' => Hash::make($input['password']),
        ]);

          $verify = vuser::create([
            'user_id' => $user->id,
            'token'  => Str::random(30),
          ]);

          Mail::to($user->email)->send(new VerifyEmail($user, $verify->token));

          Alert::success('You have successfully registered, kindly verify your email by clicking the link sent to you', 'CSICWCR');


          return $user;

    }
}
