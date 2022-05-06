@extends('layouts.main')

@section('container')

<h1 class="mb3">Selamat Datang di Website Kribu!</h1> <hr>
<div class="row justify-content-center">
    @foreach ($products as $product)
        <div class="col-lg-3 col-md-4 col-12  d-flex justify-content-center my-4">
            <div class="card shadow" style="max-width: 30rem;">
                <div style="max-height: 400px; overflow:hidden;">
                    <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="..." style="height: 214px; max-height: 200px">
                </div>
                <div class="card-body">
                <h5 class="card-title">{{ $product -> product_name }}</h5><br>
                <strong>Variant :</strong>  {{ $product -> variant }} <br>
                <strong>Harga :</strong>  Rp {{ $product -> price }} <br> 
                <strong>Stok :</strong>  {{ $product -> stock }} <br> 
                <strong>Tanggal Kadaluwarsa :</strong>  {{ $product -> expired_date }} <br> <hr>
                <strong>Keterangan :</strong><br>
                {{ $product -> description }}
                </div>
            </div>
        </div>
    @endforeach
</div> 
@endsection