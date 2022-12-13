<?php

namespace App\Http\Controllers;

use App\Models\SpecialOffering;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SplOffering;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use Redirect,Response;
use RealRashid\SweetAlert\Facades\Alert;

class SplOfferingController extends Controller
{


   public function   __invoke($id){
        $sploff = SplOffering::where('id', $id)
                                   ->where('user_id', Auth::user()->id)->first();

        if(!$sploff->payment_id == ''){
            Alert::error('the payment is already made','CSICWCR');
            return redirect()->route('splofflist');
        }

        $user = Auth::user();
        $receiptId = Str::random(20);

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $order = $api->order->create(array(
            'receipt' => $receiptId,
            'amount' => $sploff->amount * 100,
            'currency' => 'INR'
            )
        );

        $response = [
            'orderId' => $order['id'],
            'razorpayId' => env('RAZORPAY_KEY'),
            'id'         => $id,
            'amount' => $sploff->amount * 100,
            'name' => $user->first_name.''.$user->last_name.''.$user->family_name,
            'currency' => 'INR',
            'email' => $user->email,
            'contactNumber' => $user->mobile,
            'address' => $user->Line1.''.$user->line2.''.$user->city.''.$user->state.''.$user->pin,
            'description' => 'Special Offer payment',
        ];

        return view('splofferings.splpayment',compact('response'));


   }


}
