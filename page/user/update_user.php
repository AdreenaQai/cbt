<?php
     $id = $_POST['id'];
     $nama = $_POST['nama'];
     $telp = $_POST['telp'];
     $username = $_POST['username'];
     $pass = $_POST['pass'];
     $status = $_POST['stat'];

//cek data
// echo $id;
// echo "<br>";
// echo $nama;
// echo "<br>";
// echo $telp;
// echo "<br>";
// echo $username;
// echo "<br>";
// echo $pass;
// echo "<br>";
// echo $status;
// echo "<br>";



     $query = "UPDATE user SET nama='$nama',
                               telp='$telp',
                               username='$username',
                               pass='$pass',
                               level_status='$status' 
                               WHERE id_user='$id' ";
     // echo $query;

     $hasil = mysqli_query($koneksi,$query);



     


                                        
     if(!$hasil){
     echo mysqli_error($hasil);}
     else{
          echo "<script>alert('Data berhasil dirubah')</script>";
          echo "<script type='text/javascript'> document.location = 'index.php?page=data_user'; </script>";
     }
     


?>