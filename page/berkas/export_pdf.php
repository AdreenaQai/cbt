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
        width:10%;
    }
</style>
<html>
<body>
<!-- kop surat -->
<table border="1" cellpading="1">
    <tr>
        <td style="width:30%; align=center;">
            <img src="../../assets/img/bpn.png" width = "360" height="100" alt="">
        </td colspan="">
        <td style="width:90%;">
          <h2 style="text-align: center;">
          Laporan Data Berkas PNBP
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
        <th>No Berkas</th>
        <th>Tahun</th>
        <th>Nama Kegiatan</th>
        <th>Nama Pemohon</th>
        <th>Kecamatan</th>
        <th>Desa/ Kelurahan</th>
        <th>No.DI302</th>
        <th>No.STP</th>


    </tr>
</thead>
<tbody>
    <?php
        $no = 0;
        $admin=$mysqli->query("SELECT * FROM tbl_berkas");
        while($m=mysqli_fetch_array($admin)){
        $no++;  
    ?>
    <tr>
        <td><?php echo $no ; ?></td>
        <td><?php echo $m['no_berkas']; ?></td>
        <td><?php echo $m['tahun_berkas']; ?></td>
        <td><?php echo $m['prosedur']; ?></td>
        <td><?php echo $m['pemohon']; ?></td>
        <td style="width:20%"><?php echo $m['kecamatan']; ?></td>
        <td><?php echo $m['desa']; ?></td> 
        <td><?php echo $m['no_DI302']; ?></td>
        <td style="width:15%"><?php echo $m['no_STP']; ?></td>        
       
        
    </tr>
    <?php } ?>
</tbody>

</table>
</body>
</html>

<?php
    $html = ob_get_contents();
    ob_end_clean();
    
    require_once('../../assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('report_berkas.pdf','D');
?>