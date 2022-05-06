<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
      <a class="navbar-brand" href="/">Kribu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Beranda' ? 'active' : '') }}" href="/">Beranda</a>
          </li>
            <a class="nav-link {{ ($title === 'Informasi Toko' ? 'active' : '') }}" href="/tentang">Informasi Toko</a>
          </li>
        </ul>
        
        <ul class="navbar-nav, ms-auto, pt-3">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Hi, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @can('owner')
              <li><a class="dropdown-item" href="/dashboard"> <i class="bi bi-person-circle"></i> Dashboard</a></li>
              @endcan
              @can('customer')
              <li><a class="dropdown-item" href="/profile"> <i class="bi bi-person-circle"></i> Profile</a></li>
              @endcan   
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"> <i class="bi bi-box-arrow-right"></i> Keluar</button>
                </form>
              </li>
            </ul>
          </li>
          @else
            <li class="nav-item">
              <a href="/login" class="nav-link, btn btn-outline-light">Masuk</a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
