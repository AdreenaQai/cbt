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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->

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
            <h1>Ekspedisi Berkas</h1>
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
              <div class="card-header" style="font-family:calibri">
                <!-- <a href="page/ekspedisi/export_pdf.php" class="btn btn-info" role="button">
                  <i class = "fa fa-file-pdf-o"></i> Export PDF
                </a> -->
                <a href="page/ekspedisi/export_excel.php" class="btn btn-info" role="button">
                  <i class = "fa fa-file-excel-o">  </i> Export Excel
                </a>

               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>QR Berkas</th>
                        <th>No Berkas</th>
                        <!-- <th>Tahun Berkas</th>
                        <th>Prosedur</th>
                        <th>Pemohon</th> -->
                        <th>Uraian Tugas</th>
                        <th>Foto</th>
                        <th>Keterangan</th>
                        <th>Log Waktu</th>
                        <th>Petugas</th>
                        <?php if($id_status=="admin"){ ?>
                        <th>Edit</th> <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 0;
                        $ekspedisi_berkas=mysqli_query($koneksi,"SELECT * FROM ekspedisi");
                        while($m=mysqli_fetch_array($ekspedisi_berkas)){
                        $no++;  
                        // $no_berkas = explode(";",$m['idBarcode']);
                        // $id_berkas = $m['ID'];
                        // echo $ekstrak_QR[0];
                        // $sql_no_berkas = "UPDATE ekspedisi SET no_berkas='$no_berkas[0]' WHERE ID='$id_berkas'" ;
                        // mysqli_query($koneksi,$sql_no_berkas);

                    ?>
                    <tr>
                        <td><?php echo $no ; ?></td>
                        <td>
                          <?php
                            $kode = $m['idBarcode'];
                            require_once('assets/qrcode/qrlib.php');
                            QRcode::png("$kode","page/ekspedisi/kode".$no.".png","M", 2,2);
                          ?>
                          <a href="page/ekspedisi/kode<?= $no ?>.png"><img src="page/ekspedisi/kode<?= $no ?>.png" alt=""></a>
                        </td>
                        </td>
                        <td><?= $m['no_berkas']; ?></td>
                        <!-- <td><?php echo $ekstrak_QR[2]; ?></td>
                        <td><?php echo $ekstrak_QR[3]; ?></td> -->

                        <td><?php echo $m['tugas']; ?></td>
                        <?php if($m['foto']!=""){ ?>
                        <td><a href="<?="kodular/".$m['foto']; ?>"><img src = <?php echo "kodular/".$m['foto']; ?> width="50"></a></td>
                        <?php } else{echo "<td></td>";}?>
                        <td><?php echo $m['keterangan']; ?></td>
                        <td>
                          <?php 
                          date_default_timezone_set('asia/makassar');
                          // echo date('d-M-y h:i:s a',$m['log_waktu']); 
                          echo date('d-M-y G:i:s',$m['log_waktu']); 
                          ?>
                        </td>
                        <td><?php echo $m['petugas']; ?></td>
                        
                        <?php if($id_status=="admin"){ ?>
                        <td>
                        <a href="index.php?page=edit_ekspedisi&kode_id=<?php echo $m['log_waktu'];?>">
                          <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                        </a>
                        <!-- <a href="index.php?page=delete_ekspedisi&kode=<?php echo $m['username'];?>" onclick="return confirm('Yakin akan menghapus data?')">
                          <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </a> -->
                        </td>
                        <?php } ?>
                        
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
      <!-- modal form tambah data -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Ekspedisi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="index.php?page=create_berkas">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nomorberkas">Nomor Berkas</label>
                    <input type="text" class="form-control" name="no_berkas" placeholder="Masukkan nomor berkas">
                  </div>
                  <div class="form-group">
                    <label for="tahunberkas">Tahun Berkas</label>
                    <input type="text" class="form-control" name="thn_berkas" placeholder="Masukkan tahun berkas">
                  </div>
                  <div class="form-group">
                      <label for="prosedur">Prosedur</label>
                      <select class="custom-select" id="prosedur" name="prosedur">
                        <option selected>-- Pilih Kegiatan --</option>
                        <?php
                                $result=mysqli_query($koneksi,"SELECT * FROM tbl_prosedur");
                                while($p=mysqli_fetch_array($result)){
                        ?>
                        <option value="<?=$p['prosedur']; ?>"><?=$p['prosedur']; ?></option>

                        <?php } ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="namapemohon">Nama Pemohon</label>
                    <input type="text" class="form-control" name="nama_pemohon" placeholder="Masukkan nama pemohon">
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