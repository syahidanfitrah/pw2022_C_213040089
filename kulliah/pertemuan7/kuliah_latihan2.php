<?php 

$mahasiswa = [

    [
        "nama" => "Shandika Galih",
        "nrp" => "043040023",
        "email" => "sandhikagalih@unpas.ac.id",
        "jurusan" => "Teknik Informatika",
        "gambar" => "gambar1.jpg",
        "angka" => "1"
    ],
    [
        "nama" => "Syahidan",
        "nrp" => "213040089",
        "email" => "syahidan@gmail.com",
        "jurusan" => "Teknik Informatika",
        "gambar" => "gambar2.png",
        "angka" => "2"
    ],
    [
        "nama" => "Aldi",
        "nrp" => "213040110",
        "email" => "aldi@gmail.com",
        "jurusan" => "Teknik Informatika",
        "gambar" => "gambar3.png",
        "angka" => "3"
    ],
    [
        "nama" => "Yudha",
        "nrp" => "203040023",
        "email" => "yudha@gmail.com",
        "jurusan" => "Teknik Informatika",
        "gambar" => "gambar4.jpg",
        "angka" => "4"
    ],
    [
        "nama" => "Dika",
        "nrp" => "193040089",
        "email" => "dika@gmail.com",
        "jurusan" => "Teknik Informatika",
        "gambar" => "gambar5.jpg",
        "angka" => "5"
    ],
    [
        "nama" => "Hilal",
        "nrp" => "163040110",
        "email" => "hilal@gmail.com",
        "jurusan" => "Teknik Informatika",
        "gambar" => "gambar6.jpg",
        "angka" => "6"
    ]
 ];

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Daftar Mahasiswa</title>
</head>
<body>
    <div class="container">
        <h1>Daftar Mahasiswa</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($mahasiswa as $mhs) { ?>
                    <tr>
                        <th scope="crow"><?php echo $mhs["angka"] ?></th>
                        <td>
                            <img src="img/<?php echo $mhs["gambar"] ?>" height="50" class="rounded-circle" >
                        </td>
                        <td><?php echo $mhs["nama"] ?></td>
                        <td>
                            <a href="" class="btn badge bg-warning">Edit</a>
                            <a href="" class="btn badge bg-danger">Delete</a>
                            <a href="kuliah_latihan3.php?nama=<?= $mhs["nama"]; ?> & nrp=<?= $mhs["nrp"]; ?>& email=<?= $mhs["email"]; ?>& jurusan=<?= $mhs["jurusan"]; ?>& gambar=<?= $mhs["gambar"]; ?>" class="btn badge bg-info">Info</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>











    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

</body>
</html>