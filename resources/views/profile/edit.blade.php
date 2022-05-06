@extends('dashboard.layouts.main')

@section('container')
    
    <div class="d-flex justify-content-between flew-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Toko</h1>
    </div>
    
    <div class="col-lg-6">
        <form method="post" action="/profile/{{ auth()->user()->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
              <strong><label for="name" class="form-label">Nama</label></strong>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $customer->name) }}">
              @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <strong><label for="address" class="form-label">Alamat</label></strong>
              <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" required value="{{ old('address', $customer->address) }}">
              @error('address')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <strong><label for="telephone" class="form-label">Nomor Telepon</label></strong>
              <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" required value="{{ old('telephone', $customer->telephone) }}">
              @error('telephone')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            {{-- <div class="mb-3">
                <strong><label for="password" class="form-label">Password</label></strong>
                <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" 
                name="password" required value="{{ old('password', $customer->password) }}">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div> --}}
            <div class="my-4">
              <a href="/profile" class="btn btn-secondary">Kembali ke Profile</a>
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>
@endsection