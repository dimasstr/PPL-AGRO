@extends('layouts.main')

@section('container')

<div class="container">
  <div class="row">
      <div class="bg-light text-dark rounded mb-2">
          <div class="col-md-12 my-2">
              <nav aria-label="breadcrumb">
              <ol class="breadcrumb mx-3">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="/profile">Profile</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
              </ol>
              </nav>
          </div>
      </div>
  </div>
</div>

    <div class="d-flex justify-content-between flew-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Profile</h1>
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
            <div class="mb-3">
                <strong><label for="password" class="form-label">Password</label></strong>
                <p class="text-muted gy-2">*Jika tidak ingin diganti, bisa dikosongi.</p>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" 
                name="password">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="my-4">
              <a href="/profile" class="btn btn-secondary">Kembali ke Profile</a>
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>
@endsection