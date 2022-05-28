<td class="tunggakan" ><b><?php echo $no ; ?></b></td>
<td class="tunggakan" >
  <?php
    $kode = $m['no_berkas'].";".$m['tahun_berkas'].";".$m['prosedur'].";".$m['pemohon'];
    require_once('assets/qrcode/qrlib.php');
    QRcode::png("$kode","page/berkas/kode".$no.".png","M", 2,2);
  ?>
  <!-- <img src="kode<?= $no ?>.png" alt=""> -->
  <a href="page/berkas/kode<?= $no ?>.png"><img src="page/berkas/kode<?= $no ?>.png" alt=""></a>

</td>
<td class="tunggakan" ><b><?=$m['no_berkas']; ?></b></td>
<td class="tunggakan" ><b><?=$m['tahun_berkas']; ?></b></td>
<td class="tunggakan" ><b><?=$m['prosedur']; ?></b></td>
<td class="tunggakan" ><b><?=$m['pemohon']; ?></b></td>
<td class="tunggakan" ><b><?=$m['luas']; ?></b></td>
<td class="tunggakan" ><b><?=$m['desa']; ?></b></td>
<td class="tunggakan" ><b><?=$m['no_DI302']; ?></b></td>
<td class="tunggakan" ><b>
<?php 
  date_default_timezone_set('asia/makassar');
  // echo date('d-M-y h:i:s a',$m['log_waktu']); 
  echo date('d-M-y G:i:s',$m['tgl_DI302']); 
  ?>
</b>
</td> 
<td class="tunggakan" ><b>
  <?php
  date_default_timezone_set('asia/makassar');
  // echo date('d-M-y h:i:s a',$m['log_waktu']); 
  echo date('d-M-y G:i:s',$m['jatuh_tempo']); 
   ?>
  </b>
</td>
<td class="tunggakan" ><b><?=$m['status_berkas'];?></b></td> 

<?php if($id_status=="admin"){ ?>
<td >
      <a href="index.php?page=edit_berkas&kode_id=<?php echo $m['no_berkas'];?>">
        <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
      </a>

    <!-- <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editberkas<?php echo $m['no_berkas'] ?>"><i class="fa fa-pencil"></i></a> -->

    <a href="index.php?page=delete_berkas&kode_id=<?php echo $m['no_berkas'];?>" onclick="return confirm('Yakin akan menghapus data?')">
      <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
    </a>
</td>
<?php } ?>
