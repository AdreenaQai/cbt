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
            <h1>Informasi Prosedur Berkas</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" style="font-family:calibri">
        <div class="row">
          <div class="col-12">
          <form role="form" method="post" action="">

           

            <div class="card">
              <div class="card-header" style="font-family:calibri">
               <h5>Pilih Prosedur<h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <div class="form-group">
                      <select class="form-select col-sm-8" id="prosedur" name="prosedur">
                        <option selected>Pilih Kegiatan...</option>
                        <?php
                            $no = 0;
                            $sql=mysqli_query($koneksi,"SELECT * FROM tbl_prosedur");
                            while($info=mysqli_fetch_array($sql)){
                            $no++;  
                        ?>

                        <option value="<?= $info['prosedur'];?>"><?= $info['prosedur'];?></option>
                     
                      <?php } ?> 
                    </select>

              </div>
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
            <?php
            if ($_SERVER['REQUEST_METHOD']=="POST") 
                  {
                        $prosedur = $_POST['prosedur'];
                  }
            ?>


            <div class="card">
              <div class="card-header" style="font-family:calibri">
               <h5><?=$prosedur; ?></h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div>
                  <?php
                  

                  if(isset($_POST["submit"]))
                    {
                      // ================================-->//query 
                      if($prosedur=="Pemecahan Bidang" OR $prosedur=="Pemisahan Bidang" OR $prosedur=="Penggabungan Bidang" OR $prosedur=="Pelepasan Sebagian Hak")
                        {
                        echo"<h6><b>Persyaratan</b></h6>";
                        echo"1. Formulir permohonan yang sudah diisi dan ditandatangani pemohon atau kuasanya di atas materai cukup<br>";
                        echo"2. Surat kuasa apabila dikuasakan<br>";
                        echo"3. Fotokopi identitas (KTP,KK,BPJS) dan kuasa apabila dikuasakan, yang telah dicocokkan dengan aslinya oleh petugas loket<br>";
                        echo"4. Fotokopi akta pendirian dan pengesahan badan hukum yang telah dicocokkan dengan aslinya oleh petugas loket, bagi badan hukum<br>";
                        echo"5. Sertipikat Asli<br>";
                        echo"6. Rencana Tapak/Site Plan dari Pemerintah Kabupaten/Kota setempat<br>";
                        echo"<br>";
                        echo"<h6><b>Penyelesaian</b></h6>";
                        echo"15 (lima belas) hari kerja (pengukuran 10 hari kerja)<br>";
                        echo"<br>";
                        echo"<h6><b>Keterangan</b></h6>";
                        echo"1. Identitas diri (KTP/KK/SIM)<br>";
                        echo"2. Luas, letak dan penggunaan tanah yang dimohon<br>";
                        echo"3. Pernyataan tanah tidak sengketa<br>";
                        echo"4. Pernyataan tanah dikuasai secara fisik<br>";
                        echo"5. Alasan pemisahan/pemecahan/penggabungan/pelepasan sebagian<br>";
                        echo"<br>";
                        exit;
                        }
                        // ==================================  end-of query 
                        if($prosedur=="Pendaftaran SK Hak")
                        {
                        echo"<h6><b>Persyaratan</b></h6>";
                        echo"1. Formulir permohonan yang sudah diisi dan ditandatangani pemohon atau kuasanya di atas materai cukup<br>";
                        echo"2. Surat kuasa apabila dikuasakan<br>";
                        echo"3. Fotokopi identitas pemohon/pemegang dan penerima hak (KTP,KK,BPJS) serta kuasa apabila dikuasakan, yang telah dicocokkan dengan aslinya oleh petugas loket<br>";
                        echo"4. Asli bukti perolehan tanah/Alas Hak<br>";
                        echo"5. Asli Surat-surat bukti pelepasan hak dan pelunasan tanah dan rumah (Rumah Gol III) atau rumah yang dibeli pemerintah<br>";
                        echo"6. Fotocopy SPPT PBB tahun berjalan yang telah dicocokkan dengan aslinya oleh petugas loket, penyerahan bukti SSB (BPHTB) dan bukti bayar uang pemasukan <br>";
                        echo"&nbsp &nbsp (pada saat pendaftaran hak)<br>";
                        echo"<br>";
                        echo"<h6><b>Penyelesaian</b></h6>";
                        echo"<li>38 hari kerja untuk tanah pertanian yang luasnya tidak lebih dari 2 Ha (pengukuran: 10 hari kerja)</li>";
                        echo"<li>38 hari kerja untuk tanah non pertanian yang luasnya tidak lebih dari 2.000 m2 (pengukuran: 10 hari kerja)</li><br>";
                        echo"<li>57 hari kerja untuk tanah pertanian yang luasnya lebih dari 2 Ha (pengukuran: 10 hari kerja)</li>";
                        echo"<li>57 hari kerja untuk tanah non pertanian yang luasnya lebih dari 2.000 m2 s.d. 5.000 m2 (pengukuran: 10 hari kerja)</li><br>";
                        echo"<li>97 hari kerja untuk tanah non pertanian yang luasnya lebih dari 5.000 m2 (pengukuran: 10 hari kerja)</li><br>";
                        echo"<br>";
                        echo"<h6><b>Keterangan</b></h6>";
                        echo"1. Identitas diri (KTP/KK/SIM)<br>";
                        echo"2. Luas, letak dan penggunaan tanah yang dimohon<br>";
                        echo"3. Pernyataan tanah tidak sengketa<br>";
                        echo"4. Pernyataan tanah/ bangunan dikuasai secara fisik<br>";
                        echo"5.	Pernyataan menguasai tanah tidak lebih dari 5 (lima) bidang untuk permohonan rumah tinggal<br>";
                        echo"<br>";
                        }
                        // ==================================  end-of query 
                        if($prosedur=="Pengukuran dan Pemetaan Kadastral")
                        {
                        echo"<h6><b>Persyaratan</b></h6>";
                        echo"1. Formulir permohonan yang sudah diisi dan ditandatangani pemohon atau kuasanya di atas materai cukup<br>";
                        echo"2. Surat kuasa apabila dikuasakan<br>";
                        echo"3.	Fotocopy identitas (KTP, KK) pemohon dan kuasa apabila dikuasakan, yang telah dicocokkan dengan aslinya oleh petugas loket<br>";
                        echo"4. Asli bukti perolehan tanah/Alas Hak<br>";
                        echo"5. Fotocopy Akta Pendirian dan Pengesahan Badan  Hukum yang telah dicocokkan dengan aslinya oleh petugas loket bagi Badan Hukum<br>";
                        echo"<br>";
                        echo"<h6><b>Penyelesaian</b></h6>";
                        echo"18 (delapan belas) hari kerja (pengukuran: 10 hari kerja)";
                        echo"<br>";
                        echo"<h6><b>Keterangan</b></h6>";
                        echo"1. Identitas diri (KTP/KK/SIM)<br>";
                        echo"2. Luas, letak dan penggunaan tanah yang dimohon<br>";
                        echo"3. Pernyataan tanah tidak sengketa<br>";
                        echo"4. Pernyataan tanah/ bangunan dikuasai secara fisik<br>";
                        echo"5. Pernyataan telah memasang tanda batas<br>";
                        }
                        //======================================= end-of query
                        if($prosedur=="Pendaftaran Tanah Pertama Kali Wakaf untuk Tanah Yang Belum Sertipikat (Tanah Negara)")
                        {
                        echo"<h6><b>Persyaratan</b></h6>";
                        echo"1. Formulir permohonan yang sudah diisi dan ditandatangani pemohon atau kuasanya di atas materai cukup<br>";
                        echo"2.	Surat Kuasa apabila dikuasakan<br>";
                        echo"3.	Fotocopy identitas pemohon/Nadzir dan kuasa  apabila  dikuasakan, yang telah dicocokkan dengan aslinya oleh petugas loket<br>";
                        echo"4.	Bukti alas hak/garapan<br>";
                        echo"5.	Akta Ikrar Wakaf/Surat Ikrar Wakaf<br>";
                        echo"6.	Foto copy SPPT PBB Tahun berjalan yang telah dicocokkan dengan aslinya oleh petugas loket<br>";
                        echo"7.	Pertimbangan Teknis Pertanahan<br>";
                        echo"8.	Melampirkan bukti SSP/PPh sesuai dengan ketentuan<br>";
                        echo"<br>";
                        echo"<h6><b>Penyelesaian</b></h6>";
                        echo"57 hari kerja (pengukuran: 10 hari kerja)";
                        echo"<br>";
                        echo"<h6><b>Keterangan</b></h6>";
                        echo"1. Identitas diri (KTP/KK/SIM)<br>";
                        echo"2. Luas, letak dan penggunaan tanah yang dimohon<br>";
                        echo"3. Pernyataan tanah tidak sengketa<br>";
                        echo"4. Pernyataan tanah/ bangunan dikuasai secara fisik<br>";
                        echo"<br>";
                        }
                        //======================================= end-of query
                        if($prosedur=="Pengembalian Batas" OR $prosedur=="Pengukuran Ulang Dan Pemetaan Kadastral")
                        {
                        echo"<h6><b>Persyaratan</b></h6>";
                        echo"1. Formulir permohonan yang sudah diisi dan ditandatangani pemohon atau kuasanya di atas materai cukup<br>";
                        echo"2.	Surat Kuasa apabila dikuasakan<br>";
                        echo"3.	Fotocopy identitas (KTP, KK) pemohon dan kuasa apabila dikuasakan, yang telah dicocokkan dengan aslinya oleh petugas loket<br>";
                        echo"4.	Fotocopy Akta Pendirian dan Pengesahan Badan  Hukum yang telah dicocokkan dengan aslinya oleh petugas loket bagi Badan Hukum<br>";
                        echo"5.	Fotocopy Sertipikat yang telah dicocokkan dengan aslinya oleh petugas loket<br>";
                        echo"<br>";
                        echo"<h6><b>Penyelesaian</b></h6>";
                        echo"<li>12 (dua belas) hari kerja untuk luasan tidak lebih dari 40 Ha (pengukuran: 10 hari kerja)</li>";
                        echo"<li>30 (tiga puluh) hari kerja untuk luasan lebih dari 40 Ha (pengukuran: 10 hari kerja)</li>";
                        echo"<br>";
                        echo"<h6><b>Keterangan</b></h6>";
                        echo"1. Identitas diri (KTP/KK/SIM)<br>";
                        echo"2. Luas, letak dan penggunaan tanah yang dimohon<br>";
                        echo"3.	Pernyataan telah memasang tanda batas<br>";
                        echo"<br>";
                        }
                        //======================================= end-of query
                        if($prosedur=="Sertipikat Pengganti Karena Blanko Lama" OR $prosedur=="Sertipikat Pengganti Karena Blanko Rusak")
                        {
                        echo"<h6><b>Persyaratan</b></h6>";
                        echo"1. Formulir permohonan yang sudah diisi dan ditandatangani pemohon atau kuasanya di atas materai cukup<br>";
                        echo"2.	Surat Kuasa apabila dikuasakan<br>";
                        echo"3.	Fotocopy identitas (KTP, KK) pemohon dan kuasa apabila dikuasakan, yang telah dicocokkan dengan aslinya oleh petugas loket<br>";
                        echo"4.	Fotocopy Akta Pendirian dan Pengesahan Badan  Hukum yang telah dicocokkan dengan aslinya oleh petugas loket bagi Badan Hukum<br>";
                        echo"5.	Sertipikat asli<br>";
                        echo"<br>";
                        echo"<h6><b>Penyelesaian</b></h6>";
                        echo"19 (sembilan belas) hari kerja (pengukuran: 10 hari kerja)";
                        echo"<br>";
                        echo"<h6><b>Keterangan</b></h6>";
                        echo"1. Identitas diri (KTP/KK/SIM)<br>";
                        echo"2. Luas, letak dan penggunaan tanah yang dimohon<br>";
                        echo"3.	Pernyataan tanah tidak sengketa<br>";
                        echo"4.	Pernyataan tanah dikuasai secara fisik<br>";
                        echo"<br>";
                        }
                        //======================================= end-of query
                        if($prosedur=="Sertipikat Pengganti Karena Hilang")
                        {
                        echo"<h6><b>Persyaratan</b></h6>";
                        echo"1. Formulir permohonan yang sudah diisi dan ditandatangani pemohon atau kuasanya di atas materai cukup<br>";
                        echo"2.	Surat Kuasa apabila dikuasakan<br>";
                        echo"3.	Fotocopy identitas (KTP, KK) pemohon dan kuasa apabila dikuasakan, yang telah dicocokkan dengan aslinya oleh petugas loket<br>";
                        echo"4.	Fotocopy Akta Pendirian dan Pengesahan Badan  Hukum yang telah dicocokkan dengan aslinya oleh petugas loket bagi Badan Hukum<br>";
                        echo"5.	Fotocopy sertipikat (jika ada)<br>";
                        echo"6.	Surat Pernyataan dibawah sumpah oleh pemegang hak/yang menghilangkan<br>";
                        echo"7.	Surat tanda lapor kehilangan dari Kepolisian setempat<br>";
                        echo"<br>";
                        echo"<h6><b>Penyelesaian</b></h6>";
                        echo"40 (empat puluh) hari kerja (pengukuran: 10 hari kerja)";
                        echo"<br>";
                        echo"<h6><b>Keterangan</b></h6>";
                        echo"1. Identitas diri (KTP/KK/SIM)<br>";
                        echo"2. Luas, letak dan penggunaan tanah yang dimohon<br>";
                        echo"3.	Pernyataan tanah tidak sengketa dan tanpa perubahan fisik<br>";
                        echo"4.	Pernyataan tanah dikuasai secara fisik<br>";
                        echo"5.	Pengumuman di surat kabar<br>";
                        echo"<br>";
                        }
                        //======================================= end-of query



                    }
                  ?>


                  <?php
                  if(isset($_POST["reset"]))
                  {                          
                      header ("Location:index.php?page=info");
                  }
                  ?>


                </div>
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