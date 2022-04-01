<?php 
// supergoals
// variable milik php yang bisa kita gunakan
// bentuknya arra asosiative
// $_GET
// $_POST
// $_SERVER

// $nama = "syahidan";
// var_dump($_GET);

// $_GET["nama"] ="syahidan";
// $_GET["email"] ="syahidan@gmail.com"
if (isset($_GET["nama"])) {
    $nama = $_GET["nama"];
} else {
    $nama = "Tidak Diketahui";
}

?>

<h1>Hallo, <?= $nama; ?></h1>\
<ul>
    <li>
        <a href="kuliah_latihan1.php?nama=Aldi">Aldi</a>
    </li>
    <li>
        <a href="kuliah_latihan1.php?nama=Hilal">Hilal</a>
    </li>
</ul>