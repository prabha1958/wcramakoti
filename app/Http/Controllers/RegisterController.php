<?php

namespace App\Http\Controllers;

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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;


class RegisterController extends Controller
{
    public function __invoke(Request $request) {

        $this->validate($request, [
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
            'pin' => ['required', 'string', 'digits:6'],
            'area' => ['required','max:12'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'password' => Password::min(8)
                            ->letters()
                            ->mixedCase()
                            ->numbers()
                            ->symbols()
                            ->uncompromised(),

        ]);

             $user = User::create([
                'family_name' => $request->family_name,
                'first_name'  => $request->first_name,
                'last_name'   => $request->last_name,
                'mobile'      => $request->mobile,
                'email'       => $request->email,
                'dob'         => $request->dob,
                'area'        => $request->area,
                'line1'       => $request->line1,
                'line2'       => $request->line2,
                'city'        => $request->city,
                'state'       => $request->state,
                'pin'         => $request->pin,
                'password'   => Hash::make($request->password),
             ]);


             $verify = vuser::create([
                'user_id' => $user->id,
                'token'  => Str::random(30),
              ]);

              Mail::to($user->email)->send(new VerifyEmail($user, $verify->token));
              Auth::login($user);
              return redirect()->route('email.verify');
    }
}
