<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class SubscriptionController extends Controller
{
    public function __invoke(Request $request){
            $id = $request->all()['id'];

            $sub = Subscription ::where('id',$id)->first();


            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            $subscription = $api->subscription->fetch($sub->subscription_id);



            $sub->update([
                 'status'      => $subscription->status,
                 'charge_at'   => $subscription->charge_at,
            ]);

        $paymentStatus = $this->ValidateOrderID(
            $request->all()['rzp_signature'],
            $request->all()['rzp_paymentid'],
            $request->all()['rzp_orderid']
        );
        if($paymentStatus == true)
        {



            Alert::success('You have successfully started your subscription', 'CSICWCR');

            return redirect()->route('subscribe.show');
        }
        else{
            $message = "Fail";
            return redirect()->route('subscribe.show');
        }


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
