<?php
mysqli_query($koneksi,"DELETE FROM user WHERE id_user = '$_GET[kode]'");

echo "<script>alert('Data berhasil dihapus')</script>";
echo "<script type='text/javascript'> document.location = 'index.php?page=data_user'; </script>"; 


?>