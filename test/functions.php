<?php

function koneksi()
{
  $conn = mysqli_connect('localhost', 'root', '') or die('Koneksi ke DB GAGAL!');
  mysqli_select_db($conn, 'teknologi') or die("Database salah!");
  return $conn;
}

function query($query)
{
  $conn = koneksi();
  // Query ke tabel teknologi
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    // Selama masih ada baju di lemari, ambil terus hingga habis
    $rows[] = $row;
  }

  return $rows;
}


function tambah($data)
{
  $conn = koneksi();

  //  cek apakah ada gambar yang diupload
  if ($_FILES["gambar"]["error"] == 4) {
    // jika user tidak memilih gambar, beri gambar default
    $gambar = 'nophoto.jpg';
  } else {
    // jika user memilih gambar, jalankan fungsi upload
    $gambar = upload();
    // cek apakah upload berhasil
    if (!$gambar) {
      return false;
    }
  }
  $nama = htmlspecialchars($data["nama"]);
  // $gambar = htmlspecialchars($data["gambar"]);
  $spesifikasi = htmlspecialchars($data["spesifikasi"]);

  $query = "INSERT INTO 
                asus_data 
             VALUES
             (null, '$nama', '$gambar', '$spesifikasi')
            ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();

  // ambil data teknologi
  $teknologi = query("SELECT * FROM asus_data WHERE id = $id")[0];

  // hapus data gambar
  if ($teknologi["gambar"] !== 'nophoto.jpg') {
    unlink('img/' . $teknologi["gambar"]);
  }

  mysqli_query($conn, "DELETE FROM asus_data WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $gambar_lama = htmlspecialchars($data['gambar_lama']);
  $spesifikasi = htmlspecialchars($data['spesifikasi']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  if ($gambar == 'nophoto.png') {
    $gambar = $gambar_lama;
  }

  $query = "UPDATE asus_data SET
              nama = '$nama',
              gambar = '$gambar',
              spesifikasi = '$spesifikasi'
              WHERE id = '$id'
            ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function upload()
{
  // siapkan data gambar
  $filename = $_FILES["gambar"]["name"];
  $filesize = $_FILES["gambar"]["size"];
  $filetmpname = $_FILES["gambar"]["tmp_name"];
  $filetype = pathinfo($filename, PATHINFO_EXTENSION);
  $allowedtype = ["jpg", "jpeg", "png"];

  // cek apakah file bukan gambar
  if (!in_array($filetype, $allowedtype)) {
    echo "<script>
          alert('Yang anda upload bukan gambar!');
          </script>";
    return false;
  }

  // cek jika ukuran lebih besar dari 1MB
  if ($filesize > 1000000) {
    echo "<script>
    alert('Ukuran gambar terlalu besar!');
    </script>";
    return false;
  }

  // lolos pengecekan gambar
  // buat nama file baru
  $newfilename = uniqid() . $filename;
  // upload gambar
  move_uploaded_file($filetmpname, 'img/' . $newfilename);

  return $newfilename;
}
function login($data)
{
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  // cek dulu username
  if ($user = query("SELECT * FROM users WHERE username = '$username'")) {
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
    'pesan' => 'Username / Password Salah!'
  ];
}

function registrasi($data)
{
  $conn = koneksi();

  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  // jika username / pw kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
          alert('username / password tidak boleh kosong!');
          document.location.href = 'registrasi.php';
          </script>";
    return false;
  }

  // jika username sudah ada
  if (query("SELECT * FROM users WHERE username = '$username'")) {
    echo "<script>
    alert('username sudah terdaftar');
    document.location.href = 'registrasi.php';
    </script>";
    return false;
  }

  // jika konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    echo "<script>
          alert('konfirmasi password tidak sesuai!');
          document.location.href = 'registrasi.php';
          </script>";
    return false;
  }

  // jika password < 5 digit
  if (strlen($password1) < 5) {
    echo "<script>
        alert('password terlalu pendek!');
        document.location.href = 'registrasi.php';
        </script>";
    return false;
  }

  // jika username & password sudah sesuai
  // enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  // insert ke tabel user
  $query = "INSERT INTO users
            VALUES
            (null, '$username', '$password_baru')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
