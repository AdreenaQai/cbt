<?php 
// koneksi database
include 'koneksi.php';
include 'daftar_barcode';

// date_default_timezone_set('asia/makassar');

// $idBarcode = $_POST['idBarcode'];
// $tugas = $_POST['tugas'];
// $img = $_POST['foto'];

// $img = time().".jpg";
// $target_dir ='uploads/';
// $data = file_get_contents('php://input');



// $keterangan = $_POST['keterangan'];
// $log_waktu = $_POST['log_waktu'];
// $log_waktu = time();

$foto_raw = $_POST['foto_raw'];
$bin = base64_decode($foto_raw);
$im = imageCreateFromString($bin);

// $sql_simpan = mysqli_query($koneksi,"INSERT INTO ekspedisi VALUES('','$idBarcode','$tugas','$img','$keterangan','$log_waktu','$username')");


// if($sql_simpan){
// 	echo "Data berhasil disimpan !";}
// 	else {
// 		echo "Data gagal disimpan !";
// 	}



if(!$im){

die();

}
else{
$img_file = 'uploads/'.$img;
imagepng($im, $img_file,0);
imagedestroy($im);
}

	
?>

