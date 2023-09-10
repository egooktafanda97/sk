@extends('Layout.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 mb-3">
                <div class="card flex p-3 justify-center items-center flex-column">
                    <h4 class="text-bold">Jumlah Guru</h4>
                    <hr>
                    <strong>{{ $guru ?? '0' }}</strong>
                </div>
            </div>
            <div class="col-4 mb-3">
                <div class="card flex p-3 justify-center items-center flex-column">
                    <h4 class="text-bold">Jumlah Siswa</h4>
                    <hr>
                    <strong>{{ $siswa ?? '0' }}</strong>
                </div>
            </div>
            <div class="col-4 mb-3">
                <div class="card flex p-3 justify-center items-center flex-column">
                    <h4 class="text-bold">Jumlah Alumni</h4>
                    <hr>
                    <strong>{{ $alumni ?? '0' }}</strong>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <img alt="Third slide" class="d-block w-100" src="{{ asset('landing-page') }}/assets/img/sdit/2.png">
            </div>
        </div>
    </div>
@endsection
