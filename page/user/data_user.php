<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">

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
  background-color: darkgrey;
}
</style>

</head>
<body>


<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
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
              <!-- <div class="card-header" style="font-family:calibri light"> -->
              <div class="card-header">

                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-tambahuser">
                <i class = "fa fa-plus">  </i> Tambah User
                </button>
                
                <a href="index.php?page=import_data" class="btn btn-info" role="button">
                <!-- <button type="button" class="btn btn-info"> -->
                <i class="fa fa-edit"> </i> Import Data 
                <!-- </button> -->
                </a>
                
                <!-- <a href="page/user/print_user.php" class="btn btn-info" role="button">
                  <i class = "fa fa-file-pdf-o"></i> Export PDF
                </a> -->
                <a href="page/user/export.php" class="btn btn-info" role="button">
                <!-- <button type="button" class="btn btn-info" > -->
                  <i class = "fa fa-file-excel-o">  </i> Export Excel
                <!-- </button> -->
                </a>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabel" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>QR User</th>
                        <th>Nama </th>
                        <th>Telp</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th>Edit  |  Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 0;
                        $admin=mysqli_query($koneksi,"SELECT * FROM user");
                        while($m=mysqli_fetch_array($admin)){
                        $no++;  
                    ?>
                    <tr>
                        <td><?php echo $no ; ?></td>
                        <td>
                          <?php
                            $kode = $m['nama'].";".$m['telp'].";".$m['status'];
                            require_once('assets/qrcode/qrlib.php');
                            QRcode::png("$kode","kode".$no.".png","M", 2,2);
                          ?>
                          <img src="kode<?= $no ?>.png" alt="">
                        </td>
                        <td><?=$m['nama']; ?></td>
                        <td><?=$m['telp']; ?></td>
                        <td><?=$m['username']; ?></td>
                        <td><?=$m['pass']; ?></td>
                        <td><?=$m['level_status']; ?></td>
                        <td>
                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#edituser<?php echo $m['id_user'] ?>"><i class="fa fa-pencil"></i></a>

                              <!-- modal form edit user -->
                              <div class="modal fade" id="edituser<?= $m['id_user']?>">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit User</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form role="form" method="post" action="index.php?page=update_user">
                                        <div class="card-body">
                                          <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="hidden" name="id" value="<?php echo $m['id_user']; ?>">
                                            <input type="text" class="form-control" name="nama" value="<?php echo $m['nama']; ?>">
                                          </div>
                                          <div class="form-group">
                                            <label for="telp">Telp/HP</label>
                                            <!-- <input type="text" class="form-control" name="telp" placeholder="Masukkan no.HP"> -->
                                            <input type="text" class="form-control" name="telp" value="<?php echo $m['telp']; ?>">

                                          </div>
                                          <div class="form-group">
                                            <label for="username">Username</label>
                                            <!-- <input type="text" class="form-control" name="username" placeholder="Masukkan username"> -->
                                            <input type="text" class="form-control" name="username" value="<?php echo $m['username']; ?>" >

                                          </div>
                                          <div class="form-group">
                                            <label for="pass">Password</label>
                                            <!-- <input type="password" class="form-control" name="pass" placeholder="Masukkan password"> -->
                                            <input type="text" class="form-control" name="pass" value="<?php echo $m['pass']; ?>" >
                                            <!-- <input type="checkbox" onclick="myFunction()"> Lihat Password
                                            <script>
                                            function myFunction() {
                                              var x = document.getElementById("myPassword<?= $m['id_user'];?>");
                                              if (x.type === "password") {
                                                x.type = "text";
                                              } else {
                                                x.type = "password";
                                              }
                                            }
                                            </script> -->



                                          </div>
                                          <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="status" name="stat">
                                              <option selected> <?php echo $m['level_status']; ?></option>
                                              <option value="admin">admin</option>
                                              <option value="user">user</option>
                                              <option value="operator">operator</option>

                                            </select>
                                            <!-- <input type="text" class="form-control" name="status" placeholder="Masukkan status (admin / user)"> -->

                                          </div>
                                        
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


                        
                        <a href="index.php?page=delete_user&kode=<?= $m['id_user'];?>" onclick="return confirm('Yakin akan menghapus data?')">
                          <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </a>
                        </td>
                        
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


      <!-- modal form tambah user -->
      <div class="modal fade" id="modal-tambahuser">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="index.php?page=create_user">
                <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap">
                  </div>
                  <div class="form-group">
                    <label for="telp">Telp/HP</label>
                    <input type="text" class="form-control" name="telp" placeholder="Masukkan no.HP">
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Masukkan username">
                  </div>
                  <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Masukkan password">
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                      <option selected>..Pilih level status..</option>
                      <option value="admin">admin</option>
                      <option value="user">user</option>
                      <option value="operator">operator</option>


                    </select>
                    <!-- <input type="text" class="form-control" name="status" placeholder="Masukkan status (admin / user)"> -->

                  </div>
                
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








</body>
</html>