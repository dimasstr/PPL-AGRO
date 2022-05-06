<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
      <a class="navbar-brand" href="/">Kribu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Dashboard' ? 'active' : '') }}" href="/dashboard">Dashboard</a>
          </li>
            <a class="nav-link {{ ($title === 'Data Customer' ? 'active' : '') }}" href="/data-customer">Data Customer</a>
          </li>
            <a class="nav-link {{ ($title === 'Informasi Toko' ? 'active' : '') }}" href="/tentang-kami">Informasi Toko</a>
          </li>
        </ul>
        
        <ul class="navbar-nav, ms-auto, pt-3">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Hi, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              {{-- <li><a class="dropdown-item" href="/"></i><i class="bi bi-house-door"></i> Beranda</a></li>
              <li><hr class="dropdown-divider"></li> --}}
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item" onclick="return confirm ('Apakah Anda yakin ingin logout?')"> <i class="bi bi-box-arrow-right"></i> Keluar</button>
                </form>
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