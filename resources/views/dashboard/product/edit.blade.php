@extends('dashboard.layouts.main')

@section('container')
    
    <div class="d-flex justify-content-between flew-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Produk</h1>
    </div>
    
    <div class="col-lg-6">
        <form method="post" action="/dashboard/{{ $product->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="product_name" class="form-label">Nama Produk</label>
              <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" required autofocus value="{{ old('product_name', $product->product_name) }}">
              @error('product_name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Harga</label>
              <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required value="{{ old('price', $product->price) }}">
              @error('price')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="expired_date" class="form-label">Tanggal Kadaluwarsa</label>
              <input type="date" min="0"  class="form-control @error('expired_date') is-invalid @enderror" id="expired_date" name="expired_date" required value="{{ old('expired_date', $product->expired_date) }}">
              @error('expired_date')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="stock" class="form-label">Stok</label>
              <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" required value="{{ old('stock', $product->stock) }}">
              @error('stock')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="variant" class="form-label">Variant</label>
              <input type="text" class="form-control @error('variant') is-invalid @enderror" id="variant" name="variant" required value="{{ old('variant', $product->variant) }}">
              @error('variant')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Gambar Produk</label>
              <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image">
              @error('image')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            <div class="mb-3">
              <label for="description" class="form-label">Deskripsi</label>
              <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" 
              name="description" required value="{{ old('description', $product->description) }}">
              @error('description')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="my-4">
              <a href="/dashboard" class="btn btn-secondary">Kembali ke Dashboard</a>
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>
@endsection