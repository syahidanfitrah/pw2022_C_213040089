<?php

session_start();

require 'functions.php';

//cek cookie
if (isset($_COOKIE['username']) && isset($_COOKIE['hash'])) {
  $username = $_COOKIE['username'];
  $hash = $_COOKIE['hash'];

  //ambil berdasarkan id
  $result = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username' ");
  $row = mysqli_fetch_assoc($result);

  //cek cookie dan username
  if ($hash === hash('sha255', $row['id'], false)) {
    $_SESSION['username'] = $row['username'];
    header("Location: admin.php");
    exit;
  }
}

//melakukan pengecekan apkah user sudah melakukan login jika sudah redirect ke halaman admin
if (isset($_SESSION['username'])) {
  header("Location: admin.php");
  exit;
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cek_user = mysqli_query(koneksi(), "SELECT * FROM users WHERE username = '$username'");
  //mencocokkan username dan password
  if (mysqli_num_rows($cek_user) > 0) {
    $row = mysqli_fetch_assoc($cek_user);
    if (password_verify($password, $row['password'])) {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['hash'] = hash('sha255', $row['id'], false);
      //jika remember me decentang
      if (isset($_POST['remember'])) {
        setcookie('username', $row['username'], time() + 60 * 60 * 24);
        $hash = hash('sha255', $row['id']);
        setcookie('hash', $hash, time() + 60 * 60 * 24);
      }
      if (hash('sha255', $row['id']) == $_SESSION['hash']) {
        header("Location: admin.php");
        die;
      }
      header("Location:index.php");
      die;
    }
  }
  $error = true;
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="login-clean" style="height: 800;">
    <h2 class="mt-4 w-25" style="height: 70px;margin-top: 20px; margin-bottom:20px;color: rgb(0,0,0);font-family: Allerta, sans-serif;">
      <strong>Login</strong>
    </h2>
    <?php if (isset($error)) : ?>
      echo "<script>
        alert('Username atau Password salah!');
        document.location.href = 'login.php';
      </script>";
    <?php endif; ?>
    <form class="mb-5 mt-4 w-25" method="post">
      <h2 class="sr-only">Login Form</h2>
      <div class="illustration">
        <i class="fas fa-user" style="color: rgb(255,0,53);"></i>
      </div>
      <div class="form-group">
        <label for="username">Username :</label><br>
        <input type="text" name="username" id="username" class="form-control" autocomplete="off" style="background-color: rgb(255,255,255);">
      </div>
      <div class="form-group">
        <label for="username">Password :</label><br>
        <input type="password" name="password" id="password" class="form-control" style="background-color: rgb(255,255,255);">
      </div>
      <input type="submit" name="submit" class="btn btn-primary btn-md" data-bs-hover-animate="pulse" value="Login">
  </div>
  <div id="register-link" class="text-left">
    <p class="mb-1">Belum punya akun?</p>
    <a href="registrasi.php">Daftar Disini</a>
  </div>
  </form>
  </div>
</body>

</html>