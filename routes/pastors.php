
<?php

use App\Models\Pastor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


Route::middleware(['auth','verify','admin'])->get('quzlk6y5dnzhg8', function (){
    if(!Auth::user()->role = 'admin'){
        return redirect()->route('dashboard')->with("error", "You are not authorized to perform this action");
    }else{
        return view('pastors.create');
    }

})->name('selpastor');

Route::middleware('auth','verify','admin')->post('jkalgydbx7db3nd', function (Request $request){

    $request->validate([
        'family_name' => ['required', 'string', 'max:255'],
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'mobile' => ['required', 'string','min:10', 'max:10'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'dob' => ['required', 'date','before:2002-02-01'],
        'equal' => ['required','string'],
        'bio'   => ['required','string'],
        'photo'  => ['required', 'mimes:png,jpg,svg,jpeg','max:2048'],
    ]);



    if($request->photo){
        $imageName = Str::random(20).'.'.$request->photo->extension();
        $request->photo->move(public_path('pastors'), $imageName);
    }

Pastor::create([
 'family_name'   => $request->family_name,
 'first_name'    => $request->first_name,
 'last_name'     => $request->last_name,
 'mobile'        => $request->mobile,
 'email'         => $request->email,
 'dob'           => $request->dob,
 'equal'         => $request->equal,
 'bio'           => $request->bio,
 'profile_photo' => $imageName
]);

    return redirect()->route('pastors.show')->with("success","the paster is successfully created");
})->name('create.pastor');


Route::middleware('auth','verify','admin')->get('jabdhyx8s3mcb2ksg9', function (){
    $pastors = Pastor::all();
     return view('pastors.index',[
        'pastors' => $pastors,
     ]);
})->name('pastors.show');


Route::middleware('auth','verify','admin')->post('hjabch67dgg2bdg4', function (Request $request){
    $pastor =  Pastor::find($request->id);
    $request->validate([
        'family_name' => ['required', 'string', 'max:255'],
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'mobile' => ['required', 'string','min:10', 'max:10'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'dob' => ['required', 'date','before:2002-02-01'],
        'equal' => ['required','string'],
        'bio'   => ['required','string'],
        'photo'  => ['required', 'mimes:png,jpg,svg,jpeg','max:2048'],
    ]);



    if($request->photo){

        $image_path = public_path('pastors'.$pastor->profile_photo);
        if(File::exists($image_path)){
             unlink($image_path);
        }

        $imageName = Str::random(20).'.'.$request->photo->extension();
        $request->photo->move(public_path('pastors'), $imageName);

    }

$pastor->update([
 'family_name'   => $request->family_name,
 'first_name'    => $request->first_name,
 'last_name'     => $request->last_name,
 'mobile'        => $request->mobile,
 'email'         => $request->email,
 'dob'           => $request->dob,
 'equal'         => $request->equal,
 'bio'           => $request->bio,
 'profile_photo' => $imageName
]);

    return redirect()->route('pastors.show')->with("success","the paster is successfully updated");
})->name('update.pastor');





