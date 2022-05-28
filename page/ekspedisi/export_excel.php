<?php
  global $mysqli;
    $host="localhost";
    $user="root";
    $pass="";
    $database="cekberkasta";
    $mysqli=new mysqli($host,$user,$pass,$database);
    if (mysqli_connect_errno()) {
    trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
  }

	
  // Load librari PHPExcel nya
  require_once '../..\assets\PHPExcel3\PHPExcel.php';

 // Panggil class PHPExcel nya
    $excel = new PHPExcel();

// Settingan awal fil excel
$excel->getProperties()->setCreator('muslih.fauzi@gmail.com')
					   ->setLastModifiedBy('muslih.fauzi@gmail.com')
					   ->setTitle("Data Ekspedisi Berkas")
					   ->setSubject("Berkas")
					   ->setDescription("Laporan Ekspedisi Berkas")
					   ->setKeywords("data berkas");
// styler
	$style_col = array(
		'font' => array('bold' => true), // Set font nya jadi bold
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		),
		'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		),
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array('rgb' => 'ffff00')
		)
    );

    $style_row = array(
		'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		),
		
	);
	
// end styler

// header
	$excel->setActiveSheetIndex(0)->setCellValue('A1', "No.");
	$excel->setActiveSheetIndex(0)->setCellValue('B1', "QR Code"); 
	$excel->setActiveSheetIndex(0)->setCellValue('C1', "No. Berkas"); 
	$excel->setActiveSheetIndex(0)->setCellValue('D1', "Tahun");
	$excel->setActiveSheetIndex(0)->setCellValue('E1', "Prosedur"); 
	$excel->setActiveSheetIndex(0)->setCellValue('F1', "Pemohon"); 
	$excel->setActiveSheetIndex(0)->setCellValue('G1', "Posisi Berkas"); 
	$excel->setActiveSheetIndex(0)->setCellValue('H1', "Foto");
	$excel->setActiveSheetIndex(0)->setCellValue('I1', "Keterangan"); 
	$excel->setActiveSheetIndex(0)->setCellValue('J1', "Log Waktu");
	$excel->setActiveSheetIndex(0)->setCellValue('K1', "Petugas");


 


	$excel->getActiveSheet()->getStyle('A1:K1')->applyFromArray($style_row);

	// Set height baris ke 1, 2 dan 3
	$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('6')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('7')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('8')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('9')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('10')->setRowHeight(20);
	$excel->getActiveSheet()->getRowDimension('11')->setRowHeight(20);




// end header

// body
	// Buat query untuk menampilkan semua data
	$sql = $mysqli->query("SELECT * FROM ekspedisi ORDER BY ID ASC");

	$no = 1; 
	$numrow = 2; 
	while($m = mysqli_fetch_array($sql)){ 
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		// $kode = $m['idBarcode'];
		// require_once('assets/qrcode/qrlib.php');
		// QRcode::png("$kode","kode".$no.".png","M", 2,2);

		// $img = printf("<img src=kode".$no.".png>");
		
		$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow,$m['idBarcode']);//QR code
		$ekstrak = explode(";",$m['idBarcode']);


		$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $ekstrak[0]);//no berkas
		$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $ekstrak[1]);//tahun berkas
		$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $ekstrak[2]);//prosedur
		$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $ekstrak[3]);//pemohon
		$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $m['tugas']);//posisi berkas

		// $foto = print("<img src='kodular/uploads/'".$m['foto'].">");
		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $m['foto']);//foto

		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $m['keterangan']);

		date_default_timezone_set('asia/makassar');
		// echo date('d-M-y h:i:s a',$m['log_waktu']); 
		$waktu = date('d-M-y G:i:s',$m['log_waktu']); 

		$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $waktu);//waktu
		$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $m['petugas']);


		
		// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);



	
		$no++; 
		$numrow++; 
	}

	// Set width kolom
	$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
	$excel->getActiveSheet()->getColumnDimension('B')->setWidth(50); // Set width kolom B
	$excel->getActiveSheet()->getColumnDimension('C')->setWidth(10); // Set width kolom C
	$excel->getActiveSheet()->getColumnDimension('D')->setWidth(10); // Set width kolom D
	$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
	$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom F
	$excel->getActiveSheet()->getColumnDimension('G')->setWidth(50); // Set width kolom G
	$excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom H
	$excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom I
	$excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom J
	$excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom K



// end body



// Set judul file excel page setup
	$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	$excel->getActiveSheet(0)->setTitle("data_berkas");
	$excel->setActiveSheetIndex(0);
// end judul

// Proses file excel
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="data ekspedisi cekberkasta.xlsx"'); // Set nama file excel nya
	header('Cache-Control: max-age=0');
// end proses file excel

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>
