<?php
     $id = $_POST['id'];
     $keterangan = $_POST['keterangan'];
     // $tahun_berkas = $_POST['thn_berkas'];
     // $prosedur = $_POST['prosedur'];
     // $nama_pemohon = $_POST['nama_pemohon'];

     //cek data
     //cek data
// echo $id;
// echo "<br>";
// echo $no_berkas;
// echo "<br>";
// echo $tahun_berkas;
// echo "<br>";
// echo $prosedur;
// echo "<br>";
// echo $nama_pemohon;
// echo "<br>";

$query = "UPDATE ekspedisi SET keterangan='$keterangan'
                                WHERE log_waktu='$id'";
echo $query;

$hasil = mysqli_query($koneksi,$query);
         
if(!$hasil){}
// echo mysqli_error($hasil);}
else{
echo "<script>alert('Data berhasil dirubah')</script>";
echo "<script type='text/javascript'> document.location = 'index.php?page=data_ekspedisi'; </script>";
}




     // $sql = "UPDATE tbl_berkas SET no_berkas='$no_berkas',
     //                               tahun_berkas='$tahun_berkas',
     //                               prosedur='$prosedur',
     //                               nama_pemohon='$nama_pemohon',
     //                               WHERE id_berkas='$id'";
     // $result = mysqli_query($koneksi,$sql);

     // var_dump($result);
     
     // if($result)    {                               
     // echo "<script> alert('Data berhasil dirubah')</script>";
     // echo "<script type='text/javascript'> document.location = 'index.php?page=data_QR_berkas'; </script>"; 
     // }else
     // {     echo "<script>alert('Data tdk berhasil dirubah')</script>";
     // }
?>