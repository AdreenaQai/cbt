<?php 
// koneksi database
include 'koneksi.php';

$no = $_POST['no_berkas'];
$tahun = $_POST['tahun_berkas'];

// $query=mysqli_query($koneksi,"SELECT * FROM tbl_berkas INNER JOIN ekspedisi ON tbl_berkas.no_berkas=ekspedisi.no_berkas WHERE no_berkas='$no' AND tahun_berkas='$tahun'");
// $query=mysqli_query($koneksi,"SELECT * FROM tbl_berkas WHERE no_berkas='$no' AND tahun_berkas='$tahun'");
$query=mysqli_query($koneksi,"SELECT * FROM ekspedisi WHERE no_berkas='$no' ORDER BY tugas DESC LIMIT 1  ");

// $sql_info_berkas = "SELECT * FROM tbl_berkas INNER JOIN ekspedisi ON tbl_berkas.no_berkas = ekspedisi.no_berkas 
//                           WHERE tbl_berkas.no_berkas='$no' AND tbl_berkas.tahun_berkas='$tahun' ORDER BY ekspedisi.tugas DESC LIMIT 1 ";

if(isset($query))
{

	$m=mysqli_fetch_array($query);

	echo $m['tugas'];
}
else
{
	echo "Data yang Anda cari tidak ditemukan dalam database!";
}

?>

