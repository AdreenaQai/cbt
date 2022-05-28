<tr>
<td><?= $no ; ?></td>
<td><?= $m['no_berkas']; ?></td>
<td><?= $m['tahun_berkas']; ?></td>
<td><?= $m['prosedur']; ?></td>
<td><?= $m['pemohon']; ?></td>
<td><?= $m['tugas']; ?></td>
<td><a href="<?="kodular/uploads/".$m['foto']; ?>"><img src = <?php echo "kodular/uploads/".$m['foto']; ?> width="50"></a></td>
<td><?= $m['keterangan']; ?></td>
<td>
  <?php 
  date_default_timezone_set('asia/makassar');
  // echo date('d-M-y h:i:s a',$m['log_waktu']); 
  echo date('d-M-y G:i:s',$m['log_waktu']); 
  ?>
</td>
<td><?= $m['petugas']; ?></td>

</tr>
