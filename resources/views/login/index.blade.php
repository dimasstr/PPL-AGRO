@extends('layouts.main')

@section('container')
    
@if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if (session()->has('loginError'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<main class="form-signin">
    <form action="/login" method="post">
      @csrf
      <h1 class="h3 mb-3 fw-normal, text-center">Silahkan Sign-in</h1>
      <div class="form-floating">
        <input type="email" name='email' class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
        <label for="email">Email</label>
        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        <label for="password">Password</label>
      </div>
  
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
    <small class="d-block text-center mt-3">Belum memiliki akun? <a href="/registrasi">Registrasi</a></small>
    <p class="mt-3 mb-3 text-muted, text-center">&copy; Kribu</p>
  </main>

@endsection