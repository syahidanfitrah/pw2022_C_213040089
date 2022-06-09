<?php
require 'functions.php';

$film = query("SELECT * FROM film");
if ( isset($_POST['cari']) ) {
  $film = cari($_POST["keyword"]);
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Cinema Film</title>
  <link rel="shortcut icon" href="img/Logo.png">
  <style>
    body {
      background-color: black;
    }
  </style>
</head>

<body>

  <div class="container ">
    <h1 class="align-midcle text-warning">Cinema Film</h1>
    <a href="tambah.php" class="btn btn-warning">Add Movies Data</a>
    <form action="" method="post" class="mt-4">
      <div class="input-group mb-3 mt-4 w-25">
        <input type="text" class="form-control" name="keyword" placeholder="Search Movies" autocomplete="off">
        <button class="btn btn-warning" type="submit" name="cari">Search</button>
      </div>
    </form>
    <a class="btn btn-warning text-right" href="logout.php">Logout</a>
    <table class="table">
    <div class="row">
          <?php if (empty($film)) : ?>
            <div class="col-md-12">
              <h1 class="text-center text-warning">Movies Not Found!</h3>
            </div>
          <?php endif; ?>
        </div>
      <?php
      $no = 1;
      foreach ($film as $row) : ?>
        <tr>
        <th>
          <th scope="row" class="align-middle text-warning"><?php echo $no++; ?></th>
          <td class="align-middle ">
          <img src="img/<?= $row['gambar']; ?>" width="120px" alt="" class=" mx-auto d-block">
          </td>
          <td class="align-middle text-warning"><?php echo $row["judul"]; ?></td>
          <td class="align-middle text-warning"><?php echo $row["tahun_rilis"]; ?></td>
          <td class="align-middle text-warning"><?php echo $row["sutradara"]; ?></td>
          <td class="align-middle text-warning"><?php echo $row["genre"]; ?></td>
          <td class="align-middle">
            <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-warning justify-warning-end">Change</a>
            <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-danger justify-content-end" onclick="return confirm('Are you sure you want to delete the data!');">Delete</a>
          </td>
        </th>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="footers" style="background-color:black; padding-top:100px; padding-bottom:40px;">
  <footer class="text-white text-center ms-auto" >
      <p class="fw-bolt" style="color: #ffc107;">Created with by - Cinema Film</p>
    </footer>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>