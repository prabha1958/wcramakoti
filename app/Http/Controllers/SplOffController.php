<?php

namespace App\Http\Controllers;

use App\Models\SplOffering;
use App\Http\Controllers\Controller;
use App\Models\membership;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class SplOffController extends Controller
{
    public function __invoke(Request $request){
        $id = $request->all()['id'];
        $sploff = SplOffering::where('id',$id)->where('user_id', Auth::user()->id);

        $paymentStatus = $this->ValidateOrderID(
            $request->all()['rzp_signature'],
            $request->all()['rzp_paymentid'],
            $request->all()['rzp_orderid']
        );
        if($paymentStatus == true)
        {

               $sploff->update([
                'order_id' => $request->all()['rzp_orderid'],
                'payment_id' => $request->all()['rzp_paymentid'],
                'date_of_payment'  => now(),
               ]);


            Alert::success('Your payment has been successfully made', 'CSICWCR');

            return redirect()->route('splofflist');
        }
        else{
            $message = "Fail";
            return redirect()->route('splofflist')->with("fail","your payment has failed");
        }
        return view('splofferings.payment',compact('message'));

    }

    private function ValidateOrderID($signature,$paymentId,$orderId)
    {
        try
        {
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $attributes  = array('razorpay_signature'  => $signature,  'razorpay_payment_id'  => $paymentId ,  'razorpay_order_id' => $orderId);
            $order  = $api->utility->verifyPaymentSignature($attributes);
            return true;
        }
        catch(\Exception $e)
        {
            return false;
        }
    }
}
