@extends('dashboard.layouts.main')

@section('container')
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" style="float: right" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
    @foreach ($abouts as $about)
    <table class="table">
        <thead>
          <tr>
            <th scope="col" style="font-size: 25px">Data Toko Kami</th>
            <th scope="col"><a href="/tentang-kami/{{ $about->id }}/edit" class="btn btn-secondary" style="float: right"><i class="bi bi-pencil-square"></i></a></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Nama Toko</th>
            <td>{{ $about->store_name }}</td>
          </tr>
          <tr>
            <th scope="row">Tahun Berdiri</th>
            <td>{{ $about->since }}</td>
          </tr>
          <tr>
            <th scope="row">Email Toko</th>
            <td>{{ $about->email }}</td>
          </tr>
          <tr>
            <th scope="row">Pemilik</th>
            <td>{{ $about->owner }}</td>
          </tr>
          <tr>
            <th scope="row">Email Pemilik</th>
            <td>{{ $about->email_owner }}</td>
          </tr>
          <tr>
            <th scope="row">Nomor Telepon</th>
            <td>{{ $about->telephone  }}</td>
          </tr>
          <tr>
            <th scope="row">Alamat</th>
            <td>{{ $about->address }}</td>
          </tr>
          <tr>
            <th scope="row">Media Social</th>
            <td><a href="{{ $about->medsoc }}">Shopee</a></td>
          </tr>
    @endforeach
@endsection