<?php 

// Array Assosiatif array yang indexnya string


$mahasiswa = [
    [
        "nama" => "Shandika Galih",
        "nrp" => "043040023",
        "email" => "sandhikagalih@unpas.ac.id",
        "jurusan" => "Teknik Informatika"
    ],
    [
        "nama" => "Syahidan",
        "nrp" => "213040089",
        "email" => "syahidan@gmail.com",
        "jurusan" => "Teknik Informatika"
    ],
    [
        "nama" => "Aldi Muhammad",
        "nrp" => "213040110",
        "email" => "aldi@gmail.com",
        "jurusan" => "Teknik Informatika"
    ]
 ];


?>

<?php foreach ($mahasiswa as $mhs) { ?>
    <ul>
        <li>Nama : <?php echo $mhs["nama"] ?></li>
        <li>NRP : <?php echo $mhs["nrp"] ?></li>
        <li>Email : <?php echo $mhs["email"] ?></li>
        <li>Jurusan : <?php echo $mhs["jurusan"] ?></li>
    </ul>
<?php } ?>