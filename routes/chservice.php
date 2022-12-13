<?php

use App\Models\BibleLesson;
use App\Models\ChurchService;
use App\Models\Pastor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


Route::middleware('auth','verify','admin')->get('kjazhaghur6df7cbsj2l', function (){
    $chservices = ChurchService::all();
    $pastors = Pastor::all();
    $blessons = BibleLesson::all();
    return view('chservices.index',[
        'chservices' => $chservices,
        'pastors'    => $pastors,
        'blessons'   => $blessons,
    ]);
})->name('chservice.show');
