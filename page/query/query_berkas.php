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
                        <div class="col-sm-2">Tahun Berkas :</div>
                        <div class="col-sm-4"><input type="text" class="col-sm-11 form-control" name="thn_berkas"></input></div>
                        <div class="col-sm-2">Nama Kegiatan :</div>
                        <div class="col-sm-4"><input type="text" class="col-sm-11 form-control" name="prosedur"></input></div>
                    </div>
                    <div><br></div>

                    <div class="row">
                        <div class="col-sm-2">Nama Pemohon :</div>
                        <div class="col-sm-4"><input type="text" class="col-sm-11 form-control" name="pemohon"></input></div>
                        <div class="col-sm-2">Posisi Berkas :</div>
                        <div class="col-sm-4"><input type="text" class="col-sm-11 form-control" name="posisi_berkas"></input></div>
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
                          <div class="col-sm-2">Status Berkas :</div>
                          <div class="col-sm-4">
                              <select class="form-control col-sm-11" id="cmbTipeStatusBerkas" name="status_berkas">
                              <option selected> -- Pilih Status Berkas --</option>
                              <option value="1">Dalam Proses</option>
                              <option value="2">Sudah Selesai</option>
                              <option value="3">Sudah Diserahkan</option>
                              <option value="4">Ditunda</option>
                              <option value="5">Dalam Proses Jatuh Tempo</option>
                              <option value="6">Dalam Proses Belum Jatuh Tempo</option>
                              </select>
                          </div>
                    </div>
                    <div><br></div> 
                    <div class="row">
                          <div class="col-sm-2"></div>
                          <div class="col-sm-4">
                              <button id="save-btn" type="submit" class="btn btn-success" name="submit">Cari</button>
                              <button id="reset-btn" type="reset" class="btn btn-warning" name="reset">Reset</button>
                              <button id="btnExportExcel" type="submit" class="btn btn-primary"><span class="fa fa-file-excel-o"></span> Export ke Excel</button>
                          </div>
                    </div>  


          
               
              </div>
              <!-- /.card-header -->
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
                        <th>Keterangan</th>
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
                        $thn_berkas = $_POST['thn_berkas'];
                        $prosedur = $_POST['prosedur'];
                        $pemohon = $_POST['pemohon'];
                        $posisi_berkas = $_POST['posisi_berkas'];
                        $dari_tgl = $_POST['dari_tgl'];
                        $sampai_tgl = $_POST['sampai_tgl'];
                        $status_berkas = $_POST['status_berkas'];}

                    if(isset($_POST["submit"]))
                    {

                      if($dari_nomor AND $sampai_nomor)
                        {
                          $sql_no_berkas = "SELECT * FROM ekspedisi INNER JOIN tbl_berkas ON ekspedisi.no_berkas = tbl_berkas.no_berkas WHERE ekspedisi.no_berkas BETWEEN $dari_nomor AND $sampai_nomor";
                          $sql=mysqli_query($koneksi,"$sql_no_berkas");

                          $no = 0;
                          while($m=mysqli_fetch_array($sql))
                          {
                            $no++;
                          ?>
<!-- // ================================================================================================ -->
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





                          <?php }?>
                        <?php }?>
                      <?php }?>
<!-- // ================================================================================================ -->

                      <?php
                      if($thn_berkas OR $prosedur OR $pemohon OR $posisi_berkas )
                        {
                            $query = "SELECT * FROM ekspedisi INNER JOIN tbl_berkas ON ekspedisi.no_berkas = tbl_berkas.no_berkas WHERE 
                            tbl_berkas.tahun_berkas=$thn_berkas OR tbl_berkas.prosedur=$prosedur OR tbl_berkas.pemohon=$pemohon
                            OR ekspedisi.tugas=$posisi_berkas";

                            $sql=mysqli_query($koneksi,$query);

                            $no = 0;
                            while($m=mysqli_fetch_array($sql))
                            {
                            $no++; 
                      ?> 
<!-- // ================================================================================================ -->
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

                            <?php }?>
                          <?php }?>
<!-- // ================================================================================================ -->
                    <?php
                    if(!isset($_POST["reset"]))
                    {
                          header ("Location: index.php?page=query_berkas");

                    }
                    ?>


                  
                      
                  

                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

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