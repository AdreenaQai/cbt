<!-- modal form edit user -->
<div class="modal fade" id="editberkas<?= $m['no_berkas']?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Berkas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <?php
                $noberkas = $m['no_berkas'];
                $edit = mysqli_query($koneksi,"SELECT * FROM tbl_berkas WHERE no_berkas = '$noberkas'");
                $e = mysqli_fetch_array($edit);
                $nm_pemohon = $e['pemohon'];
                $edit1 = mysqli_query($koneksi,"SELECT * FROM tbl_pemohon WHERE nama_pemohon = '$nm_pemohon'");
                $e1 = mysqli_fetch_array($edit1);
            ?>
      <div class="modal-body">
          <form role="form" method="post" action="index.php?page=update_berkas">
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
                    <select class="custom-select" id="prosedur" name="prosedur">
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
                    <input type="text" class="form-control" name="nama_kecamatan" value="<?php echo $e['kecamatan']; ?>" placeholder="Masukkan nama kecamatan">
                </div>
                <div class="form-group">
                    <label for="desa">Desa/Kelurahan</label>
                    <input type="text" class="form-control" name="nama_desa" value="<?php echo $e['desa']; ?>" placeholder="Masukkan nama desa/kelurahan">
                </div>
                <div class="form-group">
                    <label for="DI302">No DI302</label>
                    <input type="text" class="form-control" name="no_DI302" value="<?php echo $e['no_DI302']; ?>" placeholder="Masukkan No Di302">
                </div>
                <div class="form-group">
                    <label for="STP">No DI302</label>
                    <input type="text" class="form-control" name="no_STP" value="<?php echo $e['no_STP']; ?>" placeholder="Masukkan No Surat Tugas Pengukuran">
              </div>

            </div>
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
            </div>

          </form>

      </div>
    </div>
  </div>
</div>
