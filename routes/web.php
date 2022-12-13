<?php

use App\Http\Controllers\ProfilePhotoController;
use App\Http\Livewire\EditProfile;
use App\Models\vuser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::middleware('auth','verify')->get('/dashboard', function () {
        return view('dashboard',[
            'user' => Auth::user(),
        ]);
    })->name('dashboard');
});

//Route::middleware(['auth', 'verified'])->get('/edit-profile', EditProfile::class)->name('edit-profile');
//Route::middleware(['auth', 'verified'])->get('/profile-photo', ProfilePhotoController::class)->name('profilephoto');

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/userout', function () {
        Session::flush();

        Auth::logout();

        Alert::error('Kindly verify your email before login', 'CSICWCR');

        return redirect('login');
    })->name('userout');
 });

 Route::get('verimail/{id}/{token}', function ($id,$token){
      $verify = vuser::where('user_id',$id)->where('token',$token)->first();

      if($verify){
        $user = User::find($id);
        $user->forceFill([
            'email_verified_at' => now(),
        ])->save();

        $verify->delete();

        Alert::success('Your email has been verified successfully, you can login now', 'CSICWCR');

        return redirect()->route('login');


      }else{
        dd('There is something wrong with this link');
      }
 });

 Route::get('modal', function (){
    return view('modal');
 });



require __DIR__.'/sub.php';
require __DIR__.'/sploff.php';
require __DIR__.'/auth.php';
require __DIR__.'/pastors.php';
require __DIR__.'/biblelessons.php';
require __DIR__.'/chservice.php';
require __DIR__.'/admin.php';
require __DIR__.'/poorfeeding.php';
require __DIR__.'/bquiz.php';

