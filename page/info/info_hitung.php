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
      .text-kecil {
        font-size:10px;
        color:red;

      }
      .text-kecil2 {
        font-size:14px;
        color:red;

      }

    </style>

</head>
<body>


<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simulasi Hitung Biaya</h1>
          </div>
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
               <h5>Hitung Biaya PNBP<h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <div class="form-group">
              <form role="form" method="post" action="">
                        <h8><b class="text-kecil2">*khusus wilayah Sulawesi Barat</b></h8>
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-3">Prosedur Kegiatan :</div>
                              <div class="col-sm-5">
                              <select class="col-sm form-select" id="prosedur" name="prosedur" >

                                      <option selected> -- Pilih Kegiatan --</option>
                                      <?php
                                            $result=mysqli_query($koneksi,"SELECT * FROM tbl_prosedur");
                                            while($p=mysqli_fetch_array($result)){
                                      ?>
                                      <option value="<?=$p['prosedur']; ?>"><?=$p['prosedur']; ?></option>

                                      <?php } ?>
                              </select>
                              </div>
                              <div class="col-sm-4"></div>
                              <br><br>
                              <div class="col-sm-3">Jumlah Bidang : <p class="text-kecil">* khusus prosedur "pemecahan bidang" minimal 2 bidang</p></div>
                              <div class="col-sm-5"><input type="text" class="col-sm form-control" name="jml_bidang" ></input></div>
                              <div class="col-sm-4"></div>

                              <div class="col-sm-3">Luas (m2) :</div>
                              <div class="col-sm-5"><input type="text" class="col-sm form-control" name="luas_bidang" ></input></div>
                              <div class="col-sm-4"></div>

                              <br><br>
                              <div class="col-sm-3">Penggunaan :</div>
                              <div class="col-sm-5">
                                <select class="col-sm form-select" id="posisi" name="penggunaan" >
                                  <option selected> -- Pilih Penggunaan Tanah --</option>
                                  <option value="pertanian">Pertanian</option>
                                  <option value="nonpertanian">Non Pertanian</option>
                                </select>
                              </div>
                              <div class="col-sm-4"></div>

                            </div>
                            <br>
                            <div class="row">
                              <div class="col-sm-5">
                                  <button id="save-btn" type="submit" class="btn btn-success" name="submit">Hitung</button>
                                  <button id="reset-btn" type="submit" class="btn btn-warning" name="reset">Reset</button>
                                  <br>
                            </div>
                          </div>  
                       
                        <?php
                            if(isset($_POST["submit"]))
                            {
                              $prosedur=$_POST['prosedur'];
                              $jml_bidang=$_POST['jml_bidang'];
                              $luas_bidang=$_POST['luas_bidang'];
                              $penggunaan=$_POST['penggunaan'];
                              $HSBK_pertanian=30000;
                              $HSBK_nonpertanian=60000;
                              $konstanta=100000;
                              $PNBP_hak=50000;
                              // ==============================================================================================
                              if($prosedur == "Pemisahan Bidang" OR $prosedur == "Pemecahan Bidang" OR $prosedur == "Penggabungan Bidang" )
                                {
                                    if($penggunaan == "nonpertanian")
                                    {
                                        echo "<div class='row'>";
                                        echo "<div class='card-body'>";
                                        echo "<h5><b>Rincian Biaya :<b><h5>";
                                        echo "<br>";
                                        echo "Prosedur: ".$prosedur.", "."Jumlah Bidang: ".$jml_bidang.", "."Luas: ".$luas_bidang." m2".", "."Penggunaan: ".$penggunaan;
                                        echo "<br>";
                                        echo "PNBP Pengukuran : ";
                                        $pengukuran = $jml_bidang*((($luas_bidang/500)*$HSBK_nonpertanian)+$konstanta);
                                        echo "Rp. ".$pengukuran;
                                        echo "<br>";
                                        echo "PNBP Pendaftaran Hak : ";
                                        $pendaftaran_hak = $jml_bidang*$PNBP_hak;
                                        echo "Rp. ".$pendaftaran_hak;
                                        $total = $pengukuran+$pendaftaran_hak;
                                        echo "<br>";
                                        echo "Jumlah yang harus dibayar : Rp. ".$total;
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    if($penggunaan == "pertanian")
                                    {
                                        
                                        echo "<div class='row'>";
                                        echo "<div class='card-body'>";
                                        echo "<h5><b>Rincian Biaya :<b><h5>";
                                        echo "<br>";
                                        echo "Prosedur: ".$prosedur.", "."Jumlah Bidang: ".$jml_bidang.", "."Luas: ".$luas_bidang." m2".", "."Penggunaan: ".$penggunaan;
                                        echo "<br>";
                                        echo "PNBP Pengukuran : ";
                                        $pengukuran = $jml_bidang*((($luas_bidang/500)*$HSBK_pertanian)+$konstanta);
                                        echo "Rp. ".$pengukuran;
                                        echo "<br>";
                                        echo "PNBP Pendaftaran Hak : ";
                                        $pendaftaran_hak = $jml_bidang*$PNBP_hak;
                                        $total = $pengukuran + $pendaftaran_hak;
                                        echo "Rp. ".$pendaftaran_hak;
                                        echo "<br>";
                                        echo "Jumlah yang harus dibayar : Rp. ".$total;
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                }
                              // ============================================================================================
                              if($prosedur == "Pelepasan Sebagian Hak" )
                              {
                                  if($penggunaan == "nonpertanian")
                                  {
                                        echo "<div class='row'>";
                                        echo "<div class='card-body'>";
                                        echo "<h5><b>Rincian Biaya :<b><h5>";
                                        echo "<br>";
                                        echo "Prosedur: ".$prosedur.", "."Jumlah Bidang: ".$jml_bidang.", "."Luas: ".$luas_bidang." m2".", "."Penggunaan: ".$penggunaan;
                                        echo "<br>";
                                        echo "PNBP Pengukuran : ";
                                        $pengukuran = $jml_bidang*((($luas_bidang/500)*$HSBK_nonpertanian)+$konstanta);
                                        echo "Rp. ".$pengukuran;
                                        echo "<br>";
                                        // echo "PNBP Pendaftaran Hak : ";
                                        // $pendaftaran_hak = $jml_bidang*$PNBP_hak;
                                        // echo "Rp. ".$pendaftaran;
                                        // $total = $pengukuran+$pendaftaran_hak;
                                        $total = $pengukuran;
                                        echo "<br>";
                                        echo "Jumlah yang harus dibayar : Rp. ".$total;
                                        echo "</div>";
                                        echo "</div>";
                                  }
                                  if($penggunaan == "pertanian")
                                  {
                                        echo "<div class='row'>";
                                        echo "<div class='card-body'>";
                                        echo "<h5><b>Rincian Biaya :<b><h5>";
                                        echo "<br>";
                                        echo "Prosedur: ".$prosedur.", "."Jumlah Bidang: ".$jml_bidang.", "."Luas: ".$luas_bidang." m2".", "."Penggunaan: ".$penggunaan;
                                        echo "<br>";
                                        echo "PNBP Pengukuran : ";
                                        $pengukuran = $jml_bidang*((($luas_bidang/500)*$HSBK_pertanian)+$konstanta);
                                        echo "Rp. ".$pengukuran;
                                        echo "<br>";
                                        // echo "PNBP Pendaftaran Hak : ";
                                        // $pendaftaran_hak = $jml_bidang*$PNBP_hak;
                                        // $total = $pengukuran + $pendaftaran_hak;
                                        $total = $pengukuran;
                                        // echo "Rp. ".$pendaftaran;
                                        echo "<br>";
                                        echo "Jumlah yang harus dibayar : Rp. ".$total;
                                        echo "</div>";
                                        echo "</div>";
                                  }
                              }
                              // ============================================================================================
                                if($prosedur == "Pendaftaran SK Hak" )
                                {
                                    if($penggunaan == "nonpertanian")
                                    {
                                        echo "<div class='row'>";
                                        echo "<div class='card-body'>";
                                        echo "<h5><b>Rincian Biaya :<b><h5>";
                                        echo "<br>";
                                        echo "Prosedur: ".$prosedur.", "."Jumlah Bidang: ".$jml_bidang.", "."Luas: ".$luas_bidang." m2".", "."Penggunaan: ".$penggunaan;
                                        echo "<br>";
                                        echo "PNBP Pengukuran : ";
                                        $pengukuran = $jml_bidang*((($luas_bidang/500)*$HSBK_nonpertanian)+$konstanta);
                                        echo "Rp. ".$pengukuran;
                                        echo "<br>";
                                        echo "PNBP Pemeriksaan Tanah : ";
                                        $pemeriksaan_tanah = $jml_bidang*((($luas_bidang/500)*20000)+350000);
                                        echo "Rp. ".$pemeriksaan_tanah;
                                        $total = $pengukuran+$pemeriksaan_tanah;
                                        echo "<br>";
                                        echo "Jumlah yang harus dibayar : Rp. ".$total;
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    if($penggunaan == "pertanian")
                                    {
                                        echo "<div class='row'>";
                                        echo "<div class='card-body'>";
                                        echo "<h5><b>Rincian Biaya :<b><h5>";
                                        echo "<br>";
                                        echo "Prosedur: ".$prosedur.", "."Jumlah Bidang: ".$jml_bidang.", "."Luas: ".$luas_bidang." m2".", "."Penggunaan: ".$penggunaan;
                                        echo "<br>";
                                        echo "PNBP Pengukuran : ";
                                        $pengukuran = $jml_bidang*((($luas_bidang/500)*$HSBK_pertanian)+$konstanta);
                                        echo "Rp. ".$pengukuran;
                                        echo "<br>";
                                        echo "PNBP Pemeriksaan Tanah : ";
                                        $pemeriksaan_tanah = $jml_bidang*((($luas_bidang/500)*10000)+350000);
                                        echo "Rp. ".$pemeriksaan_tanah;
                                        $total = $pengukuran+$pemeriksaan_tanah;
                                        echo "<br>";
                                        echo "Jumlah yang harus dibayar : Rp. ".$total;
                                        echo "</div>";
                                        echo "</div>";
                                  }
                                }
                              // ============================================================================================
                                if($prosedur == "Pendaftaran Tanah Pertama Kali Wakaf untuk Tanah Yang Belum Sertipikat (Tanah Negara)" )
                                {
                                    if($penggunaan == "nonpertanian")
                                    {
                                        echo "<div class='row'>";
                                        echo "<div class='card-body'>";
                                        echo "<h5><b>Rincian Biaya :<b><h5>";
                                        echo "<br>";
                                        echo "Prosedur: ".$prosedur.", "."Jumlah Bidang: ".$jml_bidang.", "."Luas: ".$luas_bidang." m2".", "."Penggunaan: ".$penggunaan;
                                        echo "<br>";
                                        echo "PNBP Pengukuran : ";
                                        $pengukuran = 0;
                                        echo "Rp. ".$pengukuran;
                                        echo "<br>";
                                        echo "PNBP Pemeriksaan Tanah : ";
                                        $pemeriksaan_tanah = 0;
                                        echo "Rp. ".$pemeriksaan_tanah;
                                        $total = $pengukuran+$pemeriksaan_tanah;
                                        echo "<br>";
                                        echo "Jumlah yang harus dibayar : Rp. ".$total;
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    if($penggunaan == "pertanian")
                                    {
                                        echo "<div class='row'>";
                                        echo "<div class='card-body'>";
                                        echo "<h5><b>Rincian Biaya :<b><h5>";
                                        echo "<br>";
                                        echo "Prosedur: ".$prosedur.", "."Jumlah Bidang: ".$jml_bidang.", "."Luas: ".$luas_bidang." m2".", "."Penggunaan: ".$penggunaan;
                                        echo "<br>";
                                        echo "PNBP Pengukuran : ";
                                        $pengukuran = 0;
                                        echo "Rp. ".$pengukuran;
                                        echo "<br>";
                                        echo "PNBP Pemeriksaan Tanah : ";
                                        $pemeriksaan_tanah = 0;
                                        echo "Rp. ".$pemeriksaan_tanah;
                                        $total = $pengukuran+$pemeriksaan_tanah;
                                        echo "<br>";
                                        echo "Jumlah yang harus dibayar : Rp. ".$total;
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                }
                              // ============================================================================================
                                if($prosedur == "Pengembalian Batas" )
                                {
                                    if($penggunaan == "nonpertanian")
                                    {
                                        echo "<div class='row'>";
                                        echo "<div class='card-body'>";
                                        echo "<h5><b>Rincian Biaya :<b><h5>";
                                        echo "<br>";
                                        echo "Prosedur: ".$prosedur.", "."Jumlah Bidang: ".$jml_bidang.", "."Luas: ".$luas_bidang." m2".", "."Penggunaan: ".$penggunaan;
                                        echo "<br>";
                                        echo "PNBP Pengukuran : ";
                                        $pengukuran = 1.5*$jml_bidang*((($luas_bidang/500)*$HSBK_nonpertanian)+$konstanta);
                                        echo "Rp. ".$pengukuran;
                                        echo "<br>";
                                        // echo "PNBP Pemeriksaan Tanah : ";
                                        // $pemeriksaan_tanah = $jml_bidang*((($luas_bidang/500)*20000)+350000);
                                        // echo "Rp. ".$pemeriksaan_tanah;
                                        $total = $pengukuran;
                                        // echo "<br>";
                                        echo "Jumlah yang harus dibayar : Rp. ".$total;
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                if($penggunaan == "pertanian")
                                {
                                        echo "<div class='row'>";
                                        echo "<div class='card-body'>";
                                        echo "<h5><b>Rincian Biaya :<b><h5>";
                                        echo "<br>";
                                        echo "Prosedur: ".$prosedur.", "."Jumlah Bidang: ".$jml_bidang.", "."Luas: ".$luas_bidang." m2".", "."Penggunaan: ".$penggunaan;
                                        echo "<br>";
                                        echo "PNBP Pengukuran : ";
                                        $pengukuran = 1.5*$jml_bidang*((($luas_bidang/500)*$HSBK_pertanian)+$konstanta);
                                        echo "Rp. ".$pengukuran;
                                        echo "<br>";
                                        // echo "PNBP Pemeriksaan Tanah : ";
                                        // $pemeriksaan_tanah = $jml_bidang*((($luas_bidang/500)*10000)+350000);
                                        // echo "Rp. ".$pemeriksaan_tanah;
                                        $total = $pengukuran;
                                        // echo "<br>";
                                        echo "Jumlah yang harus dibayar : Rp. ".$total;
                                        echo "</div>";
                                        echo "</div>";
                                  }
                                }
                              // ============================================================================================
                              if($prosedur == "Pengukuran dan Pemetaan Kadastral" OR $prosedur == "Pengukuran Ulang dan Pemetaan Kadastral" )
                              {
                                  if($penggunaan == "nonpertanian")
                                  {
                                      echo "<div class='row'>";
                                      echo "<div class='card-body'>";
                                      echo "<h5><b>Rincian Biaya :<b><h5>";
                                      echo "<br>";
                                      echo "Prosedur: ".$prosedur.", "."Jumlah Bidang: ".$jml_bidang.", "."Luas: ".$luas_bidang." m2".", "."Penggunaan: ".$penggunaan;
                                      echo "<br>";
                                      echo "PNBP Pengukuran : ";
                                      $pengukuran = $jml_bidang*((($luas_bidang/500)*$HSBK_nonpertanian)+$konstanta);
                                      echo "Rp. ".$pengukuran;
                                      echo "<br>";
                                      $total = $pengukuran;
                                      // echo "<br>";
                                      echo "Jumlah yang harus dibayar : Rp. ".$total;
                                      echo "</div>";
                                      echo "</div>";
                                  }
                              if($penggunaan == "pertanian")
                              {
                                      echo "<div class='row'>";
                                      echo "<div class='card-body'>";
                                      echo "<h5><b>Rincian Biaya :<b><h5>";
                                      echo "<br>";
                                      echo "Prosedur: ".$prosedur.", "."Jumlah Bidang: ".$jml_bidang.", "."Luas: ".$luas_bidang." m2".", "."Penggunaan: ".$penggunaan;
                                      echo "<br>";
                                      echo "PNBP Pengukuran : ";
                                      $pengukuran = $jml_bidang*((($luas_bidang/500)*$HSBK_pertanian)+$konstanta);
                                      echo "Rp. ".$pengukuran;
                                      echo "<br>";
                                      $total = $pengukuran;
                                      // echo "<br>";
                                      echo "Jumlah yang harus dibayar : Rp. ".$total;
                                      echo "</div>";
                                      echo "</div>";
                                }
                              }
                            // ============================================================================================
                            if($prosedur == "Sertipikat Pengganti Karena Blanko Lama"  OR $prosedur == "Sertipikat Pengganti Karena Blanko Rusak" OR $prosedur == "Sertipikat Pengganti Karena Hilang")
                            {
                                if($penggunaan == "nonpertanian")
                                {
                                    echo "<div class='row'>";
                                    echo "<div class='card-body'>";
                                    echo "<h5><b>Rincian Biaya :<b><h5>";
                                    echo "<br>";
                                    echo "Prosedur: ".$prosedur.", "."Jumlah Bidang: ".$jml_bidang.", "."Luas: ".$luas_bidang." m2".", "."Penggunaan: ".$penggunaan;
                                    echo "<br>";
                                    echo "PNBP Salinan Surat Ukur (untuk Sertipikat Hak Milik
                                    Atas Satuan Rumah Susun dan Ganti Blanko) :";
                                    $salinan = 100000;
                                    echo "Rp. ".$salinan;
                                    echo "<br>";
                                    echo "PNBP Pelayanan Penggantian Blanko Sertifikat (karena
                                    hilang/rusak/lama) :";
                                    $pendaftaran = 50000;
                                    echo "Rp. ".$pendaftaran;
                                    echo "<br>";
                                    $total = $salinan+$pendaftaran;
                                    echo "Jumlah yang harus dibayar : Rp. ".$total;
                                    echo "</div>";
                                    echo "</div>";
                                }
                            if($penggunaan == "pertanian")
                            {
                              echo "<div class='row'>";
                              echo "<div class='card-body'>";
                              echo "<h5><b>Rincian Biaya :<b><h5>";
                              echo "<br>";
                              echo "Prosedur: ".$prosedur.", "."Jumlah Bidang: ".$jml_bidang.", "."Luas: ".$luas_bidang." m2".", "."Penggunaan: ".$penggunaan;
                              echo "<br>";
                              echo "PNBP Salinan Surat Ukur (untuk Sertipikat Hak Milik
                              Atas Satuan Rumah Susun dan Ganti Blanko) :";
                              $salinan = 100000;
                              echo "Rp. ".$salinan;
                              echo "<br>";
                              echo "PNBP Pelayanan Penggantian Blanko Sertifikat (karena
                              hilang/rusak/lama) :";
                              $pendaftaran = 50000;
                              echo "Rp. ".$pendaftaran;
                              echo "<br>";
                              $total = $salinan+$pendaftaran;
                              echo "Jumlah yang harus dibayar : Rp. ".$total;
                              echo "</div>";
                              echo "</div>";
                        }
                            }
                          // ============================================================================================



                            }
                            if(isset($_POST["reset"]))
                            {
                              header ("Location:index.php?page=info_hitung");
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