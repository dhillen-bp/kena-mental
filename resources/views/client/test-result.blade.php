@extends('layouts.client')
@section('title', 'Test Result')

@section('client_content')


    <div class="card mx-auto my-5" style="max-width: 550px">
        <div class="card-header">
            <h5 class="card-title text-center">Test Result</h5>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h6 class="card-text">{{ $testName }} Level</h6>
                <h6 class="card-text">{{ $result['level'] }}</h6>
            </div>
            <hr>
            <p>Hasil tes menunjukkan bahwa <b>{{ $testName }} Level</b> kamu adalah <b>{{ $result['level'] }}</b>.
                {{ $result['desc'] }}</p>
            <small><span class="text-danger text-sm">*</span> <span class="fw-bold">Disclaimer:</span> Tes ini
                hanya untuk tujuan
                informasi umum dan tidak akurat 100%.
                Hasil tes bukan pengganti konsultasi dengan profesional kesehatan mental. Jika Anda memiliki masalah
                kesehatan mental, sebaiknya konsultasikan dengan psikolog terlatih atau klik tombol dibawah ini untuk
                menemukan psikolog kami. </small>


        </div>
        <div class="card-footer d-flex justify-content-center">
            <a href="/psychologists" class="btn btn-primary">Find Psikologist</a>
        </div>
    </div>

@endsection
