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
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Aplikasi Cek Berkas Ta'" />
        <meta name="author" content="muslih fauzi" />
        <title>Cek Berkas Ta'</title>
        <!-- Favicon-->
        <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet">

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" >
        <!-- Font Awesome -->
        <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <!-- <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"> -->

        <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="assets/dist/css/adminlte.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link href='assets/icon/logo.png' rel='shortcut icon'>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">

  <style>
    .text-kecil3 {
        font-size:12px;
        color:white;

    }

    .putih {
        color:white;

    }

.mt-2 .nav-item1{
    margin-top:50px;
}

.mt-2 .nav-item a:hover{
background-color:grey;
color:orange;
opacity:0.75;

}


.dropdown-item {
  font-size:12.5px;
  opacity:0.8;


}
  .footer-basic {
  margin-top:650px;
  padding:10px 0;
  /* background-color:#ffffff; */
  background-color:grey;
  /* margin-left:25px; */
  color:#4b4c4d;
}

.footer-basic ul {
  padding:0;
  list-style:none;
  text-align:center;
  font-size:18px;
  line-height:1.6;
  margin-bottom:0;

}

.footer-basic li {
  padding:0 10px;
}

.footer-basic ul a {
  color:white;
  text-decoration:none;
  opacity:0.8;
}

.footer-basic ul a:hover {
  opacity:1;
}

.footer-basic .social {
  text-align:center;
  padding-bottom:5px;
  color:orange;
  padding-left:0px;
}

.footer-basic .social > a {
  font-size:24px;
  width:40px;
  height:40px;
  line-height:40px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  border:1px solid #ccc;
  margin:0 8px;
  color:inherit;
  opacity:0.75;
}



.footer-basic .social > a:hover {
  opacity:0.7;
}

.footer-basic .copyright {
  margin-top:5px;
  text-align:center;
  font-size:15px;
  color:white;
  margin-bottom:0;
  padding-left:0px;

}
.footer-basic .developer {
  margin-top:5px;
  text-align:center;
  font-size:12px;
  color:orange;
  margin-bottom:0;
  padding-left:0px;
}

.footer-basic .nama {
  margin-top:5px;
  text-align:center;
  font-size:12px;
  color:white;
  margin-bottom:0;
  padding-left:10px;
}


