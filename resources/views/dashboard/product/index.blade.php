@extends('dashboard.layouts.main')

@section('container')
    
    <h1>Detail Produk</h1>
    <div class="my-3">
        <a href="/dashboard/{{ $product->id }}/edit" class="btn btn-warning">Ubah data produk</a>
    </div>
    <div>
        <div style="max-height: 300px; overflow:hidden;">
            <img src="{{ asset('storage/'.$product->image) }}" class="mx-4 my-4" align="left" style="width: 400px;" alt="">
        </div>
        <h2 class="mb-4"><strong>{{ $product->product_name }}</strong></h2>
        <h4>{{ $product->variant }}</h3> <br>
        <p><strong>Harga : </strong>Rp{{ $product->price }}</p> 
        <p><strong>Stock : </strong>{{ $product->stock }}</p>
        <p><strong>Tanggal Kadaluwarsa : </strong>{{ $product->expired_date }}</p> <hr>
        <h5><strong>Deskripsi</strong></h5>
        <p>{{ $product->description }}</p> <br>
    </div>
    <a href="/dashboard" class="btn btn-secondary my-3">Kembali ke Dashboard</a>
@endsection