<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
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
  background-color: grey;
}
</style>

</head>
<body>


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Query Berkas</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" style="font-family:calibri">
        <div class="row">
          <div class="col-12">

          <form action="" method="post">
           
         
            <div class="card">
              <div class="card-header" style="font-family:calibri">
                    <div class="row">
                        <div class="col-sm-2" >Dari Nomor :</div>
                        <div class="col-sm-4"><input type="text" class="col-sm-11 form-control" name="dari_nomor"></input></div>
                        <div class="col-sm-2">Sampai Nomor :</div>
                        <div class="col-sm-4"><input type="text" class="col-sm-11 form-control" name="sampai_nomor"></input></div>
                        
                    </div>
                    <div><br></div>

                    <div class="row">
                        <div class="col-sm-2">Nama Petugas :</div>
                        <div class="col-sm-4">
                          <select class="form-select col-sm-11" id="petugas" name="petugas">
                            <option selected>-- Pilih Nama Petugas --</option>
                                              <?php
                                                      $result=mysqli_query($koneksi,"SELECT DISTINCT petugas FROM ekspedisi");
                                                      while($p=mysqli_fetch_array($result)){
                                              ?>
                                              <option value="<?=$p['petugas']; ?>"><?=$p['petugas']; ?></option>
                          
                                              <?php } ?>
                            </select>
                        
                        </div>
                        <div class="col-sm-2">Nama Pemohon :</div>
                        <div class="col-sm-4">
                            <select class="form-select col-sm-11" id="pemohon" name="pemohon">
                            <option selected>-- Pilih Pemohon --</option>
                                              <?php
                                                  $result=mysqli_query($koneksi,"SELECT * FROM tbl_berkas");
                                                  while($p=mysqli_fetch_array($result)){
                                              ?>
                            <option value="<?=$p['pemohon']; ?>"><?=$p['pemohon']; ?></option>
                          
                                              <?php } ?>
                            </select>

                        <!-- ================================================= -->
                        </div>
                    </div>
                    <div><br></div>

                    <div class="row">
                        <div class="col-sm-2">Nama Kegiatan :</div>
                        <div class="col-sm-4">
                            <select class="form-select col-sm-11" id="prosedur" name="prosedur">
                            <option selected>-- Pilih Kegiatan --</option>
                                              <?php
                                                      $result=mysqli_query($koneksi,"SELECT * FROM tbl_prosedur");
                                                      while($p=mysqli_fetch_array($result)){
                                              ?>
                            <option value="<?=$p['prosedur']; ?>"><?=$p['prosedur']; ?></option>
                          
                                              <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-2">Tahun Berkas :</div>
                        <div class="col-sm-4"><input type="text" class="col-sm-11 form-control" name="thn_berkas"></div>
                        

                        
                        
                    </div>
                    <div><br></div>  
                    <div class="row">
                          <div class="col-sm-2">Status Berkas :</div>
                          <div class="col-sm-4">
                              <select class="form-select col-sm-11" id="status_berkas" name="status_berkas">
                                  <option selected> -- Pilih Status Berkas --</option>
                                  <option value="Proses Belum Jatuh Tempo">Proses Belum Jatuh Tempo</option>
                                  <option value="Proses Sudah Jatuh Tempo">Proses Sudah Jatuh Tempo</option>
                                  <option value="Berkas Selesai">Berkas Selesai</option>
                              </select>
                          </div>
                          <div class="col-sm-2">Posisi Berkas :</div>
                          <div class="col-sm-4">
                            <select class="form-select col-sm-11" id="posisi" name="posisi">
                                <option selected>-- Pilih Posisi Berkas --</option>
                                              <?php
                                                      $result=mysqli_query($koneksi,"SELECT * FROM tugas");
                                                      while($p=mysqli_fetch_array($result)){
                                              ?>
                                <option value="<?=$p['tugas']; ?>"><?=$p['tugas']; ?></option>
                      
                                              <?php } ?>
                            </select>
                          </div>
                    </div>
                    <div><br></div> 

                    <div class="row">
                        <div class="col-sm-2">Dari Tanggal :</div>
                        <div class="col-sm-4"><input type="date" class="col-sm-11 form-control" name="dari_tgl"></input></div>
                        <div class="col-sm-2">Sampai Tanggal :</div>
                        <div class="col-sm-4"><input type="date" class="col-sm-11 form-control" name="sampai_tgl"></input></div>
                    </div>
                    <div><br></div> 
                    <div class="row">
                          <div class="col-sm-2"></div>
                          <div class="col-sm-4">
                              <button id="save-btn" type="submit" class="btn btn-success" name="submit">Cari</button>
                              <button id="reset-btn" type="submit" class="btn btn-warning" name="reset">Reset</button>
                              <button id="btnExportExcel" type="submit" class="btn btn-primary"><span class="fa fa-file-excel-o"></span> Export ke Excel</button>
                          </div>
                    </div>  
               
              </div>
              <!-- /end of card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <!-- <th>QR Berkas</th> -->
                        <th>No. Berkas</th>
                        <th>Tahun Berkas</th>
                        <th>Nama Kegiatan</th>
                        <th>Nama Pemohon</th>
                        <th>Posisi Berkas</th>
                        <th>Foto</th>
                        <th>Status Berkas</th>
                        <th>Log Waktu</th>
                        <th>Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "config/koneksi.php";
                    if ($_SERVER['REQUEST_METHOD']=="POST") {
                        $dari_nomor = $_POST['dari_nomor'];
                        $sampai_nomor = $_POST['sampai_nomor'];
                        $petugas = $_POST['petugas'];
                        $prosedur = $_POST['prosedur'];
                        $pemohon = $_POST['pemohon'];
                        $posisi_berkas = $_POST['posisi'];
                        $thn_berkas = $_POST['thn_berkas'];
                        $status_berkas = $_POST['status_berkas'];
                        $dari_tgl = $_POST['dari_tgl'];
                        $sampai_tgl = $_POST['sampai_tgl'];}

                    if(isset($_POST["submit"]))
                    {
// ================================================================================================ -->//query dari no berkas s/d no berkas brp
                      if($dari_nomor AND $sampai_nomor)
                        {
                          $sql_no_berkas = "SELECT * FROM ekspedisi INNER JOIN tbl_berkas ON ekspedisi.no_berkas = tbl_berkas.no_berkas 
                          WHERE ekspedisi.no_berkas BETWEEN $dari_nomor AND $sampai_nomor";

                          $sql=mysqli_query($koneksi,"$sql_no_berkas");

                          $no = 0;
                          while($m=mysqli_fetch_array($sql))
                          {
                            $no++;
                            require"tabel.php";
                          }
                        }?>
<!-- // ================================================================================================  end-of query dari no berkas s/d no berkas brp -->

<!-- // ================================================================================================  query dari tgl berkas s/d tgl berkas brp -->

                        <?php
                        if($dari_tgl AND $sampai_tgl)
                        {
                          $dari_tgl=strtotime($dari_tgl);
                          $sampai_tgl=strtotime($sampai_tgl);
                          $sql_tanggal = "SELECT * FROM ekspedisi INNER JOIN tbl_berkas ON ekspedisi.no_berkas = tbl_berkas.no_berkas 
                          WHERE ekspedisi.log_waktu BETWEEN $dari_tgl AND $sampai_tgl";

                          $sql=mysqli_query($koneksi,$sql_tanggal);
                          // var_dump($sql);

                          $no = 0;
                          while($m=mysqli_fetch_array($sql))
                          {
                            $no++;
                            require"tabel.php";
                          }
                        }?>
<!-- // ================================================================================================ end-of tgl berkas s/d tgl berkas brp -->

<!-- // ==========================================================  query one-one : petugas,pemohon,prosedur,tahun, status, posisi -->

                        <?php
                        if(isset($petugas) OR isset($pemohon) OR isset($prosedur) OR isset($thn_berkas) OR isset($status_berkas) OR isset($posisi_berkas))
                        {

                          $sql_posisi = "SELECT * FROM tbl_berkas INNER JOIN ekspedisi ON tbl_berkas.no_berkas = ekspedisi.no_berkas 
                          WHERE ekspedisi.petugas='$petugas' OR tbl_berkas.pemohon='$pemohon' OR tbl_berkas.prosedur='$prosedur'
                          OR tbl_berkas.tahun_berkas='$thn_berkas' OR tbl_berkas.status_berkas='$status_berkas' OR ekspedisi.tugas='$posisi_berkas'";



                          $sql=mysqli_query($koneksi,$sql_posisi);

                          $no = 0;
                          while($m=mysqli_fetch_array($sql))
                          {
                            $no++;
                            require"tabel.php";
                          }
                        }?>
<!-- // ====================================================== end-of query one-one : petugas,pemohon,prosedur,tahun, status, posisi  -->

<!-- // ========================================================================================================================   -->
<?php }?>
<!-- // ================================================================================================ end-of query submit--> 

                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
<!-- // ================================================================================================ start of query reset--> 

                      <?php
                      if(isset($_POST["reset"]))
                        {
                          header ("Location:index.php?page=query_berkas");
                        }
                      ?>
<!-- // ================================================================================================ end of query reset--> 

            </form>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->



      




</body>
</html>