@extends('dashboard.layouts.main')

@section('container')
    
    <div class="d-flex justify-content-between flew-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Toko</h1>
    </div>
    
    <div class="col-lg-6">
        <form method="post" action="/tentang-kami/{{ $abouts->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
              <strong><label for="store_name" class="form-label">Nama Toko</label></strong>
              <input type="text" class="form-control @error('store_name') is-invalid @enderror" id="store_name" name="store_name" required autofocus value="{{ old('store_name', $abouts->store_name) }}">
              @error('store_name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <strong><label for="since" class="form-label">Tahun Berdiri</label></strong>
              <input type="number" class="form-control @error('since') is-invalid @enderror" id="since" name="since" required value="{{ old('since', $abouts->since) }}">
              @error('since')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <strong><label for="email" class="form-label">Email Toko</label></strong>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email', $abouts->email) }}">
              @error('email')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <strong><label for="owner" class="form-label">Pemilik</label></strong>
              <input type="text" min="0"  class="form-control @error('owner') is-invalid @enderror" id="owner" name="owner" required value="{{ old('owner', $abouts->owner) }}">
              @error('owner')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <strong><label for="email_owner" class="form-label">Email Pemilik</label></strong>
              <input type="text" class="form-control @error('email_owner') is-invalid @enderror" id="email_owner" name="email_owner" required value="{{ old('email_owner', $abouts->email_owner) }}">
              @error('email_owner')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            <div class="mb-3">
              <strong><label for="telephone" class="form-label">Nomor Telepon</label></strong>
              <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" required value="{{ old('telephone', $abouts->telephone) }}">
              @error('telephone')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <strong><label for="address" class="form-label">Alamat</label></strong>
              <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" 
              name="address" required value="{{ old('address', $abouts->address) }}">
              @error('address')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
                <strong><label for="medsoc" class="form-label">Media Social</label></strong>
                <input type="text" class="form-control @error('medsoc') is-invalid @enderror" id="medsoc" 
                name="medsoc" required value="{{ old('medsoc', $abouts->medsoc) }}">
                @error('medsoc')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="my-4">
              <a href="/tentang-kami" class="btn btn-secondary">Kembali ke Data Toko</a>
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>
@endsection