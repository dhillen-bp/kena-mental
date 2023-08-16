@extends('layouts.app')
@section('title', 'Invoice')
@section('content')
    <div class="container py-5">
        <h1 class="my-3">Invoice</h1>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Detail Pesanan</h5>
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
                    <tr>
                        <td>Status</td>
                        <td>{{ $order->status }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
