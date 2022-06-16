<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
      <a class="navbar-brand" href="/">Kribu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @can('owner')
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Dashboard' ? 'active' : '') }}" href="/dashboard">Dashboard</a>
          </li>
            <a class="nav-link {{ ($title === 'Data Customer' ? 'active' : '') }}" href="/data-customer">Data Customer</a>
          </li>
            <a class="nav-link {{ ($title === 'List Pesanan' ? 'active' : '') }}" href="/pesanan-customer">Pesanan</a>
          </li>
          <a class="nav-link {{ ($title === 'Transaksi Toko' ? 'active' : '') }}" href="/transaksi">Transaksi</a>
          </li>
            <a class="nav-link {{ ($title === 'Informasi Toko' ? 'active' : '') }}" href="/tentang-kami">Informasi Toko</a>
          </li>
        </ul>
        @endcan
        <ul class="navbar-nav, ms-auto, pt-3">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Hi, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              {{-- <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item" onclick="return confirm ('Apakah Anda yakin ingin logout?')"> <i class="bi bi-box-arrow-right"></i> Keluar</button>
                </form>
              </li> --}}
              <li>
                <li><a class="dropdown-item" href="/"> <i class="bi bi-house-door"></i> | Halaman Utama</a></li>
              </li>
            </ul>
          </li>
          @else
            <li class="nav-item">
              <a href="/login" class="nav-link, btn btn-light">Masuk</a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
  
  {{-- <main>
    <h1 class="visually-hidden">Sidebars examples</h1>
  
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4">Sidebar</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="#" class="nav-link active" aria-current="page">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
            Home
          </a>
        </li>
        <li>
          <a href="#" class="nav-link text-white">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
            Dashboard
          </a>
        </li>
        <li>
          <a href="#" class="nav-link text-white">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
            Orders
          </a>
        </li>
        <li>
          <a href="#" class="nav-link text-white">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
            Products
          </a>
        </li>
        <li>
          <a href="#" class="nav-link text-white">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
            Customers
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
          <li><a class="dropdown-item" href="#">New project...</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
      </div>
    </div>
   --}}