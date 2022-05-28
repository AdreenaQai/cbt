<?php
ob_start();
session_start();

include "config/koneksi.php";
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $id = $_POST['id'];
    $pas = $_POST['pass'];
    $sql_login=mysqli_query($koneksi,"SELECT * FROM user WHERE username ='$id' AND pass = '$pas'");
    if(mysqli_num_rows($sql_login)>0){
        $_SESSION ["login"]=true;

        $row_akun = mysqli_fetch_array($sql_login);
        $_SESSION['username']=$row_akun['username'];
        $_SESSION['nama']=$row_akun['nama'];
        $_SESSION['telp']=$row_akun['telp'];
        $_SESSION['pass']=$row_akun['pass'];
        $_SESSION['status']=$row_akun['level_status'];

        header ("location:index.php?page=dash");
    }else{
        header ("location:login.php?gagal");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cek Berkas Ta' | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href='logo.png' rel='shortcut icon'>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="css/custom.css">

<style>
.orange {
color:orange;
}
.navy {
color:navy;
}
.teks_kecil {
font-size:14px;
}
.green {
color:green;
}


</style>


</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="assets/img/qr-code-scanner.png" style="vertical-align:middle" width="115"></br>
    <a href="#"><b class="navy">Cek</b><b class="orange"> <i>Berkas Ta'</i></b> </br>
    </a>
    
    
    
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <div class="row">
        <div class="col-2">
        </div>
        <div class="col-2" >
          <!-- <p class="login-box-msg">Kantor Pertanahan<br>Kabupaten Polewali Mandar</p> -->
          <img src="assets/img/bpn.png" style="kanan" width="50">
        </div>      
        <div class="col-8">
          <!-- <p class="login-box-msg">Kantor Pertanahan<br>Kabupaten Polewali Mandar</p> -->
          <h6 class="navy">Kantor Pertanahan</h6><h6 class="teks_kecil navy" >Kabupaten Polewali Mandar</h6><br>
        </div> 
        <!-- <div class="col-sm-2">
        </div> -->
      </div>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name ="id" class="form-control" placeholder="Masukkan Username" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name = "pass" class="form-control" placeholder="Masukkan Password" id="inputPassword" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          <input type="checkbox" id="show-password" onclick="myFunction()"> Tampilkan Password

          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-info btn-block">Masuk</button>
          </div>
          <!-- /.col -->
                    <?php if(isset($_GET['gagal'])) {?>
                        <tr>
                            <td>
                            <div>
                            <p>Maaf, Username/Password tidak cocok!</p>
                            </div>
                        </td>
                        </tr>
                    <?php }?>
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- atau -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in dengan Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in dengan Google+
        </a>
      </div>
      /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">Lupa password saya</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Daftar member baru</a>
      </p>
    </div> --> 
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- <script>
        $(document).ready(function() {
            $('#show-password').click(function() {
                if ($(this).is(':checked')) {
                    $('#inputPassword').attr('type', 'text');
                } else {
                    $('#inputPassword').attr('type', 'password');
                }
            });
        });
    </script> -->
    <script>
        function myFunction() {
            var x = document.getElementById("inputPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>


</body>
</html>
