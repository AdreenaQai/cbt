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

</head>
<body>


<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Informasi Berkas</h1>
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
               <h5>Pencarian Berkas</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                    <div class="row">
                        <div class="col-sm-1">Nomor :</div>
                        <div class="col-sm-4"><input type="text" class="col-sm-11 form-control" name="no_berkas"></input></div>
                    </div>
                    <div><br></div> 
                    <div class="row">
                        <div class="col-sm-1">Tahun :</div>
                        <div class="col-sm-4"><input type="text" class="col-sm-11 form-control" name="thn_berkas"></input></div>
                    </div>
                    <div><br></div> 


                    <div class="row">
                          <div class="col-sm-5">
                              <button id="save-btn" type="submit" class="btn btn-success" name="submit">Cari</button>
                              <button id="reset-btn" type="submit" class="btn btn-warning" name="reset">Reset</button>
                          </div>
                    </div>  

              

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header" style="font-family:calibri">
               <h5>Hasil Pencarian Berkas</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <?php
              include "config/koneksi.php";
                    if ($_SERVER['REQUEST_METHOD']=="POST") {
                        $no_berkas = $_POST['no_berkas'];
                        $thn_berkas = $_POST['thn_berkas'];}
             
              if(isset($_POST["submit"]))
                    {
                      // ================================================================================================ -->//
                      if($no_berkas AND $thn_berkas)
                        {
                          $sql_info_berkas = "SELECT * FROM tbl_berkas INNER JOIN ekspedisi ON tbl_berkas.no_berkas = ekspedisi.no_berkas 
                          WHERE tbl_berkas.no_berkas='$no_berkas' AND tbl_berkas.tahun_berkas='$thn_berkas' ORDER BY ekspedisi.log_waktu DESC LIMIT 1 ";

                          $sql=mysqli_query($koneksi,$sql_info_berkas);

                          $no = 0;
                          while($m=mysqli_fetch_array($sql))
                          {
                            $no++;
                            require "tabel_info.php";
                            

                          }
                        }
// ================================================================================================  end-of query  -->

                    }

              if(isset($_POST["reset"]))
              {                          
                header ("Location:index.php?page=informasi_berkas");
              }

              
               ?>


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