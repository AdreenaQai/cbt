<?php
 global $mysqli;
 $host="localhost";
 $user="root";
 $pass="";
 $database="cekberkasta";
 $mysqli=new mysqli($host,$user,$pass,$database);
 if (mysqli_connect_errno()) {
   trigger_error('Koneksi ke database gagal: ' . mysqli_connect_error(), E_USER_ERROR); 
 }
?>
<style>
    table{
        border-collapse : collapse;
        table-layout:fixed;
        width :483px;

    }
    table td{
        width:25%;
    }
</style>
<html>
<body>
<!-- kop surat -->




<table border="1" cellpading="1">
    <tr>
        <td style="width:30%; align=center;">
            <img src="../../assets/img/bpn.png" width = "360" height="100">
        </td colspan="">
        <td style="width:90%;">
          <h2 style="text-align: center;">
          Laporan Ekspedisi Berkas PNBP
        </h2>
        <h4 style="text-align: center;">
        Kantor Pertanahan Kabupaten Polewali Mandar
        </h4>


        </td>
        <td style="align=center;width:35%;">
            <h5 style="text-align: center;">
            Jl. Tritura N0.10 Kel. Madatte, Kec. Polewali, Kab. Polewali Mandar 91315
            </h5>
        </td>
      </tr>
    </table>
    <br><br>
<!-- isi report -->
<table  border="1" cellpading="1">
<thead>
    <tr>
        <th>No.</th>
        <th>QR Code</th>
        <th>No. Berkas</th>
        <th>Tahun</th>
        <th>Nama Kegiatan</th>
        <th>Pemohon</th>
        <th>Posisi Berkas</th>
        <th>Foto</th>
        <th>Keterangan</th>
        <th>Log Waktu</th>
        <th>Petugas</th>


    </tr>
</thead>
<tbody>
    <?php
        $no = 0;
        $admin=$mysqli->query("SELECT * FROM ekspedisi");
        while($m=mysqli_fetch_array($admin)){
        $no++;  
    ?>
    <tr>
        <td><?=$no;?></td>
        <td>
            <?php
            $kode = $m["idBarcode"];
            require_once("../../assets/qrcode/qrlib.php");
            QRcode::png("$kode","kode".$no.".png","M", 2,2);
            $ekstrak = explode(";",$m["idBarcode"]);
            ?>
            <img src="kode<?=$no;?>.png">
        </td>
        <td><?=$ekstrak[0];?></td> 
        <td><?=$ekstrak[1];?></td> 
        <td><?=$ekstrak[2];?></td> 
        <td><?=$ekstrak[3];?></td> 
        <td><?=$m["tugas"];?></td>
        <td><img src=<?="../../kodular/uploads/".$m["foto"];?> width="50"></td> 
        <td><?=$m["keterangan"];?></td>
        <td>
        <?php 
            date_default_timezone_set("asia/makassar");
            echo date("d-M-y G:i:s",$m["log_waktu"]); 
        ?>
        </td>
        <td><?=$m["petugas"];?></td>
       
        
    </tr>
    <?php } ?>
</tbody>

</table>
</body>
</html>

<?php
    $html = ob_get_contents();
    ob_end_clean();
    

    // require_once('../../assets/html2pdf/html2pdf.class.php');
    require('../../vendor/spipu/html2pdf/src/Html2Pdf.php');

    $pdf = new Html2Pdf('P','A4','en');

    $pdf->writeHTML($html);
    $pdf->output('report_ekspedisi.pdf','D');
?>