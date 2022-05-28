<?php
    $edit = mysqli_query($koneksi,"SELECT * FROM tbl_berkas WHERE no_berkas = '$_GET[kode_id]'");
    $e = mysqli_fetch_array($edit);
    $nm_pemohon = $e['pemohon'];
    $edit1 = mysqli_query($koneksi,"SELECT * FROM tbl_pemohon WHERE nama_pemohon = '$nm_pemohon'");
    $e1 = mysqli_fetch_array($edit1);


?>
<html>
<body>

<form role="form" method="POST" action="index.php?page=update_berkas">
    <div class="card-body">

        <div class="form-group">
            <label for="no_berkas">Nomor Berkas</label>
            <input type="text" class="form-control" name="no_berkas" value="<?php echo $e['no_berkas']; ?>"  placeholder="Masukkan nomor berkas" disabled >
            <input type="hidden" class="form-control" name="nomor_berkas" value="<?php echo $e['no_berkas']; ?>"  >

        </div>
        <div class="form-group">
            <label for="thn_berkas">Tahun Berkas</label>
            <input type="text" class="form-control" name="thn_berkas" value="<?php echo $e['tahun_berkas']; ?>"placeholder="Masukkan tahun berkas">
        </div>
        <div class="form-group">
            <label for="prosedur">Pilih Kegiatan</label>
            <select class="form-control" id="prosedur" name="prosedur">
            <option selected><?php echo $e['prosedur']; ?></option>
                <?php
                                $result=mysqli_query($koneksi,"SELECT * FROM tbl_prosedur");
                                while($p=mysqli_fetch_array($result)){
        
                ?>
                        <option value="<?=$p['prosedur']; ?>"><?=$p['prosedur']; ?></option>

                <?php } ?>
            </select>

        </div>
        <div class="form-group">
            <label for="nama_pemohon">Nama Pemohon/Kuasa Pemohon</label>
            <input type="text" class="form-control"  value="<?php echo $e['pemohon']; ?>" placeholder="Masukkan nama pemohon" disabled>
            <input type="hidden" class="form-control" name="nama_pemohon" value="<?php echo $e['pemohon']; ?>" >
        </div>
        <div class="form-group">
            <label for="no_telp">No Telp/HP</label>
            <input type="text" class="form-control" name="no_telp" value="<?php echo $e1['no_telp']; ?>" placeholder="Masukkan no telp/HP">
        </div>
        <div class="form-group">
            <label for="NIK">NIK</label>
            <input type="text" class="form-control" name="nik" value="<?php echo $e1['NIK']; ?>" placeholder="Masukkan NIK">
            <input type="hidden" class="form-control" name="nik_pemohon" value="<?php echo $e1['NIK']; ?>" >

        </div>



        <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <select class="form-control" id="nama_kecamatan" name="nama_kecamatan">
                    

                        <option selected><?=$e['kecamatan'];?></option>
                        <?php
                                $result=mysqli_query($koneksi,"SELECT * FROM tbl_kecamatan ORDER BY kecamatan ASC");
                                while($p=mysqli_fetch_array($result)){
                        ?>
                        <option value="<?=$p['kecamatan']; ?>"><?=$p['kecamatan']; ?>
                       
                        </option>
                        <?php } ?>
                    </select>

                  </div>

                  <div class="form-group">
                    <label for="desa">Desa/Kelurahan</label>
                    
                    <select class="form-control" id="nama_desa" name="nama_desa" required>
                    <option selected><?=$e['desa'];?></option>
                                <?php
                                
                                $result1=mysqli_query($koneksi,"SELECT * FROM desa_kel INNER JOIN tbl_kecamatan ON 
                                desa_kel.kecamatan = tbl_kecamatan.kecamatan
                                ORDER BY desa_kel ASC");
                                while($p1=mysqli_fetch_array($result1)){
                                ?>

                                  <option class="<?=$p1['kecamatan']; ?>" value="<?=$p1['desa_kel']; ?>"><?=$p1['desa_kel']; ?>
                        
                                <?php }?>
                        </option>

                    </select>
                   
                  </div>


        <div class="form-group">
            <label for="DI302">No DI302</label>
            <input type="text" class="form-control" name="no_DI302" value="<?php echo $e['no_DI302']; ?>" >
        </div>
        <div class="form-group">
            <label for="tglDI302">Tanggal DI302</label>
            <?php date_default_timezone_set('asia/makassar'); ?>
            <input type="datetime-local" class="form-control" name="tgl_DI302" value="<?php echo date('d-M-y G:i:s',$e['tgl_DI302']); ?>" required>
            <!-- <input type="text" class="form-control" name="tgl_DI302" value="<?php echo date('d-M-y G:i:s',$e['tgl_DI302']); ?>" required> -->

        </div>
        <div class="form-group">
            <label for="STP">No STP</label>
            <input type="text" class="form-control" name="no_STP" value="<?php echo $e['no_STP']; ?>" >
        </div>
        <div class="form-group">
            <label for="luas">Luas (m2)</label>
            <input type="text" class="form-control" name="luas" value="<?php echo $e['luas']; ?>" >
        </div>
        <!-- <div class="form-group">
            <label for="jatuhtempo">Tanggal DI302</label>
            <input type="datetime-local" class="form-control" name="jatuh_tempo" value="<?php date_default_timezone_set('asia/makassar');echo date('d-M-y G:i:s',$e['jatuh_tempo']); ?>" >
        </div> -->




    
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>

<script src="assets/build/js/jquery-1.10.2.min.js"></script>
<script src="assets/build/js/jquery.chained.min.js"></script>
<script>
            $("#nama_desa").chained("#nama_kecamatan");
</script>

</body>
</html>