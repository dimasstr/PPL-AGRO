@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flew-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang! </h1>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" style="float: right" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    @endif
    <div class="d-flex justify-content-between flew-wrap flex-md-nowrap align-items-center pb-2 mb-3">
        <h3 class="mb-4">Produk Kami</h3>
        <a href="/dashboard/create" class="btn btn-primary mb-3">Tambahkan data produk</a>
    </div>
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
                    {{ $product -> description }} <hr>
                    <a href="/dashboard/{{ $product-> id }}/edit" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div> 
@endsection