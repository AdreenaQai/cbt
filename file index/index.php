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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Cek Berkas Ta'</title>

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
  <link href='logo.png' rel='shortcut icon'>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">
  <!-- coba toggle menu -->
  <!-- <link href="assets/toggle/css/styles.css" rel="stylesheet" /> -->





</head>

<style>
  .footer-basic {
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
  padding-left:150px;
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
  padding-left:150px;

}
.footer-basic .developer {
  margin-top:5px;
  text-align:center;
  font-size:12px;
  color:orange;
  margin-bottom:0;
  padding-left:150px;
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



<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">


<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#sidebarToggle" role="button" id="sidebarToggle"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?page=dash" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="logout.php" class="nav-link">Logout</a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item"> -->
            <!-- Message Start -->
            <!-- <div class="media">
              <img src="assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> -->
            <!-- Message End -->
          <!-- </a> -->
          
          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item"> -->
            <!-- Message Start -->
            <!-- <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> -->
            <!-- Message End -->
          <!-- </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item"> -->
            <!-- Message Start -->
            <!-- <div class="media">
              <img src="assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> -->
            <!-- Message End -->
          <!-- </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->
      <!-- Notifications Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
      <!-- profil foto dan nama -->
      
      <li>
          <img src="assets/foto_user/<?=$id_username?>.jpg" class="img-circle elevation-2" alt="User Image" width="35" height="35">
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link"><?= ucwords($id_nama); ?></a>
      </li>
      <li>          
        <a href="#" class="nav-link" ><?= ucfirst($id_status); ?></a>
      </li>

      
        

      
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php?page=dash" class="brand-link">
      <img src="assets/img/logo.png" alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><strong>Cek Berkas Ta'</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <span>
        <img src="assets/img/bpn.png"  alt="" >
        &nbsp  &nbsp  &nbsp
        </span>
        <li class="nav-item d-none d-sm-inline-block">
        <span class="brand-text font-weight-light" style="color:white"><strong>Kantor Pertanahan <br>Kab. Polewali Mandar</strong></span>

        <!-- <div class="info">
            <!<span class="brand-text font-weight-light" style="color:white"><strong>Kantor Pertanahan <br>Kab. Polewali Mandar</strong></span> -->
          <!-- <p style="color:white">Kantor Pertanahan </br>Kab. Polewali Mandar</p> -->
        <!-- </div> -->
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         

          <li class="nav-item">
            <a href="index.php?page=dash" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
                <!-- <i class="fas fa-angle-left right"></i> -->
                <!-- <span class="badge badge-info right"></span> -->
              </p>
            </a>
          </li>
     
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-archive"></i>
              <p>
                Berkas PNBP
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=data_QR_berkas" class="nav-link">
                  <i class="far fa-minus nav-icon"></i>
                  <p>Data Berkas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=data_ekspedisi" class="nav-link">
                  <i class="far fa-minus nav-icon"></i>
                  <p>Ekspedisi Berkas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Query
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=query_berkas" class="nav-link">
                  <i class="far fa-minus nav-icon"></i>
                  <p>Query Berkas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=informasi_berkas" class="nav-link">
                  <i class="far fa-minus nav-icon"></i>
                  <p>Informasi Berkas</p>
                </a>
              </li>

             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Info Layanan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=info" class="nav-link">
                  <i class="far fa-minus nav-icon"></i>
                  <p>Jenis Layanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=info_hitung" class="nav-link">
                  <i class="far fa-minus nav-icon"></i>
                  <p>Simulasi Hitung Biaya</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=info_peraturan" class="nav-link">
                  <i class="far fa-minus nav-icon"></i>
                  <p>Info Peraturan</p>
                </a>
              </li>


            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-question-circle"></i>
              <p>
                Panduan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=panduan" class="nav-link">
                  <i class="far fa-minus nav-icon"></i>
                  <p>Panduan Aplikasi</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=about" class="nav-link">
                  <i class="far fa-minus nav-icon"></i>
                  <p>About Us</p>
                </a>
              </li>
            </ul>

          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            </a>
          </li>

        <?php if($id_status=="admin"){ ?>
          <li class="nav-item">
            <a href="index.php?page=data_user " class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Administrator
                <!-- <i class="fas fa-angle-left right"></i> -->
                <!-- <span class="badge badge-info right"></span> -->
              </p>
            </a>
          </li>
        <?php } ?>



  


         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
        <?php 
            include "config/pages.php";
        ?>
   
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer> -->

    <div class="footer-basic">
        <footer>
            <div class="social"><a href="https://www.instagram.com/kantahkabpolman/"><i class="icon ion-social-instagram"></i></a><a href="https://www.youtube.com/channel/UCe_q8Qux-qEfrx0GhAMsWzQ"><i class="icon ion-social-youtube"></i></a><a href="https://twitter.com/kantahkabpolman"><i class="icon ion-social-twitter"></i></a><a href="https://www.facebook.com/kantahkabpolman"><i class="icon ion-social-facebook"></i></a><a href="mailto:kab-polewalimandar@atrbpn.go.id"><i class="icon ion-social-googleplus"></i></a></div>
            <!-- <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href="#">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul> -->
            <p class="copyright">Kantor Pertanahan Kabupaten Polewali Mandar © 2022</p>
            <p class="developer">Developed by : <a href="mailto:muslih.fauzi@atrbpn.go.id"><h9 class="nama">mos.on.the.fly</h9></a></p>

        </footer>
    </div>



<!-- </div> -->
<!-- ./wrapper -->

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
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
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
    $('#example2').DataTable({
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
<!-- footer script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
<!-- coba toggle menu -->
<script src="assets/toggle/js/scripts.js"></script>




<script type="text/javascript">

window.addEventListener('DOMContentLoaded', event => {

// Toggle the side navigation
const sidebarToggle = document.body.querySelector('#sidebarToggle');
if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener('click', event => {
        event.preventDefault();
        // document.body.classList.toggle('sb-sidenav-toggled');
        document.body.classList.toggle('sidebar');

        localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sidebar'));
    });
}

});
</script>





</body>
</html>
