<?php 
// Date
// Untuk menampilkan tanggal dengan format tertentu
// echo date("l, d-M-Y"); 

// Time
// UNIX Timestamp / EPOCH time
// Detik yang sudah berlalu sejak 1 Januari 1970
// echo time();

// mktime
// membuat sendiri detik
// mktime(0,0,0,0,0,0,)
// jam, menit, detik, bulan, tanggal, tahun
// echo date("l", mktime(0,0,0,12,2,2002));


// strtotime
echo date("l", strtotime("2 dec 2002"));

?>