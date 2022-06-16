<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/footers/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="footers.css" rel="stylesheet">
  </head>
  <body>

<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted">&copy; 2021 Kribu, Inc</p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
    </a>

    <ul class="nav col-md-4 justify-content-end">
      @auth
      <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
      @endauth
      <li class="nav-item"><a href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=kripik.buah@gmail.com" class="nav-link px-2 text-muted">Beri Ulasan</a></li>
      <li class="nav-item"><a href="https://wa.me/628123476306?text=Halo%20kak%20saya%20ingin%20tanya-tanya%20dong" class="nav-link px-2 text-muted">Hubungi Kami</a></li>
      
    </ul>
  </footer>
</div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
