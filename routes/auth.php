<?php

use App\Http\Controllers\RegisterController;
use App\Models\vuser;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;


Route::get('registration', function (){
    return view('auth.register');
})->name('registration');

Route::post('registration', RegisterController::class)->name('registration.store');

Route::middleware('auth')->get('jqoqhajjnchkhajknhilw', function (){
    if(!Auth::user()->isVerified()){
        return view('auth.verify-email');
    }else{
        return view('dashboard');
    }

})->name('email.verify');

Route::middleware('auth')->post('joquthahzhaowowu', function(){
   $vuser =  vuser::where('user_id', Auth::user()->id)->delete();


   $user = Auth::user();

   $verify = vuser::create([
    'user_id' => $user->id,
    'token'  => Str::random(32),
   ]);

   Mail::to($user->email)->send(new VerifyEmail($user, $verify->token));

   return redirect()->route('email.verify')->with("success", "verification link has been successfully sent to your registered email");


})->name('send.verify');

