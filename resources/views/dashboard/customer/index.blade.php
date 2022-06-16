@extends('dashboard.layouts.main')

@section('container')
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" style="float: right" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="container">
    <div class="row">
        <div class="bg-light text-dark rounded mb-2">
            <div class="col-md-12 my-2">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb mx-3">
                  <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Customer</li>
                </ol>
                </nav>
            </div>
        </div>
    </div>
  </div>

<h2 style="font-size: 25px">Data Customer</h2> <hr>
    @foreach ($customers as $customer)
    <table class="table mb-5">
      <h5 class="mb-3 text-muted">ID: #{{ $customer->id }}</h5>
        <tbody>
          <tr>
            <th scope="row" width="200px">Nama</th>
            <td>{{ $customer->name }}</td>
          </tr>
          <tr>
            <th scope="row">Alamat</th>
            <td>{{ $customer->address }}</td>
          </tr>
          <tr>
            <th scope="row">Nomor Telepon</th>
            <td>{{ $customer->telephone  }}</td>
          </tr>
          <tr>
            <th scope="row">Email</th>
            <td>{{ $customer->email }}</td>
          </tr>
        </tbody>
    @endforeach
@endsection