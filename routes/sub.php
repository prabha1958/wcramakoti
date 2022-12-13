<?php

use App\Http\Controllers\SubscriptionController;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


Route::middleware('auth','verify')->get('nlqhzlgqjljaoga', function (){
    return view('subscriptions.selsub');
})->name('selsub');

Route::middleware('auth','verify')->post('uolxibeqkhqgeksnx', function (Request $request){

    $user = User::find(Auth::user()->id);

    $request->validate([
    'amount' => ['required', 'max:5000'],
    'start_at' => ['required','date','after:tomorrow'],
  ]);



  $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
if(!$user->customer_id){
    $customer = $api->customer->create(array(
        'name' => $user->family_name.' '. $user->first_name.'  '.$user->last_name,
         'email' => $user->email,
         'contact'=>$user->mobile,
         'notes'=> array(
            'notes_key_1'=> 'Tea, Earl Grey, Hot',
            'notes_key_2'=> 'Tea, Earl Grey… decaf'
      )));
}


  $sdate = strToTime($request->start_at);


  $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

  $plan = $api->plan->create(array(
    'period' => 'monthly',
    'interval' => 1,
     'item' => array(
        'name' => 'Montly Membership Fee',
            'description' => 'This is your monthly Church Memebership subscription',
            'amount' => $request['amount']*100,
            'currency' => 'INR'),
            'notes'=> array(
            'key1'=> 'value3',
            'key2'=> 'value2')));



  $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

  $sub  = $api->subscription->create(array(
    'plan_id' => $plan->id,
    'customer_notify' => 0,
    'quantity'=>1,
    'total_count' => 12,
    'start_at' => $sdate,
    'addons' => array(array(
        'item' => array(
            'name' => 'Delivery charges',
             'amount' => $request['amount']*100,
             'currency' => 'INR'
            ))),
            'notes'=> array(
                'key1'=> 'value3',
                'key2'=> 'value2'
            )));


  Subscription::create([
    'user_id' => Auth::user()->id,
    'subscription_id' => $sub->id,
    'plan_id'    => $plan->id,
    'amount' => $plan->item->amount/100,
    'plan_id' => $plan->id,
    'total_count' => $sub->total_count,
    'start_at'  => $sub->start_at,
    'status'  => $sub->status,
    'short_url' => $sub->short_url

  ]);


  if(!$user->customer_id){
    $user->customer_id = $customer->id;
    $user->save();
  }



  Alert::success('Your subscription details updated successfully, now you can start your subscription','CSICWCR');
   return redirect()->to(route('subscribe.show'));

})->name('selsub.post');

Route::middleware('auth','verify')->get('kpcnbwh98r2ik45mnakglsj', function (){
     $sub = Subscription::where('user_id', Auth::user()->id)->first();

     $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
     $subdet = $api->subscription->fetch($sub->subscription_id);

     $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
     $plan = $api->plan->fetch($subdet->plan_id);



     return view('subscriptions.sublist',[
        'sub'  => $subdet,
        'plan' => $plan
     ]);
})->name('subscribe.show');

Route::middleware('auth','verify')->get('subscribe/{id}', function ($id){
    $sub = Subscription ::where('id',$id)->first();
    $user = Auth::user();

    $receiptId = Str::random(20);

    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    $order = $api->order->create(array(
        'receipt' => $receiptId,
        'amount' => $sub->amount *100,
        'currency' => 'INR'
        )
    );

    // Return response on payment page
    $response = [
        'orderId' => $order['id'],
        'id'      => $id,
        'razorpayId' => env('RAZORPAY_KEY'),
        'subscription_id' => $sub->subscription_id,
        'amount' => $sub->amount,
        'name' => $user->first_name.''.$user->last_name.''.$user->family_name,
        'currency' => 'INR',
        'email' => $user->email,
        'contactNumber' => $user->mobile,
        'address' => $user->line1.''.$user->line2.''.$user->city.''.$user->state.''.$user->pin,
        'description' => 'Testing description',
    ];

    return view('payment',compact('response'));
})->name('subscribe.post');
Route::middleware('auth','verify')->post('subscribepayment', SubscriptionController::class)->name('make_payment');




