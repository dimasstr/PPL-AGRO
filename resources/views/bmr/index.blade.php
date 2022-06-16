@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="bg-light text-dark rounded mb-2">
                <div class="col-md-12 my-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mx-3">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Hitung BMR</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between flew-wrap flex-md-nowrap align-items-center mb-2">
        <h1 class="h2">Hitung BMR</h1>
    </div>
    <p class="pb-2 border-bottom">Basal Metabolic Rate (BMR) adalah kalori yang tubuh Anda perlukan untuk melakukan aktivitas
        dasar tubuh.</p>

    <div class="bmr-calculator">
        <div class="row">
            <div class="col-lg-5">
                <div class="controls">
                    <form>
                        @csrf
                        <div class="gender mb-3">
                            <label for="gender" class="form-label">Gender</label> <br>
                            <input type="radio" id="male" value="male" name="gender" />
                            <label for="male">Laki - laki</label>
                            <input type="radio" id="female" value="female" name="gender" />
                            <label for="female">Perempuan</label>
                        </div>
                        <div class="age mb-3">
                            <label for="age" class="form-label">Umur</label>
                            <div class="input-group">
                                <input type="number" class="form-control @error('age') is-invalid @enderror" id="age"
                                    name="age" min=10>
                                <span class="input-group-text">tahun</span>
                            </div>
                            @error('age')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="height mb-3">
                            <label for="height" class="form-label">Tinggi Badan</label>
                            <div class="input-group">
                                <input type="number" class="form-control @error('height') is-invalid @enderror" id="height"
                                    name="height" min="100">
                                <span class="input-group-text">cm</span>
                            </div>
                            @error('height')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="weight mb-3">
                            <label for="weight" class="form-label">Berat Badan</label>
                            <div class="input-group">
                                <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight"
                                    name="weight" min="10">
                                <span class="input-group-text">kg</span>
                            </div>
                            @error('weight')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </form>
                    <div class="result mx-2 my-2">
                        <div class="error-message">
                            <p>Harap masukkan data dengan benar.</p>
                        </div>
                        <button class="calculate-btn btn btn-success">Hitung</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Hasil Penghitungan</h4>
                    </div>
                    <div class="result mx-2 my-2">
                        <div class="result-message">
                            <h4><span class="calories">-</span> Kalori/hari </h4>
                        </div>
                    </div> <hr>
                    {{-- @if( = 1600 )
                    <div class="mt-2">
                        <p>berhasil</p>
                    </div>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>  

    <script src="js/main.js"></script>
@endsection
