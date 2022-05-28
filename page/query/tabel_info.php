<?php
date_default_timezone_set('asia/makassar');
?>

<div class="row">
<div class="col-sm-1">No Berkas</div><div class="col-sm-11">: <?=$m['no_berkas'];?></div>
<div class="col-sm-1">Tahun Berkas</div><div class="col-sm-11">: <?=$m['tahun_berkas'];?></div>
<div class="col-sm-1">Nama Kegiatan</div><div class="col-sm-11">: <?=$m['prosedur'];?></div>
<div class="col-sm-1">Nama Pemohon</div><div class="col-sm-11">: <?=$m['pemohon'];?></div>
<div class="col-sm-1">Posisi Berkas</div><div class="col-sm-11">: <?=$m['tugas'];?></div>
<!-- <div class="col-sm-2">Foto</div><div class="col-sm-10">: <img src = <?php echo "kodular/".$m['foto']; ?> width="50"></div> -->


<!-- cek status berkas -->
<?php
$status_berkas = $m['tugas'];
$hari_sekarang = time();
$jatuh_tempo = $m['jatuh_tempo'];
?>
<div class="col-sm-1">Jatuh tempo</div><div class="col-sm-11">: <?php echo date('d-M-y G:i:s',$jatuh_tempo);?></div>
<?php
echo "<br>";
if($hari_sekarang >= $jatuh_tempo)
{
  if($status_berkas == "(20) Kirim: Berkas ke loket (Pelaksana)")
  {
    echo"<div class='col-sm-1'>Status Berkas</div><div class='col-sm-11'>: Berkas Selesai</div>";echo "<br>";
  }
  else 
  {    
  echo"<div class='col-sm-1'>Status Berkas</div><div class='col-sm-11'>: Proses Sudah Jatuh Tempo</div>";echo "<br>";
  }
}
if($hari_sekarang <= $jatuh_tempo)
{
  if($status_berkas == "(20) Kirim: Berkas ke loket (Pelaksana)")
  {
    echo"<div class='col-sm-1'>Status Berkas</div><div class='col-sm-11'>: Berkas Selesai</div>";echo "<br>";
  }
  else 
  {    
    echo"<div class='col-sm-1'>Status Berkas</div><div class='col-sm-11'>: Proses Belum Jatuh Tempo</div>";echo "<br>";
  }
}
?>

  
 <div class='col-sm-1'>Log Waktu</div><div class='col-sm-11'>: <?= date('d-M-y G:i:s',$m['log_waktu']);?></div><br>
 <div class='col-sm-1'>Nama Petugas</div><div class='col-sm-11'>: <?= $m['petugas'];?></div><br>
 <div class='col-sm-1'>Kecamatan</div><div class='col-sm-11'>: <?= $m['kecamatan'];?></div><br>
 <div class='col-sm-1'>Desa/ Kelurahan</div><div class='col-sm-11'>: <?= $m['desa'];?></div><br>
 <div class='col-sm-1'>No. DI302</div><div class='col-sm-11'>: <?= $m['no_DI302'];?></div><br>
 <div class='col-sm-1'>No. STP</div><div class='col-sm-11'>: <?= $m['no_STP'];?></div><br>


