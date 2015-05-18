<?php
include_once("include/koneksi.php");
	$queryinfo1=mysql_query("select * from  infobeasiswa"); 
$execinfo=mysql_fetch_object($queryinfo1);
//echo '<script>alert("'.$execinfo["infobeasiswa"].' '.$execinfo["TANGGAL_AWAL"].' sampai '.$execinfo["TANGGAL_AKHIR"].' ");window.location="cekstatus.php"</script>';
echo"<script>alert('$execinfo->TANGGAL_AKHIR');window.location='cekstatus.php'</script>";
?>