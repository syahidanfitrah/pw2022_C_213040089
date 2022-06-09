<?php
require 'functions.php';
// Query ke tabel asus_data
$id = $_GET['id'];
$row = query("SELECT * FROM asus_data WHERE id = $id")[0];
// Query tabel asus_data sesuai keyword pencarian
if (isset($_GET["cari"])) {
  $keyword = $_GET["keyword"];
  $query = "SELECT * FROM asus_data
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
  <title>Asus Zenbook</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>

<body>
  <div>
    <div class="container mb-5">
      <div class="row">
        <div class="col">
          <img src="img/<?= $row['gambar']; ?>" width="350px" id="zoom" alt="" class=" mx-auto d-block">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <h1 class="mb-5"><?= $row['nama']; ?></h1>
          <h3><?= $row['spesifikasi']; ?></h3>
          <a href="index.php" class="btn btn-primary mt-3 shadow">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>