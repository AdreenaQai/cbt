<?php 
session_start();

include 'koneksi.php';



$username = $_POST['username'];
$pass= $_POST['pass'];
$login = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username'");


if(mysqli_num_rows($login) === 1){



	$row = mysqli_fetch_assoc($login);
	if($pass == $row["pass"] and $username == $row["username"]){
		echo "Berhasil login!";

	}
	else{
	 echo "Username & Password Anda Salah!";
	}

}
else{
	echo "Username & Password Anda Salah!";
   }


// // menghitung jumlah data yang ditemukan
// $cek = mysqli_num_rows($login);

// // cek apakah username dan password di temukan pada database
// if($cek === 1){

// 	// $data = mysqli_fetch_assoc($login);

// 	echo "Berhasil login!";

// }else{
// 	 echo "Username & Password Anda Salah!";
// }
?>