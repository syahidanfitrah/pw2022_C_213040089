<?php

require 'functions.php';

$film = query("SELECT * FROM film");

if ( isset($_POST['cari']) ) {
  $film = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Cinema Film</title>
  <link rel="shortcut icon" href="img/Logo.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
  <style>
    html {
      scroll-behavior: smooth;
    }
    body {
      background-color: black;
    }
  </style>
</head>

<body id="page-top">
  <nav class="navbar navbar-light navbar-expand-md navigation-clean-search" id="page-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="img/Logo.png" width="80px" alt="">
      </a>
      <div class="tombol">
      <button  data-toggle="collapse" class="navbar-toggler btn btn-warning bg-warning" data-target="#navcol-1">
        <span class="sr-only ">Toggle navigation</span>
        <span class="navbar-toggler-icon "></span>
      </button>
      </div>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav">
     <li class="nav-item " role="presentation"><a class="nav-link text-warning" href="index.php">Home</a></li>
         <li class="nav-item" role="presentation"><a class="nav-link text-warning" href="contact.php">Contact</a></li>
        </ul>
        <form action="" method="post" class="form-inline mr-auto" target="_self">
          <div class="form-group">
            <!-- <label for="search-field">
              <i class="fa fa-search"></i>
            </label> -->
            <input class="form-control text-warning" type="text"  name="keyword" autocomplete="off" id="keyword" placeholder="Search...">
            <button type="submit" name="cari" id="tombol-cari" class="btn btn-warning">Search</button>
          </div>
        </form>
        <!-- <form action="" method="POST" class="form-inline mr-auto">
          <div class="form-group">
            <label for="search-field">
              <i class="fa fa-search"></i>
            </label>
            <input type=" text" class="form-control search-field keyword" name="keyword" id="search-field" placeholder="Masukkan keyword pencarian" autofocus autocomplete="off">
            <button type="submit" name="cari" class="tombol-cari">Cari!</button>
          </div>
        </form> -->
        <a class="btn btn-warning" role="button" data-bs-hover-animate="pulse" href="login.php" style="background-color: warning;">Login</a>
      </div>
    </div>
  </nav>
  <div class="photo-gallery">
    <div class="container">
      <!-- <div class="intro">
        <h1 class="text-center mb-5">Welcome</h1>
        <img src="img/Logo.png" class="rounded mx-auto d-block" width="30%" style="opacity: 0,1;" alt="">
      </div> -->
      <div class="intro">
        <h2 class="text-center"  style="margin-top: 40px"></h2>
      </div>
      
      <div class="tab-content">
        <div class="row">
          <?php if (empty($film)) : ?>
            <div class="col-md-12">
              <h1 class="text-center text-warning">Movies Not Found!</h3>
            </div>
          <?php endif; ?>
        </div>
        <!-- <div class="row row-cols-1 row-cols-md-3 g-4"> -->
        <div class="tab-pane active" role="tabpanel" id="tab-1">
          <div class="card-group">
            <div class="container-fluid">
              <div class="row">
                <?php foreach ($film as $row) : ?>
                  <div class="col-md-4">
                    <div class="card shadow mt-3">
                      <img class="card-img-top img-fluid max-foto" src="img/<?= $row['gambar']; ?>" style="max-height: 200px; min-height: 200px;">
                      <div class="card-body">
                        <h4 class="card-title"><?= $row['judul']; ?></h4>
                        <a href="detail.php?id=<?= $row['id']; ?>" class="btn btn-warning">Detail</a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        <!-- </div> -->
        </div>
        <div class="tab-pane" role="tabpanel" id="tab-2">
          <h1 class="text-center mt-5 mb-5">Movie Not Available!</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="footers" style="background-color:black; padding-top:30px; padding-bottom:40px;">
  <footer class="text-white text-center ms-auto" >
      <p class="fw-bolt" style="color: #ffc107;">Created with by - Cinema Film</p>
    </footer>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bs-animation.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <script src="js/stylish-portfolio.js"></script>
  <script src="js/script.js"></script>
</body>

</html>