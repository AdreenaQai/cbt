<style>
		/* The alert message box */
	.alert {
	padding: 20px;
	background-color: #f44336; /* Red */
	color: white;
	margin-bottom: 15px;
	}

	/* The close button */
	.closebtn {
		margin-left: 15px;
		color: white;
		font-weight: bold;
		float: right;
		font-size: 22px;
		line-height: 20px;
		cursor: pointer;
		transition: 0.3s;
	}

	/* When moving the mouse over the close button */
	.closebtn:hover {
	color: black;
	}
</style>
	<!-- Content -->
	<div style="padding: 0 15px;">
		

		<h3>Form Import Data</h3>
		<hr>

		<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
		<form method="post" action="" enctype="multipart/form-data">
			<a href="assets/data_berkas_cekberkasta.xlsx" class="btn btn-primary">
				<span class="glyphicon glyphicon-download"></span>
				Download Template
			</a>
			<br><br>
			<input type="file" name="file" class="pull-left">
			<button type="submit" name="preview" class="btn btn-success">
				<span class="glyphicon glyphicon-eye-open"></span> Preview
			</button>
		</form>

		<hr>

		<!-- Buat Preview Data -->
		<?php
		// Jika user telah mengklik tombol Preview
		if(isset($_POST['preview'])){	
			$nama_file_baru = 'data.xlsx';

			// Cek apakah terdapat file data.xlsx pada folder tmp
			if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
				unlink('tmp/'.$nama_file_baru); // Hapus file tersebut

			$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
			$tmp_file = $_FILES['file']['tmp_name'];

			// Cek apakah file yang diupload adalah file Excel >2007 (.xlsx)
			if($ext == "xlsx"){
				// Upload file yang dipilih ke folder tmp
				// dan rename file tersebut menjadi data{ip_address}.xlsx
				// {ip_address} diganti jadi ip address user yang ada di variabel $ip
				// Contoh nama file setelah di rename : data127.0.0.1.xlsx
				move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);

				// Load librari PHPExcel nya
				require_once 'assets/PHPExcel3/PHPExcel.php';

				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				// Buat sebuah tag form untuk proses import data ke database
				?>
				<form onsubmit="return validasi_input(this)" action="page/berkas/import.php" name="form_plan" id="form_plan" method="post"  enctype="multipart/form-data">
				<?php
				echo "<table class='table table-bordered table-striped'>
				<tr style='background-color:green;'>
				
					<th>No.Berkas</th>
					<th>Tahun Berkas</th>
					<th>Nama Kegiatan</th>
					<th>Pemohon</th>
					<th>Kecamatan</th>
					<th>Desa/Kelurahan</th>
					<th>No.DI302</th>
					<th>No.STP</th>

				</tr>";

				$numrow = 1;
				$kosong = 0;
				foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
					// Ambil data value yang telah di ambil dan dimasukkan ke variabel $get

					$id = $row['A']; 
					$thn = $row['B']; 
					$pro = $row['C']; 
					$usr = $row['D'];
					$kec = $row['E']; 
					$kel = $row['F']; 
					$di = $row['G']; 
					$stp = $row['H']; 

 

					
					
					// Cek jika semua data tidak diisi
					if($id == "" && $thn == "" && $pro == "" && $usr  == "" && $kec  == "" && $kel  == "" && $di  == "" && $stp  == "")
						continue;
					// Cek $numrow apakah lebih dari 1

					// Artinya karena baris pertama adalah nama-nama kolom
					// Jadi dilewat saja, tidak usah diimport
					$sum = '0';
					if($numrow > 1){

							$id_td =  ( ! empty($id))? "" : " style='background: #E07171;'";
							$thn_td =  ( ! empty($thn))? "" : " style='background: #E07171;'";
							$pro_td =  ( ! empty($pro))? "" : " style='background: #E07171;'";
							$usr_td =  ( ! empty($usr))? "" : " style='background: #E07171;'";
							$kec_td =  ( ! empty($kec))? "" : " style='background: #E07171;'";
							$kel_td =  ( ! empty($kel))? "" : " style='background: #E07171;'";
							$di_td =  ( ! empty($di))? "" : " style='background: #E07171;'";
							$stp_td =  ( ! empty($stp))? "" : " style='background: #E07171;'";


							

							// Jika salah satu data ada yang kosong
							if($id == "" or $thn == "" or $pro == "" or $usr == "" or $kec == "" or $kel == "" or $di == "" or $stp == "")

							{
								$kosong++; // Tambah 1 variabel $kosong
						}

						echo "<tr>";
							echo "<td".$id_id.">".$id."</td>";
							echo "<td".$thn_id.">".$thn."</td>";
							echo "<td".$pro_id.">".$pro."</td>";
							echo "<td".$usr_id.">".$usr."</td>";
							echo "<td".$kec_id.">".$kec."</td>";
							echo "<td".$kel_id.">".$kel."</td>";
							echo "<td".$di_id.">".$di."</td>";
							echo "<td".$stp_id.">".$stp."</td>";


							
						echo "</tr>";

					}
					$numrow++; // Tambah 1 setiap kali looping
			
				}

				?>
				</table>
			
				<?php

				// Cek apakah variabel kosong lebih dari 1
				// Jika lebih dari 1, berarti ada data yang masih kosong
				if($kosong > 1){
				?>
					<script>
					$(document).ready(function(){
						// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
						$("#jumlah_kosong").html('<?php echo $kosong; ?>');

						$("#kosong").show(); // Munculkan alert validasi kosong
					});
					</script>
				<?php
				}else{ // Jika semua data sudah diisi
					echo "<hr>";
				}
				?>

                <button type="submit" name='submit' id="submit" value="submit"  class="btn btn-primary"><span class='glyphicon glyphicon-upload'> Import</button>			
				<?php  
                echo "</form>";
			}else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
				// Munculkan pesan validasi
				echo "<div class='alert alert-danger'>
				Hanya File Excel 2007 (.xlsx) yang diperbolehkan
				</div>";
			}
		}
		?>

	</div>

