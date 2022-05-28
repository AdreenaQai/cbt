<?php 
// koneksi database

// session_start();

include 'koneksi.php';
// include 'login.php';
// include 'kompresgambar.php';

date_default_timezone_set('asia/makassar');


// $username = $_POST['username'];
// $pass= $_POST['pass'];
header('Content-Type: image/png');


$idBarcode = $_POST['idBarcode'];
$tugas = $_POST['tugas'];
$img = $_POST['foto'];
$keterangan = $_POST['keterangan'];
$log_waktu = time();

$username = $_POST['username'];
$pasword = $_POST['pass'];

// $img = time().".jpg";
// $target_dir ='uploads/';
// $data = file_get_contents('php://input');

//================gambar=========================
$percent = 0.1;
// Content type

$img_file = 'uploads/'.$img;//direktori dan nama file gambar sama dengan di database
$foto_raw = $_POST['foto_raw'];
$bin = base64_decode($foto_raw);
$im = imageCreateFromString($bin);

$width = imagesx($im);
$height = imagesy($im);
$newwidth = $width * $percent;
$newheight = $height * $percent;

$thumb = imagecreatetruecolor($newwidth, $newheight);


if(!$im){

die();

}
else{

// Resize
imagecopyresized($thumb, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

//imagerotate
$img_rotate = imagerotate($thumb, 270, 0);


// Output
// imagejpeg($gambarbaru);
imagepng($img_rotate, $img_file,0);


}

// imagepng($im);


//cek input tugas ganda
// $query_barcode=mysqli_query($koneksi,"SELECT * FROM ekspedisi WHERE idBarcode='$idBarcode' AND tugas='$tugas'");
// $cek=mysqli_num_rows($query_barcode);

// if($cek > 0):
// 	echo "input tugas yang anda isi sudah dilakukan!";


// if($idBarcode == "" or $tugas == ""){
// 	echo "Scan Barcode dan Tugas tidak Boleh Ada Yang Kosong!";
// // 	}
// // 	elseif($idBarcode<>"" or $tugas <>""){
// // 		echo "Scan Barcode dan Tugas tidak Boleh Ada Yang Kosong!";}
// // 			elseif(!(file_put_contents($target_dir.$foto,$data) === FALSE)){
// // 			$sql_simpan=mysqli_query($koneksi,"INSERT INTO ekspedisi VALUES('','$idBarcode','$tugas','$foto','$keterangan','$log_waktu')");
// //  			echo "Selamat anda berhasil melakukan input data!";} 
// // 			 	else {
// //  						echo "Maaf input data anda gagal dilakukan!";
// // 	


// // if($idBarcode == "" or $tugas == ""){
// // echo "Scan Barcode dan Tugas tidak Boleh Ada Yang Kosong!";
// // }
// 	else{
	// if(!(file_put_contents($target_dir.$img,$data) === FALSE)):
	
	
	// }

// endif;


$sql_petugas = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND pass='$pasword'");
// $sql_petugas = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username'");
if(mysqli_num_rows($sql_petugas) === 1){ 
	// echo $username;
	// echo "<br>";
	// echo $pasword;
	// echo "<br>";
	// echo "berhasil sql_petugas";
	// echo "<br>";
}
	else{ echo "Tidak berhasil sql_petugas"; }

	
$petugas = mysqli_fetch_assoc($sql_petugas);
$input_nama = $petugas["nama"];
$no_berkas = explode(";",$idBarcode);
// echo $no_berkas[0];


$query = "INSERT INTO ekspedisi VALUES('','$idBarcode','$tugas','$img','$keterangan','$log_waktu','$input_nama','$no_berkas[0]')";
// echo $query;
$sql_simpan = mysqli_query($koneksi, $query);


if($sql_simpan){
	echo "Data berhasil disimpan!";}
else {
		echo "Data gagal disimpan!";
	}



imagedestroy($thumb);
// session_destroy();
?>

