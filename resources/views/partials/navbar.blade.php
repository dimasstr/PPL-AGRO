<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
          @auth
          </li>
            <a class="nav-link {{ ($title === 'Hitung Kebutuhan Kalori' ? 'active' : '') }}" href="/hitung-kalori">Hitung BMR</a>
          </li>
          @endauth
        </ul>
        
        <div class="navbar-nav">
          @can('customer')
          @auth
          <?php 
          $ordering = \App\Models\Order::where('user_id', Auth::user()->id)->where('status_id',0)->first();
          if(!empty($ordering))
          {
            $notif = \App\Models\OrderDetail::where('order_id', $ordering->id)->count(); 
          }  
            ?>
            <a class="nav-link {{ ($title === 'Keranjang' ? 'active' : '') }} position-relative" href="/keranjang"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
              <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
            </svg>
            @if(!empty($notif))
            <span class="position-absolute top-3 start-100 translate-middle badge rounded-pill bg-danger">
              {{ $notif }}
            </span>
            @endif
          </a>
        </div>
        @endauth
        @endcan
        <ul class="navbar-nav, ml-auto, pt-3">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Hi, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @can('owner')
              <li><a class="dropdown-item" href="/dashboard"> <i class="bi bi-person-circle"></i> | Dashboard</a></li>
              @endcan
              @can('customer')
              <li><a class="dropdown-item" href="/pesanan"> <i class="bi bi-bag"></i> | Pesanan</a></li>
              <li><a class="dropdown-item" href="/profile"> <i class="bi bi-person-circle"></i> | Profile</a></li>
              @endcan   
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"> <i class="bi bi-box-arrow-right"></i> | Keluar</button>
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
