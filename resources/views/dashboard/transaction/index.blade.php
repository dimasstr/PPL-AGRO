@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row">
        <div class="bg-light text-dark rounded mb-2">
            <div class="col-md-12 my-2">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb mx-3">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                </ol>
                </nav>
            </div>
        </div>
    </div>
  </div>

<div class="card">
    <div class="card-header">
        <div class="row mt-2">
            <div class="col-lg-4">
                <h3>Pencatatan Transaksi</h3>
                <p>List catatan transaksi yang telah dilakukan.</p>
            </div>
            <div class="col-lg-4 mx-auto">
                <a href="/transaksi/create" class="btn btn-secondary mx-2" style="float: right"><i class="bi bi-plus"></i></a>
                <a href="/grafik-transaksi" class="btn btn-secondary mx-2" style="float: right"><i class="bi bi-graph-up"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr class="table-light">
                    <th>No</th>
                    <th>Tanggal Transaksi</th>
                    <th>Deskripsi</th>
                    <th>Jenis Transaksi</th>
                    <th>Nominal</th>
                    <th>Aksi</th>
                </tr>
                <?php $no = 1; ?>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $no ++ }}</td>
                    <td>{{ $transaction->tanggal_transaksi }}</td>
                    <td>{{ $transaction->deskripsi }}</td>
                    <td>{{ $transaction->transactionType->jenis_transaksi }}</td>
                    <td align="right">Rp. {{ number_format($transaction->nominal) }}</td>
                    <td align="center">
                        <a href="/transaksi/{{ $transaction->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                        </td>
                </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" align="left"><strong>Total</strong></td>
                        <td align="right"><strong>Rp. {{ number_format($grand_total) }}</strong></td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection