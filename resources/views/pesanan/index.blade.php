@extends('layouts.main')

@section('container')


  <div class="container">
      <div class="row">
            <div class="col-md-12 mt-2">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    @if(empty($order))
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->variant }}</li>
                    @endif
                </ol>
                </nav>
            </div>
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @if(empty($order))
                            <div class="col-md-5 mt-4">
                                <img src="{{ asset('storage/'.$product->image) }}" class="rounded mx-auto d-block" width="100%" alt="{{ $product->image }}.jpg"> 
                            </div>
                            
                            <div class="col-md-7 mt-3">
                                <h2>Kripik {{$product->variant}}</h2>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td>Rp. {{ number_format($product->price) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td>:</td>
                                            <td>{{ number_format($product->stock) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Kadaluwarsa</td>
                                            <td>:</td>
                                            <td>{{ $product->expired_date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td>{{ $product->description }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Jumlah Pesan</td>
                                            <td>:</td>
                                            <td>
                                                <form method="post" action="/pesanan/{{$product->id}}">
                                                @csrf
                                                    <input type="number" name="jumlah_pesan" class="form-control" min="1" required="">
                                                    <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                        <a href="/" class="btn btn-secondary">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
      </div>
  </div>
@endsection