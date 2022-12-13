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

Route::middleware('auth','verify','admin')->get('zjgcn7safn4nc81ndha7', function (){
    return view('admin.admin-main');
})->name('admin.panel');
