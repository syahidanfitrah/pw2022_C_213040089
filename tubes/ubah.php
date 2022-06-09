<?php
require 'functions.php';

// Query data teknologi berdasarkan id
$id = $_GET['id'];
$row = query("SELECT * FROM film WHERE id = $id")[0];

// cek ketika tombol ubah sudah diklik
if (isset($_POST['ubah'])) {

  // ubah data di tabel mahasiswa
  if (ubah($_POST) > 0) {
    echo "<script>
                alert('Data changed successfully!');
                document.location.href = 'admin.php';
              </script>";
  } else {
    echo "Data failed to change!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Product Data</title>
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
      Form Change Product Data
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
          <div class="col-sm-4">
            <input type="text" name="judul" class="form-control" autofocus required value="<?= $row["judul"]; ?> ">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-2 text-warning">
            <label>
              Release Year :
            </label>
          </div>
          <div class="col-sm-4">
            <input type="text" name="tahun_rilis" class="form-control" required value="<?= $row['tahun_rilis']; ?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-2 text-warning">
            <label>
              Director :
            </label>
          </div>
          <div class="col-sm-4">
            <input type="text" name="sutradara" class="form-control" required value="<?= $row['sutradara']; ?>">
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
            <input type="text" name="genre" class="form-control" required value="<?= $row['genre']; ?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-2 text-warning">
            <input type="hidden" name="gambar" value="<?= $row['gambar']; ?>">
            <label>
              Gambar :
            </label>
          </div>
          <div class="col-sm-4">
            <input type="file" name="gambar" class="gambar" onchange="previewImage()">
            <img src="img/<?= $row['gambar']; ?>" width="150" style="display: block;" class="img-preview">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-2">

          </div>
          <div class="col-sm-4">
          <button type="submit" name="ubah" class="btn btn-warning">Change Data!</button>
          </div>
        </div>
       
      </div>
    </form>
  </div>
</body>

</html>