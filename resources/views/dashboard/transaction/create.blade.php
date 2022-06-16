@extends('dashboard.layouts.main')

@section('container')
    
<div class="container">
  <div class="row">
      <div class="bg-light text-dark rounded mb-2">
          <div class="col-md-12 my-2">
              <nav aria-label="breadcrumb">
              <ol class="breadcrumb mx-3">
                  <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="/transaksi">Transaksi</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Transaksi</li>
              </ol>
              </nav>
          </div>
      </div>
  </div>
</div>

    <div class="d-flex justify-content-between flew-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Tambah Transaksi Baru</h1>
    </div>
    
    <div class="col-lg-6">
        <form method="post" action="/transaksi">
            @csrf
            <div class="mb-3">
              <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
              <input type="date" min="0"  class="form-control @error('tanggal_transaksi') is-invalid @enderror" id="tanggal_transaksi" name="tanggal_transaksi" required autofocus value="{{ old('tanggal_transaksi') }}">
              @error('tanggal_transaksi')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="nominal" class="form-label">Nominal</label>
              <input type="number" class="form-control @error('nominal') is-invalid @enderror" id="nominal" name="nominal" min="1" required value="{{ old('nominal') }}">
              @error('nominal')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi</label>
              <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" 
              name="deskripsi" required value="{{ old('deskripsi') }}">
              @error('deskripsi')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group row mb-2">
              <div class="col-md-6">
                  <label for="jenisTransaksi_id" class="form-label">Jenis Transaksi</label>
                  <select name="jenisTransaksi_id" id="jenisTransaksi_id" class="form-control @error('jenisTransaksi_id') is-invalid @enderror" >
                      <option value="" class="text-center">-- Pilih --</option>
                      @foreach ($types as $type)
                          <option value="{{ $type->id }} {{ old('jenisTransaksi_id', $type->jenisTransaksi_id) == $type->id ? 'selected' : null }}" class="text-center">{{ $type->jenis_transaksi }}</option>
                      @endforeach
                  </select>
                  @error('jenisTransaksi_id')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
              </div>
          </div>
            <div class="my-4">
              <a href="/transaksi" class="btn btn-secondary">Kembali</a>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
@endsection