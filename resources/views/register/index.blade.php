@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-lg-5"> 
    <main class="form-register">
      <h1 class="h3 mb-3 fw-normal, text-center">Registrasi</h1>
      <p class="text-center">Silahkan isi data pada form dibawah ini.</p>
      <form action="/registrasi" method="post">
      @csrf
          <div class="form-floating">
            <input type="text" name="name" class="form-control rounded-top @error ('name') is-invalid @enderror" id="name" placeholder="Nama Lengkap" required value="{{ old('name') }}">
            <label for="name">Nama Lengkap</label>
            @error ('name')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="address" name="address" class="form-control @error ('address') is-invalid @enderror" id="address" placeholder="Alamat" required value="{{ old('address') }}">
            <label for="address">Alamat</label>
            @error ('address')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="telephone" name="telephone" class="form-control @error ('telephone') is-invalid @enderror" id="telephone" placeholder="Nomor Telepon" required value="{{ old('telephone') }}">
            <label for="telephone">Nomor Telepon</label>
            @error ('telephone')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="email" name="email" class="form-control @error ('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
            <label for="email">Email</label>
            @error ('email')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control rounded-bottom @error ('password') is-invalid @enderror" id="password" placeholder="Password" required value="{{ old('password') }}">
            <label for="password">Password</label>
            @error ('password')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
      </form>
      <p class="mt-3 mb-3 text-muted, text-center">&copy; Kribu</p>
    </main>
  </div>
</div>

@endsection