<?php
  global $mysqli;
  date_default_timezone_set('asia/makassar');
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
					   ->setTitle("Data Berkas PNBP")
					   ->setSubject("Berkas")
					   ->setDescription("Laporan Data Berkas")
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
	$excel->setActiveSheetIndex(0)->setCellValue('A1', "NO"); 
	$excel->setActiveSheetIndex(0)->setCellValue('B1', "NO BERKAS"); 
	$excel->setActiveSheetIndex(0)->setCellValue('C1', "TAHUN BERKAS");
	$excel->setActiveSheetIndex(0)->setCellValue('D1', "NAMA KEGIATAN"); 
	$excel->setActiveSheetIndex(0)->setCellValue('E1', "PEMOHON"); 
	$excel->setActiveSheetIndex(0)->setCellValue('F1', "LUAS (M2)"); 
	$excel->setActiveSheetIndex(0)->setCellValue('G1', "KECAMATAN");
	$excel->setActiveSheetIndex(0)->setCellValue('H1', "DESA/KELURAHAN"); 
	$excel->setActiveSheetIndex(0)->setCellValue('I1', "NO DI302"); 
	$excel->setActiveSheetIndex(0)->setCellValue('J1', "TANGGAL DI302");
	$excel->setActiveSheetIndex(0)->setCellValue('K1', "JATUH TEMPO"); 
	$excel->setActiveSheetIndex(0)->setCellValue('L1', "STATUS BERKAS"); 


	$excel->getActiveSheet()->getStyle('A1:L1')->applyFromArray($style_row);

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
	$excel->getActiveSheet()->getRowDimension('12')->setRowHeight(20);

// end header

// body
	// Buat query untuk menampilkan semua data
	$sql = $mysqli->query("SELECT * FROM tbl_berkas ORDER BY no_berkas ASC");

	$no = 1; 
	$numrow = 2; 
	while($m = mysqli_fetch_array($sql)){ 
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $m['no_berkas']);
		$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $m['tahun_berkas']);
		$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $m['prosedur']);
		$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $m['pemohon']);
		$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $m['luas']);
		$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $m['kecamatan']);
		$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $m['desa']);
		$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $m['no_DI302']);
		$tgl_DI302 = date('d-M-y G:i:s',$m['tgl_DI302']);
		$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $tgl_DI302);
		$jatuh_tempo = date('d-M-y G:i:s',$m['jatuh_tempo']);
		$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $jatuh_tempo);
		$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $m['status_berkas']);
		
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
		$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);

	
		$no++; 
		$numrow++; 
	}

	// Set width kolom
	$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom no A
	$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom sub B
	$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom sub C
	$excel->getActiveSheet()->getColumnDimension('D')->setWidth(50); // Set width kolom category D
	$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom sub E
	$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom sub F
	$excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom category G
	$excel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // Set width kolom sub H
	$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom category I
	$excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom category G
	$excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom sub H
	$excel->getActiveSheet()->getColumnDimension('L')->setWidth(30); // Set width kolom category I

// end body



// Set judul file excel page setup
	$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	$excel->getActiveSheet(0)->setTitle("data_berkas");
	$excel->setActiveSheetIndex(0);
// end judul

// Proses file excel
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="data berkas cekberkasta.xlsx"'); // Set nama file excel nya
	header('Cache-Control: max-age=0');
// end proses file excel

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>
