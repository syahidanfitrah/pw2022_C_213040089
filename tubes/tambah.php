<?php

session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");

}
require 'functions.php';

if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
    alert('Data added successfully');
    document.location.href ='admin.php';
    </script>";
  } else {
    echo "Data failed to add!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product Data</title>
  <link rel="shortcut icon" href="img/Logo.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style>
    body {
      background-color: black;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-light bg-black">
    <a class="navbar-brand text-warning" href="#">
      Form Add Product List
    </a>
    <p>
      <a href="admin.php" class="btn btn-warning mt-2">Back</a>
    </p>
  </nav>
  <div class="container mt-5">
    <form action="" method="POST" enctype="multipart/form-data" class="ml-5 mt-3">
    <div class="form-group">
        <div class="row">
          <div class="col">
            <label>
            </label>
          </div>
          <div class="col">
            <input type="hidden" name="id" class="form-control" value="<?= $row['id']; ?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-2 text-warning">
            <label>
              Title :
            </label>
          </div>
          <div class="col-sm-4 ">
            <input type="text" name="judul" class="form-control" autofocus required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-2 text-warning">
            <label>
            Release year :
            </label>
          </div>
          <div class="col-sm-4">
            <input type="text" name="tahun_rilis" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-2 text-warning">
            <label>
            Director:
            </label>
          </div>
          <div class="col-sm-4">
            <input type="text" name="sutradara" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-2 text-warning">
            <label>
            Genre :
            </label>
          </div>
          <div class="col-sm-4">
            <input type="text" name="genre" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-2 text-warning">
            <label>
            storyline :
            </label>
          </div>
          <div class="col-sm-4">
            <input type="text" name="sinopsis" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-2 text-warning">
            <label>
              gambar :
            </label>
          </div>
          <div class="col-sm-4 text-warning">
            <input type="file" name="gambar" class="gambar" onchange="previewImage()">
            <img src="img/kosong.jpg" width="120" style="display: block;" class="img-preview">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-2">

          </div>
          <div class="col-sm-4">
            <button type="submit" name="tambah" class="btn btn-warning">Add Data!</button>
            <button type="reset" name="reset" class="btn btn-danger">Reset</button>
          </div>
        </div>
      </div>
    </form>
  </div>


  <script src="../js/script.js"></script>
</body>

</html>