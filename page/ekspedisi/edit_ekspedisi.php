<?php
    $edit = mysqli_query($koneksi,"SELECT * FROM ekspedisi WHERE log_waktu = '$_GET[kode_id]'");
  
    $e = mysqli_fetch_assoc($edit);
?>
<form role="form" method="POST" action="index.php?page=update_ekspedisi">
    <div class="card-body">

        <div class="form-group">
        <label for="no_berkas">Uraian Tugas</label>
        <input type="hidden" name="id" value="<?php echo $e['log_waktu']; ?>">
        <!-- <input type="text" class="form-control" name="tugas" value="<?php echo $e['tugas']; ?>"  placeholder="Ubah Uraian Tugas"> -->

        <select class="form-control" id="tugas" name="tugas">
            <option selected><?= $e['tugas'];?></option>
            <?php
                $result=mysqli_query($koneksi,"SELECT * FROM tugas");
                while($p=mysqli_fetch_array($result)){
            ?>
            <option value="<?=$p['tugas']; ?>"><?=$p['tugas']; ?></option>
            <?php } ?>
        </select>




        </div>

        <div class="form-group">
        <label for="no_berkas">Keterangan</label>
        <input type="text" class="form-control" name="keterangan" value="<?php echo $e['keterangan']; ?>"  placeholder="Ubah keterangan">
        </div>

        <!-- <div class="form-group">
        <label for="thn_berkas">Tahun Berkas</label>
        <input type="text" class="form-control" name="thn_berkas" value="<?php echo $e['tahun_berkas']; ?>"placeholder="Masukkan tahun berkas">
        </div> -->
        <!-- <div class="form-group">
        <label for="prosedur">Pilih Nama Kegiatan</label>
        <select class="custom-select" id="prosedur" name="prosedur">
                        <option selected><?php echo $e['prosedur']; ?></option>
                        <option value="Pelepasan Sebagian Hak">Pelepasan Sebagian Hak</option>
                        <option value="Pemecahan Bidang">Pemecahan Bidang</option>
                        <option value="Pemisahan Bidang">Pemisahan Bidang</option>
                        <option value="Pendaftaran Tanah Pertama Kali Wakaf untuk Tanah Yang Belum Sertipikat (Tanah Negara)">Pendaftaran Tanah Pertama Kali Wakaf untuk Tanah Yang Belum Sertipikat (Tanah Negara)</option>
                        <option value="Pengembalian Batas">Pengembalian Batas</option>
                        <option value="Penggabungan Bidang">Penggabungan Bidang</option>
                        <option value="Pengukuran dan Pemetaan Kadastral">Pengukuran dan Pemetaan Kadastral</option>
                        <option value="Pengukuran Ulang Dan Pemetaan Kadastral">Pengukuran Ulang Dan Pemetaan Kadastral</option>
                        <option value="Pendaftaran SK Hak">Pendaftaran SK Hak</option>
                        <option value="Sertipikat Pengganti Karena Hilang">Sertipikat Pengganti Karena Hilang</option>
                        <option value="Sertipikat Pengganti Karena Blanko Lama">Sertipikat Pengganti Karena Blanko Lama</option>
                        <option value="Sertipikat Pengganti Karena Blanko Rusak">Sertipikat Pengganti Karena Blanko Rusak</option>
        </select>

        </div> -->
        <!-- <div class="form-group">
        <label for="nama_pemohon">Nama Pemohon</label>
        <input type="text" class="form-control" name="nama_pemohon" value="<?php echo $e['nama_pemohon']; ?>" placeholder="Masukkan nama pemohon">
        </div> -->


    
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>