<?php
   include "config/koneksi.php";

   $jumlah_berkas = mysqli_query($koneksi,"SELECT * FROM tbl_berkas");
   $jumlah_tunggakan = mysqli_query($koneksi,"SELECT * FROM tbl_berkas WHERE status_berkas='Proses Sudah Jatuh Tempo'");
   $jml_berkas = mysqli_num_rows($jumlah_berkas);
   $jml_tunggakan = mysqli_num_rows($jumlah_tunggakan);
   $prosentase = ($jml_berkas-$jml_tunggakan)/$jml_berkas;




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <section class="content">
      <div class="container-fluid">
        <h2>Dashboard Berkas PNBP</h2>
        <h6>Seksi Survei dan Pemetaan</h6>

        <div class="row">
        
        
          
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                <h3><?= round($prosentase*100,0); ?> <sup style="font-size: 20px">%</sup></h3>

                <p><strong>%</strong> Penyelesaian Berkas</p>
                </div>
                <div class="icon">
                <i class="ion ion-pie-graph"></i>
                </div>
               <a href="index.php?page=data_QR_berkas" class="small-box-footer">Info lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3> <?= $jml_berkas; ?> </h3>
                <p>Jumlah Berkas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="index.php?page=data_QR_berkas" class="small-box-footer">Info lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $jml_tunggakan; ?> </h3>             
              

                <p>Tunggakan Berkas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="index.php?page=data_QR_berkas" class="small-box-footer">Info lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3> <i class="fa fa-users"></i></h3>

                <p>Info Layanan</p>
              </div>
              <div class="icon">
                <i class="fa fa-question-circle"></i>
              </div>
              <a href="index.php?page=info" class="small-box-footer">Info lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>
      </div>
    </section>

















    
</body>
</html>