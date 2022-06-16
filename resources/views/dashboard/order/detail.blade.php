@extends('dashboard.layouts.main')

@section('container')

    <div class="container">
        <div class="row">
            <div class="bg-light text-dark rounded mb-2">
                <div class="col-md-12 my-2">
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mx-3">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/pesanan-customer">List Pesanan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pesanan Detail</li>
                    </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card my-3">
                    <div class="card-header">
                        <h2>Pesanan #{{ $order->id }}</h2>

                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Nama Customer</td>
                                    <td>:</td>
                                    <td>{{ ($order->user->name) }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{ ($order->user->address) }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td>:</td>
                                    <td>{{ ($order->user->telephone) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="table-light">
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                </tr>
                                <?php $no = 1; ?>
                                @foreach($order_details as $order_detail)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td align="center" class=""><img src="{{ asset('storage/'.$order_detail->product->image) }}"  style="width: 150px; height: 115px" </td>
                                    <td>Kripik {{ $order_detail->product->variant }}</td>
                                    <td align="center">{{ $order_detail->jumlah }}</td>
                                    <td align="right">Rp {{ number_format($order_detail->product->price) }}</td>
                                    <td align="right">Rp {{ number_format($order_detail->jumlah_harga) }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                    <td align="right"><strong>Rp. {{ number_format($order->jumlah_harga) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="right"><strong>Ongkos Kirim :</strong></td>
                                    <td align="right"><strong>Rp. {{ number_format($order_detail->ongkir) }}</strong></td> 
                                </tr>
                                <tr>
                                    <td colspan="5" align="right"><strong>Total yang harus ditransfer :</strong></td>
                                    <td align="right"><strong>Rp. {{ number_format($order_detail->ongkir+$order->jumlah_harga) }}</strong></td>
                                </tr>
                                @if(!empty($order->image))
                                    <tr>
                                        <td colspan="5" align="left"><strong>Bukti Pembayaran</strong></td>
                                        <td align="right"><img src="{{ asset('storage/'.$order->image) }}" style="width: 300px; height: 400px"</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            @if($order->status_id != 4)
                            <tr>
                                <td colspan="2" align="left">
                                    <strong><label for="name" class="col-md-4 col-form-label">Status Pesanan</label></strong>
                                </td>
                                <td colspan="3" align="center">
                                    <form action="/pesanan-customer-detail/{{ $order->id }}" method="post" >
                                        @method('PUT')
                                        @csrf
                                    <div class="form-group row mb-2">
                                        <div class="col-md-6">
                                            <select name="status_id" id="status_id" class="form-control @error('status_id') is-invalid @enderror" >
                                                <option value="" class="text-center">-- Ubah Status Pesanan --</option>
                                                @foreach ($statuses as $status)
                                                    <option value="{{ $status->id }} {{ old('status_id', $order->status_id) == $status->id ? 'selected' : null }}" class="text-center">{{ $status->status }}</option>
                                                @endforeach
                                            </select>
                                            @error('status_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <td colspan="1" align="center">
                                        <button type="submit" class="btn btn-success">Ubah</button>
                                    </td>
                                    </form>
                                </td>
                            </tr>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection