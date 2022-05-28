<?php 
$koneksi =mysqli_connect("localhost","root","","cekberkasta");

//cek koneksi
if (mysqli_connect_error()){
	echo "Koneksi database gagal :". mysqli_connect_error();
} 
// else{
// 	echo "Koneksi anda berhasil!";
// }

?>