<?php
   ob_start();
   session_start();
   if(!isset($_SESSION['username'])) header("location: login.php");
   include "config/koneksi.php";

  //  var global user session
 
  $id_nama = $_SESSION['nama'];
  $id_telp = $_SESSION['telp'];
  $id_username = $_SESSION['username'];
  $id_status = $_SESSION['status'];
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->

    <style>
.tunggakan{
  /* background-color: red; */
  color:red;
  background-color:yellow;
}
.btn {
  /* background-color: DodgerBlue; */
  border: none;
  color: white;
  /* padding: 12px 16px; */
  /* font-size: 16px; */
  /* cursor: pointer; */
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: darkgrey;
}
div.warna{color: red;}
b.warna{color: red;}

</style>

</head>
<body>



<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Berkas PNBP</h1>
            <h6>Seksi Survei dan Pemetaan</h6>

          </div>
          <!-- <div class="col-sm-6"> -->
            <!-- <ol class="breadcrumb float-sm-right"> -->
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li> -->
            <!-- </ol> -->
          <!-- </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" style="font-family:calibri">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header" style="font-family:calibri">
              <?php if($id_status=="admin" OR $id_status=="operator"){ ?>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                <i class = "fa fa-plus">  </i> Tambah Berkas
                </button>
                <?php } ?>


                <!-- <a href="index.php?page=import_data_berkas" class="btn btn-info" role="button">
                <i class="fa fa-edit"> </i> Import Data 
                </a> -->
                
                <!-- <a href="page/berkas/export_pdf.php" class="btn btn-info" role="button">
                  <i class = "fa fa-file-pdf-o"></i> Export PDF
                </a> -->
                <a href="page/berkas/export_excel.php" class="btn btn-info" role="button">
                  <i class = "fa fa-file-excel-o">  </i> Export Excel
                </a>

               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                <table id="example1" class="table table-bordered">

                  <thead>
                    <tr>
                        <th>No.</th>
                        <th>QR Berkas</th>
                        <th>No. Berkas</th>
                        <th>Tahun Berkas</th>
                        <th>Nama Kegiatan</th>
                        <th>Nama Pemohon</th>
                        <th>Luas</th>
                        <th>Desa/ Kelurahan</th>
                        <th>No. DI302</th>
                        <th>Tanggal DI302</th>
                        <th>Jatuh Tempo</th>
                        <th>Status Berkas</th>
                        <?php if($id_status=="admin"){ ?>
                        <th>Edit  |  Delete</th> <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $no = 0;
                        // $result=mysqli_query($koneksi,"SELECT * FROM tbl_berkas INNER JOIN ekspedisi ON tbl_berkas.no_berkas = ekspedisi.no_berkas");
                        $result=mysqli_query($koneksi,"SELECT * FROM tbl_berkas");
                        // $result=mysqli_query($koneksi,"SELECT * FROM ekspedisi INNER JOIN tbl_berkas ON ekspedisi.no_berkas = tbl_berkas.no_berkas");
                        while($m=mysqli_fetch_array($result)){
                        $no++;  
                    ?>
                    <tr>
                      <!-- mulai tabel -->
                      <?php
                              if($m['status_berkas']=="Proses Sudah Jatuh Tempo")
                              {
                                  include "tabel_sudah.php";
                              }
                              else 
                              {
                                include "tabel_belum.php";

                              }
                        ?>

                        <!-- akhir tabel -->
                        
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->



      <!-- modal form tambah data -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Berkas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="index.php?page=create_berkas">
               
                <div class="card-body">
                  <div class="form-group">
                    <label for="nomorberkas">Nomor Berkas<b class="warna"> *</b></label>
                    <input type="text" class="form-control" name="no_berkas" placeholder="Masukkan nomor berkas" required>
                  </div>
                  <div class="form-group">
                    <label for="tahunberkas">Tahun Berkas<b class="warna"> *</b></label>
                    <input type="text" class="form-control" name="thn_berkas" placeholder="Masukkan tahun berkas" required>
                  </div>
                  <div class="form-group">
                      <label for="prosedur">Prosedur<b class="warna"> *</b></label>
                      <select class="form-control" id="prosedur" name="prosedur" required>
                        <option selected>-- Pilih Kegiatan --</option>
                        <?php
                                $result=mysqli_query($koneksi,"SELECT * FROM tbl_prosedur");
                                while($p=mysqli_fetch_array($result)){
                        ?>
                        <option value="<?=$p['prosedur']; ?>"><?=$p['prosedur']; ?></option>

                        <?php } ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="namapemohon">Nama Pemohon/Kuasa Pemohon<b class="warna"> *</b></label>
                    <input type="text" class="form-control" name="nama_pemohon" placeholder="Masukkan nama pemohon/kuasa pemohon" required>
                  </div>
                  <div class="form-group">
                    <label for="telp">No Telp/HP<b class="warna"> *</b></label>
                    <input type="text" class="form-control" name="telp" placeholder="Masukkan nomor telp/HP" required>
                  </div>
                  <div class="form-group">
                    <label for="NIK">NIK<b class="warna"> *</b></label>
                    <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" required>
                  </div>


                  <div class="form-group">
                    <label for="kecamatan">Kecamatan<b class="warna"> *</b></label>
                    <select class="form-control" id="nama_kecamatan" name="nama_kecamatan"   required>
                    

                        <option selected>-- Pilih Kecamatan --</option>
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
                    <label for="desa">Desa/Kelurahan<b class="warna"> *</b></label>
                    
                    <select class="form-control" id="nama_desa" name="nama_desa" required>
                    <option selected>-- Pilih Desa/Kelurahan --</option>
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
                    <label for="DI302">No DI302<b class="warna"> *</b></label>
                    <input type="text" class="form-control" name="nomor_DI302" placeholder="Masukkan nomor DI302" required>
                  </div>
                  <div class="form-group">
                    <label for="tglDI302">Tanggal DI302<b class="warna"> *</b></label>
                    <input type="datetime-local" class="form-control" name="tgl_DI302" placeholder="Masukkan tanggal DI302" required>
                  </div>
                  <div class="form-group">
                    <label for="noSTP">No Surat Tugas Pengukuran<b class="warna"> *</b></label>
                    <input type="text" class="form-control" name="nomor_STP" placeholder="Masukkan nomor STP" required>
                  </div>
                  <div class="form-group">
                    <label for="luas">Luas Tanah<b class="warna"> *</b></label>
                    <input type="text" class="form-control" name="luas" placeholder="Masukkan luas tanah" required>
                  </div>


               
                  <div class="warna"><b>* wajib diisi</b></div>



                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
                 <div class="modal-footer justify-content-between">
                 </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>








<script src="assets/build/js/jquery-1.10.2.min.js"></script>
<script src="assets/build/js/jquery.chained.min.js"></script>
<script>
            $("#nama_desa").chained("#nama_kecamatan");
</script>








    
</body>
</html>