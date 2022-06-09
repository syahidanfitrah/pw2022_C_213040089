<?php

session_start();

require 'functions.php';

if (isset($_COOKIE['username']) && isset($_COOKIE['hash'])) {
  $username = $_COOKIE['username'];
  $hash = $_COOKIE['hash'];

  $result = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username' ");
  $row = mysqli_fetch_assoc($result);

  if ($hash === hash('sha255', $row['id'], false)) {
    $_SESSION['username'] = $row['username'];
    header("Location: admin.php");
    exit;
  }
}


if (isset($_SESSION['username'])) {
  header("Location: admin.php");
  exit;
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $result = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['password'] = hash('sha256', $row['id'], false);
    
    header("Location: admin.php");
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
  <link rel="shortcut icon" href="img/Logo.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
  <style>
    body {
      background-color: black;
    }
  </style>
</head>

<body>
  <div class="login-clean" style="height: 800;">
    <h2 class="nav justify-content-center text-warning" style="height: 70px;margin-top: 20px; margin-bottom:20px;color: rgb(0,0,0);font-family: Allerta, sans-serif;">
      <strong>Login</strong>
    </h2>
    <?php if (isset($error)) : ?>
      echo "<script>
        alert('Wrong Username or Password!');
        document.location.href = 'login.php';
      </script>";
    <?php endif; ?>
    <form class="mx-auto w-50" method="post">
      <div class="form-group text-warning ">
        <label class="" for="username">Username :</label><br>
        <input type="text" name="username" id="username" class="form-control" autocomplete="off">
      </div>
      <div class="form-group text-warning">
        <label for="username">Password :</label><br>
        <input type="password" name="password" id="password" class="form-control ">
      </div>
      <input type="submit" name="submit" class="btn btn-warning btn-md mt-3" data-bs-hover-animate="pulse" value="Login">
      
  <div id="register-link" class=" w-100">
    <p class="mb-1 mt-2 text-warning">Don't have an account yet?</p>
    <a class="text-warning" href="registrasi.php">Register Here</a>
  </div>
  </form>
    </div>
</body>

</html>