<?php

use App\Http\Controllers\SplOffController;
use App\Http\Controllers\SplOfferingController;
use App\Http\Controllers\SubscriptionController;
use App\Models\SplOffering;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


Route::middleware('auth','verify')->get('yoqbhuoqouqotlsjglajlgha', function (){
    return view('splofferings.sploffsel');
})->name('sploffsel');

Route::middleware('auth','verify')->post('yoqbhuoqouqotlsjglajlgha', function (Request $request){

    $request->validate([
        'amount' => ['required', 'max:5000'],
        'purpose' => ['required'],
      ]);

       SplOffering::create([
        'user_id' => Auth::user()->id,
        'amount' => $request['amount'],
        'purpose' => $request['purpose'],
       ]);
    return redirect()->route('splofflist');
})->name('sploffsel.post');

Route::middleware('auth','verify')->get('jlajgbqhupuncpnhhux', function (){
       $sploff = SplOffering::where('user_id', Auth::user()->id)->get();
       return view('splofferings.splofflist',[
        'sploff'  => $sploff,
       ]);
})->name('splofflist');

Route::middleware('auth','verify')->get('sploffpayment/{id}', SplOfferingController::class, '__invoke')->name('sploffpayment');
Route::middleware('auth','verify')->post('w42wqs6ga76gklnzha', SplOffController::class, '__invoke')->name('make_payment');




