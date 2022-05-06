@extends('layouts.main')

@section('container')

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" style="float: right" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th scope="col" style="font-size: 25px">Profile</th>
            <th scope="col"><a href="/profile/{{ auth()->user()->id }}/edit" class="btn btn-secondary" style="float: right"><i class="bi bi-pencil-square"></i></a></th>
          </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Nama</th>
            <td>{{ auth()->user()->name }}</td>
        </tr>
        <tr>
          <th scope="row">Alamat</th>
          <td>{{ auth()->user()->address }}</td>
        </tr>
        <tr>
            <th scope="row">Email</th>
            <td>{{ auth()->user()->email }}</td>
        </tr>
        <tr>
            <th scope="row">Nomor Telepon</th>
            <td>{{ auth()->user()->telephone }}</td>
        </tr>
        <tr>
            <th scope="row">Password</th>
            <td>{{ auth()->user()->password }}</td>
        </tr>
@endsection