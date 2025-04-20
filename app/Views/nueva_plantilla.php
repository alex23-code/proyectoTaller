<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initialscale=1, shrink-to-fit=no">
    <title>Bootstrap demo</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="">
    <link rel="stylesheet" href="assets/css/miEstilo2.css">
  </head>
  <body>
     <section class="container-fluid">
     <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</section>
        <!-- Carousel-->
   <section class="container">

   <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/remera.jpg" width="480" height="300" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/img/jean.jpg" width="480" height="300" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/img/chaqueta.jpg" width="480" height="300" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>

<section class="container">
    <h1 class="bg-primary mt-3 px-2 mx-auto p-2 text-center fw-bold" style="width: auto;"> Esta es una página de ventas de indumentaria </h1>
    <p class="mt-3 bg-warning px-2 fst-italic"> Tenemos promociones con tarjeta de crédito y débito </p>
    <p class="mt-3 bg-warning px-2 fst-italic"> Estamos en av. rios 33e </p>
    <p class="mt-3 bg-warning px-2 fst-italic"> Tenemos rebajas por cambio de estación </p>

</section>

<footer class="text-center footer"> Pie de pagina </footer>


     <script src="assets/js/bootstrap.bundle.min.js" integrity="" crossorigin=""></script>
  </body>
</html>