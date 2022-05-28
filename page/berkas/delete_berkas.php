<?php
$delete=mysqli_query($koneksi,"DELETE FROM tbl_berkas WHERE no_berkas = '$_GET[kode_id]'");

if($delete){

echo "<script>alert('Data berhasil dihapus')</script>";
echo "<script type='text/javascript'> document.location = 'index.php?page=data_QR_berkas'; </script>"; 
}

?>