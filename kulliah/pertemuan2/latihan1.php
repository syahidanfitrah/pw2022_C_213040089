<?php 
// Latihan Pertemuan 2
// Variabel
// Nilai: Angka (integer)
// Tulisan (string)
// Boolean (true/false)

// Penulisan box/dolar
// Nama bebas, tidak boleh spasi
// Boleh angka, tapi tidak di awal

$nama = "Syahidan Fitrah";
echo $nama;
echo "<hr>";
// OPERATOR Aritmatika 
// + , - , * , /,  % 
echo (1 + 2) * 3 - 4;
echo "<br>";

echo 10 % 5;

echo "<hr>";

$x = 10;
$y = 20;
echo $x * $y;

echo "<hr>";

// perbandingan 
// <, >, <=, >=, ==, !=
// Operator perbandingan tidak meng-cek tipe datanya 
echo 2 < 4;

echo "<br>";

var_dump(1>5);

echo "<hr>";

// Identitas 
// ===, !==
echo 10 === 10;

echo "<br>";

var_dump(1=== "1");
echo "<hr>";

// increment / decrement 1 : ++, --
$x = 10;
$x++;
echo $x;
echo "<hr>";

// Concat ( . ) 
//  . " " . agar ada spasi
$nama_depan = "Syahidan" ;
$nama_belakang = "Fitrah" ;
echo $nama_depan . " " . $nama_belakang ;

echo "<hr>";
// Assignment 
// =, +=, -= ,/=, %=, .=
$x = 1;
$x -= 5;
echo $x;

echo "<hr>";

//  Operator Logika
//  &&, | | ,  !
// Pengkondisian
$x = 30;
var_dump($x < 20 && $x % 2 ==0);
?>