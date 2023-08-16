@extends('layouts.app')
@section('title', 'Order')
@section('content')
    <script type="text/javascript" src="{{ config('midtrans.snap_url') }}"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <div class="container py-5">
        <h1 class="my-3">Order</h1>
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/DOKTER.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Order Detail</h5>
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td>{{ $order->name }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $order->name }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{ $order->address }}</td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td>{{ $order->qty }}</td>
                    </tr>
                    <tr>
                        <td>Total Price</td>
                        <td>{{ $order->total_price }}</td>
                    </tr>
                </table>
                <button class="btn btn-primary my-2" id="pay-button" type="submit">Pay Now</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    // alert("payment success!");
                    // console.log(result);
                    window.location.href = '/invoice/{{ $order->id }}';
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
@endsection
