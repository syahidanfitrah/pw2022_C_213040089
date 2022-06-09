<?php
require 'functions.php';
// Query ke tabel film
$id = $_GET['id'];
$row = query("SELECT * FROM film WHERE id = $id")[0];
// Query tabel film sesuai keyword pencarian
if (isset($_GET["cari"])) {
  $keyword = $_GET["keyword"];
  $query = "SELECT * FROM film
              WHERE 
            nama LIKE '%$keyword%'";
  $row = query($query);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Cinema Film</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="shortcut icon" href="img/Logo.png">
  <style>
    html {
      scroll-behavior: smooth;
    }
    body {
      background-color: black;
    }
  </style>
</head>

<body>
<nav class="navbar navbar-light navbar-expand-md navigation-clean-search" id="page-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="img/Logo.png" width="70px" alt="">
      </a>
      <div class="tombol">
      <button data-toggle="collapse" class="navbar-toggler btn btn-warning bg-warning" data-target="#navcol-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon"></span>
    </div>

        </span>
      </button>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav">
          <li class="nav-item" role="presentation" class="fw-bold"><a class="nav-link text-warning" href="index.php" >Home</a></li>
        </ul>
      </div>
    </div>
  </nav>
    <div class="container mb-5">
      <div class="row">
        <div class="col">
          <img src="img/<?= $row['gambar']; ?>" width="500px" alt="" class=" mx-auto d-block">
        </div>
      </div>
      <div class="row text-warning">
        <div class="col">
          <h1 class="mb-5"><?= $row['judul']; ?></h1>
          <h2><?= $row['tahun_rilis']; ?></h2>
          <h2><?= $row['sutradara']; ?></h2>
          <h2><?= $row['genre']; ?></h2>
          <h4 class="text-center" >Storyline</h4>
          <h4 class="text-center"><?= $row['sinopsis']; ?></h4>
          <a href="index.php" class="btn btn-warning mt-3 shadow">Back</a>
        </div>
      </div>
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