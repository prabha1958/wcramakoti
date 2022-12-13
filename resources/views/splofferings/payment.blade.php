

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Razorpay Payment Intregration</title>
</head>
<body>
    <button id="rzp-button1" hidden>Pay</button>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "{{$response['razorpayId']}}", // Razorpay ID
            "amount": "{{$response['amount']}}", // Amount
            "currency": "{{$response['currency']}}",
            "name": "{{$response['name']}}",
            "description": "{{$response['description']}}",
            "image": "https://csimarital.in/images/logo8.png", // replace this link with actual logo
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
            <input type="hidden" value="{{ response['id']}}" name="id" />
            <input type="text" class="form-control" id="rzp_paymentid"  name="rzp_paymentid">
            <input type="text" class="form-control" id="rzp_orderid" name="rzp_orderid">
            <input type="text" class="form-control" id="rzp_signature" name="rzp_signature">
        <button type="submit" id="rzp-paymentresponse" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>