</style>



    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-navy" id="sidebar-wrapper">
                <!-- <div class="sidebar-heading border-bottom bg-dark">Cek Berkas Ta'</div> -->
                <a href="index.php?page=dash" class="brand-link bg-orange">
                    <img src="assets/img/logo.png" class="brand-image img-circle elevation-5">
                    <span class="brand-text font-weight-light"><b><i>Cek Berkas Ta'</i></b></span>
                </a>
                </a>
                <a href="index.php?page=dash" class="brand-link bg-cyan">
                    <img src="assets/img/bpn.png" class="brand-image img-circle elevation-3"><h6 class="text-kecil3">Kantor Pertanahan<br>Kabupaten Polewali Mandar</h6>
                    <!-- <img src="" class="brand-image img-circle elevation-3"><h6 class="text-kecil">Kab. Polewali Mandar</h6> -->

                </a>

                
                <div class="list-group list-group-flush">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                           with font-awesome or any other icon font library -->
                     
            
                           <li class="nav-item">
                            <a href="index.php?page=dash" class="nav-link">
                              <i class="nav-icon fas fa-home putih"></i>
                              <p style="color:white;">
                                Beranda
                              </p>
                            </a>
                          </li>
                     
                          <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-file-archive putih"></i>
                              <p style="color:white;">
                                Berkas PNBP
                                <i class="right fas fa-angle-left"></i>
                              </p>
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="index.php?page=data_QR_berkas" class="nav-link">
                                  <i class="far fa-minus nav-icon putih"></i>
                                  <p style="color:white;">Data Berkas</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="index.php?page=data_ekspedisi" class="nav-link">
                                  <i class="far fa-minus nav-icon putih"></i>
                                  <p style="color:white;">Ekspedisi Berkas</p>
                                </a>
                              </li>
                            </ul>
                          </li>
                          <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-search putih"></i>
                              <p style="color:white;">
                                Query
                                <i class="fas fa-angle-left right"></i>
                              </p>
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="index.php?page=query_berkas" class="nav-link">
                                  <i class="far fa-minus nav-icon putih"></i>
                                  <p style="color:white;">Query Berkas</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="index.php?page=informasi_berkas" class="nav-link">
                                  <i class="far fa-minus nav-icon"></i>
                                  <p style="color:white;">Informasi Berkas</p>
                                </a>
                              </li>
                
                             
                            </ul>
                          </li>
                          <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-info putih"></i>
                              <p style="color:white;">
                                Info Layanan
                                <i class="fas fa-angle-left right"></i>
                              </p>
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="index.php?page=info" class="nav-link">
                                  <i class="far fa-minus nav-icon"></i>
                                  <p style="color:white;">Jenis Layanan</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="index.php?page=info_hitung" class="nav-link">
                                  <i class="far fa-minus nav-icon"></i>
                                  <p style="color:white;">Simulasi Hitung Biaya</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="index.php?page=info_peraturan" class="nav-link">
                                  <i class="far fa-minus nav-icon"></i>
                                  <p style="color:white;">Info Peraturan</p>
                                </a>
                              </li>
                
                
                            </ul>
                          </li>
                          <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-question-circle putih"></i>
                              <p style="color:white;">
                                Panduan
                                <i class="fas fa-angle-left right"></i>
                              </p>
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="index.php?page=panduan" class="nav-link">
                                  <i class="far fa-minus nav-icon"></i>
                                  <p style="color:white;">Panduan Aplikasi</p>
                                </a>
                              </li>
                            </ul>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="index.php?page=about" class="nav-link">
                                  <i class="far fa-minus nav-icon"></i>
                                  <p style="color:white;">About Us</p>
                                </a>
                              </li>
                            </ul>
                
                          </li>
                
                          <li class="nav-item1">
                            <a href="#" class="nav-link">
                            </a>
                          </li>

                                <?php if($id_status=="admin"){ ?>
                          <li class="nav-item">
                            <a href="index.php?page=data_user" class="nav-link">
                              <i class="nav-icon fas fa-users putih"></i>
                              <p style="color:white;">
                                Administrator
                                <!-- <i class="fas fa-angle-left right"></i> -->
                                <!-- <span class="badge badge-info right"></span> -->
                              </p>
                            </a>
                          </li>
                                <?php } ?>

                        </ul>
                    </nav>
    
    
                    <!-- <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Shortcuts</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Overview</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Status</a> -->
                </div> 
            
            </div>
            <!-- ======================================================================================================================== -->
          
            <!-- ======================================================================================================================== -->
            <!-- END OF Sidebar-->

            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <!-- <button class="btn btn-primary" id="sidebarToggle">Toggle</button> -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <!-- <a class="nav-link"  role="button" id="sidebarToggle"><i class="fas fa-bars" aria-hidden="true"></i></a> -->
                                <a class="nav-item " role="button" id="sidebarToggle"><i class="fas fa-bars"></i></a>
                            </li>
                            <!-- <li class="nav-item d-none d-sm-inline-block">
                                <a href="index.php?page=dash" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="logout.php" class="nav-link">Logout</a>
                            </li> -->
                        </ul>
                        <!-- ================================================= -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <!-- <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Link</a></li> -->
                                <li>
                                    <img src="assets/foto_user/<?=$id_username?>.jpg" class="img-circle elevation-2" alt="User Image" width="35" height="35">
                                </li>
      
                                <!-- <li class="nav-item d-none d-sm-inline-block">
                                    <a href="#" class="nav-link"><?= ucwords($id_nama); ?></a>
                                </li> -->
                                <!-- <li>          
                                    <a href="#" class="nav-link" ><?= ucfirst($id_status); ?></a>
                                </li> -->

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= ucwords($id_nama)." "; ?></a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!"><b>Profil</b></a>
                                        <div class="dropdown-divider"></div>
                                        <h6 class="dropdown-item">Username : <?= ucfirst($id_username); ?></h6>
                                        <h6 class="dropdown-item">Telp/HP : <?= ucfirst($id_telp); ?></h6>
                                        <h6 class="dropdown-item">Status : <?= ucfirst($id_status); ?></h6>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logout.php"><b>Log Out</b></a>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <?php 
                        include "config/pages.php";
                    ?>

                    <!-- <h1 class="mt-4">Simple Sidebar</h1>
                    <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
                    <p>
                        Make sure to keep all page content within the
                        <code>#page-content-wrapper</code>
                        . The top navbar is optional, and just for demonstration. Just create an element with the
                        <code>#sidebarToggle</code>
                        ID which will toggle the menu when clicked.
                    </p>
                </div> -->
                <!-- <div class="content-wrapper">
                </div> -->

            </div>
            <!-- ==================================== -->
            <div class="footer-basic">
                <footer>
                    <div class="social"><a href="https://www.instagram.com/kantahkabpolman/" target="_blank"><i class="icon ion-social-instagram"></i></a><a href="https://www.youtube.com/channel/UCe_q8Qux-qEfrx0GhAMsWzQ" target="_blank"><i class="icon ion-social-youtube"></i></a><a href="https://twitter.com/kantahkabpolman" target="_blank"><i class="icon ion-social-twitter"></i></a><a href="https://www.facebook.com/kantahkabpolman" target="_blank"><i class="icon ion-social-facebook"></i></a><a href="https://kab-polewalimandar.atrbpn.go.id/" target="_blank"><i class="icon ion-social-googleplus"></i></a></div>
                    <!-- <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">Home</a></li>
                        <li class="list-inline-item"><a href="#">Services</a></li>
                        <li class="list-inline-item"><a href="#">About</a></li>
                        <li class="list-inline-item"><a href="#">Terms</a></li>
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                    </ul> -->
                    <p class="copyright">Kantor Pertanahan Kabupaten Polewali Mandar © 2022</p>
                    <p class="developer">developed by : <a href="mailto:muslih.fauzi@atrbpn.go.id" target="_blank"><h9 class="nama">mos.on.the.fly</h9></a></p>

                </footer>
            </div>

        </div>


        
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

        <!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="assets/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="assets/plugins/raphael/raphael.min.js"></script>
<script src="assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="assets/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="assets/dist/js/pages/dashboard2.js"></script>
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> -->
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": false,
      "autoWidth": true,
    });
    $('#example').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
    });
  });
</script>


    </body>
</html>
