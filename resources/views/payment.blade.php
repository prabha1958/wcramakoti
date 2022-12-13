<x-app-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="py-40">

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
               <div class="max-w-5xl mx-auto p-5 shadow-lg text-center">
                <form method="POST" action="{{'/sploffer'}}">
                    @csrf
                    <div class="text-center max-w-2xl mx-auto">
                        <div class="flex flex-row justify-between">
                            <p class="text-xl text-bold text-gray-400 mr-5">Order Id</p>
                            <p class="text-2xl text-bold text-gray-900">{{ $response['orderId']}}</p>
                        </div>
                        <div class="flex flex-row justify-between">
                            <p class="text-xl text-bold text-gray-400 mr-5">Subscription Id</p>
                            <p class="text-2xl text-bold text-gray-900">{{ $response['subscription_id']}}</p>
                        </div>
                        <div class="flex flex-row justify-between">
                            <p class="text-xl text-bold text-gray-400 mr-5">Name</p>
                            <p class="text-2xl text-bold text-gray-900">{{ $response['name']}}</p>
                        </div>
                        <div class="flex flex-row justify-between">
                            <p class="text-xl text-bold text-gray-400 mr-5">email</p>
                            <p class="text-2xl text-bold text-gray-900">{{ $response['email']}}</p>
                        </div>
                        <div class="flex flex-row justify-between">
                            <p class="text-xl text-bold text-gray-400 mr-5">Mobile</p>
                            <p class="text-2xl text-bold text-gray-900">{{ $response['contactNumber']}}</p>
                        </div>
                        <div class="flex flex-row justify-between">
                            <p class="text-xl text-bold text-gray-400 mr-5">Amount</p>
                            <p class=" text-5xl text-bold text-gray-900">{{ $response['amount']}}</p>
                        </div>

                    </div>


                </form>
               </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
    <button id="rzp-button1" hidden>Pay</button>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "{{$response['razorpayId']}}", // Razorpay ID
            "amount": "{{$response['amount']}}", // Amount
            "subscription_id": "{{$response['subscription_id']}}",
            "currency": "{{$response['currency']}}",
            "name": "{{$response['name']}}",
            "description": "{{$response['description']}}",
            "image": "https://example.com/your_logo", // replace this link with actual logo
            "order_id": "{{$response['orderId']}}", //Created Order id in first method
            "handler": function (response){
                document.getElementById('rzp_paymentid').value = response.razorpay_payment_id;
                document.getElementById('rzp_orderid').value = response.razorpay_order_id;
                document.getElementById('rzp_signature').value = response.razorpay_signature;
                document.getElementById('rzp-paymentresponse').click();
            },
            "prefill": {
                "name": "{{$response['name']}}",
                "email": "{{$response['email']}}",
                "contact": "{{$response['contactNumber']}}"
            },
            "notes": {
                "address": "{{$response['address']}}"
            },
            "theme": {
                "color": "#F37254"
            }
        };
        var rpay = new Razorpay(options);
        window.onload = function(){
            document.getElementById('rzp-button1').click();
        };

        document.getElementById('rzp-button1').onclick = function(e){
            rpay.open();
            e.preventDefault();
        }
    </script>
    <form action="{{route('make_payment')}}" method="POST" hidden>
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <input type="hidden" name="id"  value={{ $response['id']}} />
            <input type="text" class="form-control" id="rzp_paymentid"  name="rzp_paymentid">
            <input type="text" class="form-control" id="rzp_orderid" name="rzp_orderid">
            <input type="text" class="form-control" id="rzp_signature" name="rzp_signature">
        <button type="submit" id="rzp-paymentresponse" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>
