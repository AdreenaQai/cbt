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
        width:15%;
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
          Laporan Data User
        </h2>
        <h4 style="text-align: center;">
        Kantor Pertanahan Kabupaten Polewali Mandar
        </h4>

        <!-- <h5 style="text-align: center;">
          Kantor Pertanahan Kabupaten Polewali Mandar
        </h5> -->

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
        <th>ID User</th>
        <th>Nama User</th>
        <th>Telp/HP</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level Status</th>

    </tr>
</thead>
<tbody>
    <?php
        $no = 0;
        $admin=$mysqli->query("SELECT * FROM user");
        while($m=mysqli_fetch_array($admin)){
        $no++;  
    ?>
    <tr>
        <td style="width:5%;"><?php echo $no ; ?></td>
        <td style="width:20%;"><?php echo $m['id_user']; ?></td>
        <td style="width:30%;"><?php echo $m['nama']; ?></td>
        <td style="width:25%;"><?php echo $m['telp']; ?></td>
        <td style="width:30%;"><?php echo $m['username']; ?></td>
        <td style="width:25%;"><?php echo $m['pass']; ?></td>
        <td style="width:20%;"><?php echo $m['level_status']; ?></td>        
        
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
    $pdf->Output('report_user.pdf','D');
?>