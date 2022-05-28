<?php
     $nama = $_POST['nama'];
     $telp = $_POST['telp'];
     $username = $_POST['username'];
     $pass = $_POST['pass'];
     $status = $_POST['status'];

    mysqli_query($koneksi,"INSERT INTO user VALUES ('','$nama','$telp','$username','$pass','$status')");

    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script type='text/javascript'> document.location = 'index.php?page=data_user'; </script>"; 
?>