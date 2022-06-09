<?php

function koneksi()
{
  $conn = mysqli_connect('localhost', 'root', '') or die('Connection to DB FAILED!');
  mysqli_select_db($conn, 'tubes') or die("Wrong database!");
  return $conn;
}

function query($query)
{
  $conn = koneksi();
  // Query ke tabel tubes
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}


function tambah($data)
{
  $conn = koneksi();

  if ($_FILES["gambar"]["error"] == 4) {
    $gambar = 'kosong.jpg';
  } else {
    $gambar = upload();
    if (!$gambar) {
      return false;
    }
  }
  $judul = htmlspecialchars($data["judul"]);
  $tahun_rilis = htmlspecialchars($data["tahun_rilis"]);
  $sutradara = htmlspecialchars($data["sutradara"]);
  $genre = htmlspecialchars($data["genre"]);
  $sinopsis = htmlspecialchars($data["sinopsis"]);
  // $tahun_rilis = htmlspecialchars($data["tahun_rilis"]);

  $query = "INSERT INTO 
                film 
             VALUES
             (null, '$judul', '$tahun_rilis', '$sutradara', '$genre', '$gambar', '$sinopsis')
            ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function cari($keyword) {
  $query = "SELECT * FROM film 
              WHERE 
            judul LIKE '%$keyword%'
          ";
          return query($query);
}

function hapus($id)
{
  $conn = koneksi();

  $row = query("SELECT * FROM film WHERE id = $id");
  if ($row["gambar"] != 'kosong.jpg') {
    unlink('img/' . $row["gambar"]);
  }

  mysqli_query($conn, "DELETE FROM film WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $judul = htmlspecialchars($data['judul']);
  $tahun_rilis = htmlspecialchars($data['tahun_rilis']);
  $sutradara = htmlspecialchars($data['sutradara']);
  $genre = htmlspecialchars($data['genre']);
  $gambar = htmlspecialchars($data['gambar']);
  $sinopsis = htmlspecialchars($data['sinopsis']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  if ($gambar == 'kosong.jpg') {
    $gambar = $gambar;
  }

  $query = "UPDATE film SET
              judul = '$judul',
              tahun_rilis = '$tahun_rilis',
              sutradara = '$sutradara',
              genre = '$genre',
              gambar = '$gambar',
              sinopsis = '$sinopsis'
              WHERE id = '$id'
            ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function upload()
{
  // data gambar
  $filename = $_FILES["gambar"]["name"];
  $filesize = $_FILES["gambar"]["size"];
  $filetmpname = $_FILES["gambar"]["tmp_name"];
  $error = $_FILES["gambar"]["error"];
  $filetype = pathinfo($filename, PATHINFO_EXTENSION);
  $allowedtype = ["jpg", "jpeg", "png"];

  if($error == 4) {
    return "kosong.jpg";
  }

  // cek apakah file bukan gambar
  if (!in_array($filetype, $allowedtype)) {
    echo "<script>
          alert('Your upload is not an image!');
          </script>";
    return false;
  }

  // cek jika ukuran lebih besar dari 1MB
  if ($filesize > 1000000) {
    echo "<script>
    alert('Image size is too big!');
    </script>";
    return false;
  }

  $newfilename = uniqid() . $filename;
  move_uploaded_file($filetmpname, '../tubes/img/' . $newfilename);
  return $newfilename;
}
function login($data)
{
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
    // cek password
    if (password_verify($password, $user['password'])) {
      // set session
      $_SESSION['login'] = true;

      header("Location: admin.php");
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'Username / Password wrong!'
  ];
}

function registrasi($data)
{
  $conn = koneksi();

  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
          alert('Username / Password can not be empty!');
          document.location.href = 'registrasi.php';
          </script>";
    return false;
  }

  // jika username sudah ada
  if (query("SELECT * FROM user WHERE username = '$username'")) {
    echo "<script>
    alert('Username is already registered');
    document.location.href = 'registrasi.php';
    </script>";
    return false;
  }

  // jika konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    echo "<script>
          alert('Confirm password does not match!');
          document.location.href = 'registrasi.php';
          </script>";
    return false;
  }

  // jika password < 5 digit
  if (strlen($password1) < 5) {
    echo "<script>
        alert('Password is too short!');
        document.location.href = 'registrasi.php';
        </script>";
    return false;
  }

  // jika username & password sudah sesuai
  // enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  // insert ke tabel user
  $query = "INSERT INTO user
            VALUES
            (null, '$username', '$password_baru')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
