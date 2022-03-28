<?php 
// Array Asosiatif
// array yang indexnya berasosiasi atau berpasangan dengan string
// array numerik hanya menampilkan nialainya saja


$mahasiswa = [
        ["Sandhika Galih", "043040023", "sandhikagalih@unpas.ac.id", "Teknik Informatika"],
        ["Syahidan Fitrah", "213040089","syahidan@gmail.com",  "Teknik Informatika"],
        ["Aldi Ramdani", "213040110", "aldi@gmail.com", "Teknik Informatika"]
    ];

// var_dump($mahasiswa)[0][2];
// echo "<br>";
// print_r($mahasiswa);

?>

<?php foreach ($mahasiswa as $mhs) { ?>
<ul>
    <li>Nama : <?= $mhs [0] ?></li>
    <li>NRP : <?= $mhs [1] ?></li>
    <li>Jurusan : <?= $mhs [2] ?></li>
    <li>Email : <?= $mhs [3] ?></li>
</ul>
<?php } ?>