@extends('layouts.main')

@section('container')
  <div class="container">
    <div class="row">
      <div class="bg-light text-dark rounded">
        <div class="col-md-12 my-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mx-3">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Informasi Toko</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <table class="table">
      <thead>
        <tr>
          <th scope="col" style="font-size: 25px">Data Toko Kami</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($abouts as $about)
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
          <tr>
            <th scope="row">Pemilik</th>
            <td>{{ $about->owner }}</td>
          </tr>
          <tr>
            <th scope="row">Email Pemilik</th>
            <td>{{ $about->email_owner }}</td>
          </tr>
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
      </tbody>
    </table>
  </div>

    <script src="js/main.js"></script>
@endsection
