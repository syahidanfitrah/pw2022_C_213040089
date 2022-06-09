<?php
require 'functions.php';

if (isset($_POST['registrasi'])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
          alert('New user added successfully. please login');
          document.location.href = 'login.php';
        </script>";
  } else {
    echo 'user failed to add!';
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Registrasion</title>
  <link rel="shortcut icon" href="img/Logo.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style>
    body {
      background-color: black;
    }
  </style>
</head>

<body class="nav justify-content-center" style="height: 750px;">
  <div class="register-photo" style="height: 690px;">
    <div class="form-container">
      <form method="post" style="height: 400px;">
        <h2 class="text-warning" style="font-family: Allerta, sans-serif;">
          <strong>Buat Akun</strong>
        </h2>
        <div class="form-group">
          <label for="username" class="text-warning ">Username :</label>
          <input class="form-control mt-2 w-auto " type="text" name="username" id="username" required autofocus autocomplete="off">
        </div>
        <div class="form-group ">
          <label for="password" class="text-warning">Password :</label>
          <input class="form-control mt-2 w-auto " type="password" name="password1" id="password1"  required>
        </div>
        <div class="form-group">
          <label for="password" class="text-warning">Confirm Password :</label>
          <input class="form-control mt-2 w-auto " type="password" name="password2" id="password2"  required>
        </div>
        <div class="form-group mt-2 w-auto">
          <button class="btn btn-warning btn-block" data-bs-hover-animate="pulse" name="registrasi" type="submit" >Registrasi</button>
        </div>
        <p class="mb-1 w-auto text-warning">Already have an account? </p>
        <a href="login.php" class="btn btn-warning">Login</a>
      </form>
    </div>
  </div>
</body>

</html>