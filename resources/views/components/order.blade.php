@extends('layouts.app')
@section('title', 'Order')
@section('content')
    <div class="container py-5">
        <h1 class="my-3">Order</h1>
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/DOKTER.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Order</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <form action="/checkout" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="qty" class="form-label">Mau pesan berapa?</label>
                        <input type="number" class="form-control" id="qty" name="qty"
                            placeholder="jumlah yang dipesan">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="masukkan nama anda">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="masukkan phone anda">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Addres</label>
                        <input type="text" class="form-control" id="address" name="address"
                            placeholder="masukkan address anda">
                    </div>
                    <button class="btn btn-primary" type="submit">Checkout</button>

                </form>
            </div>
        </div>
    </div>
@endsection
