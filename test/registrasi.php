<?php
require 'functions.php';

if (isset($_POST['registrasi'])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
          alert('user baru berhasil ditambahkan. silahkan login');
          document.location.href = 'login.php';
        </script>";
  } else {
    echo 'user gagal ditambahkan!';
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Registrasi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body style="height: 750px;">
  <div class="register-photo" style="height: 690px;">
    <div class="form-container">
      <form method="post" style="height: 400px;">
        <h2 style="font-family: Allerta, sans-serif;color: rgb(0,0,0);">
          <strong>Buat Akun</strong>
        </h2>
        <div class="form-group">
          <label for="username" class="text-dark ">Username :</label>
          <input class="form-control mt-4 w-25 " type="text" name="username" id="username" style="background-color: rgb(255,255,255);" required autofocus autocomplete="off">
        </div>
        <div class="form-group ">
          <label for="password" class="text-drak">Password :</label>
          <input class="form-control mt-4 w-25" type="password" name="password1" id="password1" style="background-color: rgb(255,255,255);" required>
        </div>
        <div class="form-group">
          <label for="password" class="text-dark">Konfirmasi Password :</label>
          <input class="form-control mt-4 w-25" type="password" name="password2" id="password2" style="background-color: rgb(255,255,255);" required>
        </div>
        <div class="form-group mt-4 w-25">
          <button class="btn btn-primary btn-block" data-bs-hover-animate="pulse" name="registrasi" type="submit" style="background-color: rgb(255,0,53);">Registrasi</button>
        </div>
        <p class="mb-1">Sudah punya akun? </p>
        <a href="login.php" class="btn btn-primary">Login</a>
      </form>
    </div>
  </div>
</body>

</html>