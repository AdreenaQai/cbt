<?php
$mysqli->query("DELETE FROM user WHERE iduser = '$_GET[kode]'");

echo "<script>alert('Data berhasil dihapus')</script>";
echo "<script type='text/javascript'> document.location = 'index.php?page=data_user'; </script>"; 


?>