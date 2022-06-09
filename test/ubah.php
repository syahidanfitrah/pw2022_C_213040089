<?php
require 'functions.php';

// Query data teknologi berdasarkan id
$id = $_GET['id'];
$row = query("SELECT * FROM asus_data WHERE id = $id")[0];

// cek ketika tombol ubah sudah diklik
if (isset($_POST['ubah'])) {

  // ubah data di tabel mahasiswa
  if (ubah($_POST) > 0) {
    echo "<script>
                alert('data berhasil diubah!');
                document.location.href = 'admin.php';
              </script>";
  } else {
    echo "data gagal diubah!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Produk</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      Form Ubah Data Produk
    </a>
    <p>
      <a href="admin.php" class="btn btn-primary mt-2">Kembali</a>
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
          <div class="col-sm-2">
            <label>
              Nama :
            </label>
          </div>
          <div class="col-sm-4">
            <input type="text" name="nama" class="form-control" autofocus required>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-2">
            <label>
              Spesifikasi :
            </label>
          </div>
          <div class="col-sm-4">
            <input type="text" name="spesifikasi" class="form-control" required value="<?= $row['spesifikasi']; ?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-2">
            <input type="hidden" name="gambar_lama" value="<?= $row['gambar']; ?>">
            <label>
              Gambar :
            </label>
          </div>
          <div class="col-sm-4">
            <input type="file" name="gambar" class="gambar" onchange="previewImage()">
            <img src="../img/<?= $row['gambar']; ?>" width="150" style="display: block;" class="img-preview">
          </div>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" name="ubah" class="btn btn-success">Ubah Data!</button>
      </div>
    </form>
  </div>
</body>

</html>