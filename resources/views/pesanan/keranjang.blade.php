@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row">
            <div class="bg-light text-dark rounded">
                <div class="col-md-12 my-2">
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mx-3">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                    </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-3">
        <div class="card mb-4">
            <div class="card-header">
                <h2>Keranjang</h2>
            </div>
            <div class="card-body">
                @if(!empty($order))
                <div align="right">
                    <p>Tanggal Order: {{ $order->tanggal }}</p>
                </div>
                <table class="table table mt-4">
                    <thead>
                        <tr class="table-light">
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($order_details as $order_detail)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td align="center" class=""><img src="{{ asset('storage/'.$order_detail->product->image) }}"  style="width: 150px; height: 115px" </td>
                            <td>Kripik {{ $order_detail->product->variant }}</td>
                            <td align="center">{{ $order_detail->jumlah }}</td>
                            <td align="right">Rp {{ number_format($order_detail->product->price) }}</td>
                            <td align="right">Rp {{ number_format($order_detail->jumlah_harga) }}</td>
                            <td align="center">
                                <form action="/keranjang/{{ $order_detail->id }}" method="post" class="d-inline" >
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" onclick="return confirm ('Apakah Anda yakin ingin menghapus data?')"><i class="bi bi-trash3"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <td colspan="5" align="right"><strong><h4>Total Harga :</h3></strong></td>
                        <td align="right"><strong><h4>Rp. {{ number_format($order->jumlah_harga) }}</h3></strong></td>
                        <td>
                            <a href="/checkout/{{ $order->id }}" class="btn btn-success d-flex justify-content-center" onclick="return confirm('Anda yakin akan Checkout ?');">
                                Checkout
                            </a>
                        </td>
                    </tr>
                </table>
                @else
                <h4>Keranjang belanjamu lagi kosong. Pesan produk kami sekarang!</h4>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection