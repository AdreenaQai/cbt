<?php
     date_default_timezone_set('asia/makassar');
     $no_berkas = $_POST['nomor_berkas'];
     $tahun_berkas = $_POST['thn_berkas'];
     $prosedur = $_POST['prosedur'];
     $nama_pemohon = $_POST['nama_pemohon'];
     $no_telp = $_POST['no_telp'];
     $nik = $_POST['nik_pemohon'];
     $nama_kecamatan = $_POST['nama_kecamatan'];
     $nama_desa = $_POST['nama_desa'];
     $no_DI302 = $_POST['no_DI302'];
     $no_STP = $_POST['no_STP'];
     $luas = $_POST['luas'];
     $tgl_DI302 = $_POST['tgl_DI302'];

    //===========================================
    $jam = substr($tgl_DI302,11,2);
    $menit = substr($tgl_DI302,14,2);
    $YY = substr($tgl_DI302,0,4);
    $MM = substr($tgl_DI302,5,2);
    $DD = substr($tgl_DI302,8,2);
    $tanggal_DI302 = mktime($jam,$menit,0,$MM,$DD,$YY);
    //==============================================


     

     if($prosedur=="Pelepasan Sebagian Hak" OR $prosedur=="Pemecahan Bidang" OR $prosedur=="Pemisahan Bidang" OR $prosedur=="Penggabungan Bidang")
     {
         //15 hari kerja = 21 hari kalender
         //1 hari = 86400 detik
         $jatuh_tempo = $tanggal_DI302+(21*86400);
     }
     if($prosedur=="Pendaftaran SK Hak")
     {
         //38 hari kerja = 53 hari kalender
         //1 hari = 86400 detik
         $jatuh_tempo = $tanggal_DI302+(53*86400);
     }
     if($prosedur=="Pendaftaran Tanah Pertama Kali Wakaf untuk Tanah Yang Belum Sertipikat (Tanah Negara)")
     {
         //57 hari kerja = 80 hari kalender
         //1 hari = 86400 detik
         $jatuh_tempo = $tanggal_DI302+(80*86400);
     }
     if($prosedur=="Pengembalian Batas")
     {
         //12 hari kerja = 17 hari kalender
         //1 hari = 86400 detik
         $jatuh_tempo = $tanggal_DI302+(17*86400);
     }
     if($prosedur=="Pengukuran dan Pemetaan Kadastral" OR $prosedur=="Pengukuran Ulang Dan Pemetaan Kadastral")
     {
         //18 hari kerja = 25 hari kalender
         //1 hari = 86400 detik
         $jatuh_tempo = $tanggal_DI302+(25*86400);
     }
     if($prosedur=="Sertipikat Pengganti Karena Blanko Lama" OR $prosedur=="Sertipikat Pengganti Karena Blanko Rusak")
     {
         //19 hari kerja = 26 hari kalender
         //1 hari = 86400 detik
         $jatuh_tempo = $tanggal_DI302+(26*86400);
     }
     if($prosedur=="Sertipikat Pengganti Karena Hilang")
     {
         //40 hari kerja = 56 hari kalender
         //1 hari = 86400 detik
         $jatuh_tempo = $tanggal_DI302+(56*86400);
     }
 
     $hari_sekarang = time();
    //  $sql_status=mysqli_query($koneksi,"SELECT DISTINCT * FROM ekspedisi WHERE no_berkas='$no_berkas'");

     $sql_status = mysqli_query($koneksi,"SELECT * FROM ekspedisi INNER JOIN tbl_berkas ON ekspedisi.no_berkas = tbl_berkas.no_berkas 
     WHERE ekspedisi.no_berkas='$no_berkas' ORDER BY ekspedisi.tugas DESC LIMIT 1 ");


     $stt=mysqli_fetch_array($sql_status);
     $status_berkas = $stt['tugas'];

     echo "<script>alert('$status_berkas')</script>";

 

     if($hari_sekarang >= $jatuh_tempo)
     {
       if($status_berkas == "(20) Kirim: Berkas ke loket (Pelaksana)")
       {
         $status_berkas = "Berkas Selesai";
       } else {    $status_berkas = "Proses Sudah Jatuh Tempo";}
     }
     if($hari_sekarang <= $jatuh_tempo)
     {
       if($status_berkas == "(20) Kirim: Berkas ke loket (Pelaksana)")
       {
         $status_berkas = "Berkas Selesai";
       } else {    $status_berkas = "Proses Belum Jatuh Tempo";}
     }
  
     echo "<script>alert('$status_berkas')</script>";


$query1 = "UPDATE tbl_pemohon SET nama_pemohon='$nama_pemohon',
                                no_telp='$no_telp',
                                NIK='$nik'
                                WHERE NIK='$nik'";


$query = "UPDATE tbl_berkas SET 
                                tahun_berkas='$tahun_berkas',
                                prosedur='$prosedur',
                                pemohon='$nama_pemohon',
                                kecamatan='$nama_kecamatan',
                                desa='$nama_desa',
                                no_DI302='$no_DI302',
                                tgl_DI302='$tanggal_DI302',
                                no_STP='$no_STP',
                                luas='$luas',
                                jatuh_tempo='$jatuh_tempo',
                                status_berkas='$status_berkas'
                                WHERE no_berkas='$no_berkas'";
// echo $query1;
// echo $query1;
// echo "<br>";
// echo $query;
// echo "<br>";

$hasil1 = mysqli_query($koneksi,$query1);
$hasil = mysqli_query($koneksi,$query);


// var_dump($hasil1);
// var_dump($hasil);
         
if(!$hasil AND !$hasil1){
echo mysqli_error($hasil1);
echo mysqli_error($hasil);

}
else{
echo "<script>alert('Data berhasil dirubah')</script>";
echo "<script type='text/javascript'> document.location = 'index.php?page=data_QR_berkas'; </script>";
}




?>