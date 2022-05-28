<?php
    

    // $mysqli=new mysqli("localhost","root",'',"db_mobile_cekberkasta");

    $no_berkas = $_POST['no_berkas'];
    $thn_berkas = $_POST['thn_berkas'];
    $prosedur = $_POST['prosedur'];
    $nama_pemohon = $_POST['nama_pemohon'];
    
    $mysqli->query("INSERT INTO tbl_qr VALUES ('$no_berkas','$thn_berkas','$prosedur','$nama_pemohon')");

    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script type='text/javascript'> document.location = 'index.php?page=data_berkas'; </script>"; 
?>