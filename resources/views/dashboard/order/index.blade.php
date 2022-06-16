@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row">
        <div class="bg-light text-dark rounded mb-2">
            <div class="col-md-12 my-2">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb mx-3">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Pesanan</li>
                </ol>
                </nav>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Pesanan</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Jumlah Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->tanggal }}</td>
                                <td>
                                    {{ $order->statusOrder->status }}
                                </td>
                                <td>Rp. {{ number_format($order->jumlah_harga+$order->ongkir) }}</td>
                                <td>
                                    <a href="/pesanan-customer-detail/{{ $order->id }}" class="btn btn-primary"><i class="bi bi-info-lg"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection