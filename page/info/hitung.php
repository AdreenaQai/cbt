
<?= "No :".$no ; echo "<br>"; ?>
<?= "No Berkas : ".$m['no_berkas']; echo "<br>";?>
<?= "Tahun Berkas : ".$m['tahun_berkas']; echo "<br>";?>
<?= "Nama Kegiatan : ".$m['prosedur']; echo "<br>";?>
<?= "Nama Pemohon : ".$m['pemohon']; echo "<br>";?>
<?= "Posisi Berkas : ".$m['tugas']; echo "<br>";?>
Foto : <a href="<?="kodular/uploads/".$m['foto']; ?>"><img src = <?php echo "kodular/uploads/".$m['foto']; ?> width="50"></a><br>
<?= "Keterangan Berkas : ".$m['keterangan']; echo "<br>";?>
Log Waktu :
  <?php 
  date_default_timezone_set('asia/makassar');
  // echo date('d-M-y h:i:s a',$m['log_waktu']); 
  echo date('d-M-y G:i:s',$m['log_waktu']);echo "<br>"; 
  ?>

<?= "Nama Petugas : ".$m['petugas']; echo "<br>";?>
<?= "Kecamatan : ".$m['kecamatan']; echo "<br>";?>
<?= "Desa/Kelurahan : ".$m['desa']; echo "<br>";?>
<?= "No. DI302 : ".$m['no_DI302']; echo "<br>";?>
<?= "No. STP : ".$m['no_STP']; echo "<br>";?>
================================================<br>

