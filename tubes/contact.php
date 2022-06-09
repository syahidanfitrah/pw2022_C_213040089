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
    .breadcrumb {
        margin-bottom: 0;
        background-color: black;
    }
    body {
        background-color: black;
    }
    .tombol {
        color: yellow;
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
          <li class="nav-item " role="presentation"><a class="nav-link  text-warning" href="index.php">Home</a></li>
        </ul>
        
      </div>
    </div>
  </nav>
  <div class="photo-gallery">
    <div class="container">
        <div class="intro">
            <h1 class="text-center mb-5 text-warning">Contact</h1>
        </div>
    <form>
  <div class="mb-3">
    <label for="name" class="form-label text-warning">Your Name</label>
    <input type="text" class="form-control" id="name" aria-describedby="name">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label text-warning">Email</label>
    <input type="email" class="form-control" id="email" aria-describedby="email">
  </div>
  <div class="mb-3">
  <label for="pesan" class="form-label text-warning">Message</label>
  <textarea class="form-control" id="pesan" rows="6"></textarea>
</div>
  <button type="submit" class="btn btn-warning ">Send</button>
</form>
    </div> <a href=""></a>
  </div>
  <div class="footers mt-5 p-4" style="background-color:black; padding-top:40px; padding-bottom:80px;">
  <footer class="text-warning text-center ms-auto" >
      <p>Created with by - Cinema Film</p>
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