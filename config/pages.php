<?php
	error_reporting( error_reporting() & ~E_NOTICE );
	include "config/koneksi.php";

if ($_GET['page']=="data_user") {
    include "page/user/data_user.php";
}
if ($_GET['page']=="create_user") {
    include "page/user/create_user.php";
}
if ($_GET['page']=="edit_user") {
    include "page/user/edit_user.php";
}
if ($_GET['page']=="update_user") {
    include "page/user/update_user.php";
}
if ($_GET['page']=="delete_user") {
    include "page/user/delete_user.php";
}
if ($_GET['page']=="import_data") {
    include "page/user/import_data.php";
}
if ($_GET['page']=="dash") {
    include "dash.php";
}

if ($_GET['page']=="data_ekspedisi") {
        include "page/ekspedisi/data_ekspedisi.php";
}

if ($_GET['page']=="informasi_berkas") {
    include "page/query/informasi_berkas.php";
}
if ($_GET['page']=="query_berkas") {
    include "page/query/query.php";
}

if ($_GET['page']=="info") {
    include "page/info/jenis_prosedur.php";
}
if ($_GET['page']=="info_hitung") {
    include "page/info/info_hitung.php";
}
if ($_GET['page']=="panduan") {
    include "page/panduan/panduan.php";
}
if ($_GET['page']=="data_QR_berkas") {
    include "page/berkas/data_QR_berkas.php";
}
if ($_GET['page']=="create_berkas") {
    include "page/berkas/create_berkas.php";
}
if ($_GET['page']=="edit_berkas") {
    include "page/berkas/edit_berkas.php";
}
if ($_GET['page']=="update_berkas") {
    include "page/berkas/update_berkas.php";
}
if ($_GET['page']=="delete_berkas") {
    include "page/berkas/delete_berkas.php";
}
if ($_GET['page']=="edit_ekspedisi") {
    include "page/ekspedisi/edit_ekspedisi.php";
}
if ($_GET['page']=="update_ekspedisi") {
    include "page/ekspedisi/update_ekspedisi.php";
}
if ($_GET['page']=="import_data_berkas") {
    include "page/berkas/import_data_berkas.php";
}
if ($_GET['page']=="") {
    include "dash.php";
}

if ($_GET['page']=="info_peraturan") {
    include "page/info/peraturan.htm";
}

if ($_GET['page']=="about") {
    include "page/panduan/about.php";
}
