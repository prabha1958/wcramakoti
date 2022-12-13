<?php

use App\Models\PoorFeeding;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


Route::middleware('auth','verify','admin')->get('/dbnxoq2k3mfbc8sn6j4', function (){
    $pfs = PoorFeeding::all();
    return view('poorfeeding.index',[
        'pfs' => $pfs,
    ]);
})->name('poorfeeding.show');
