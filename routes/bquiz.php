<?php

use App\Models\BibleQuiz;
use App\Models\Pastor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

Route::get('bquiz', function (){
    $bqs = BibleQuiz::all();
    return view('bquiz.index',[
        'bqs' => $bqs
    ]);
})->name('bquiz.show');
