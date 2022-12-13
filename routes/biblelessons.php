<?php

use App\Models\BibleLesson;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


Route::middleware('auth','verify','admin')->get('xnaothc73nd6dns8wxd', function (){
    return view('biblelessons.addblesson');
})->name('addblesson');

Route::middleware('auth','verify','admin')->get('juwhdb6vgxmdk5ofn33nd6dn', function (){
     $blesson = BibleLesson::all();
      return view('biblelessons.index',[
        'blessons' => $blesson,
      ]);
})->name('blesson.show');


Route::middleware('auth','verify','admin')->post('xnaothc73nd6dns8wxd', function (Request $request){

})->name('addblesson');
