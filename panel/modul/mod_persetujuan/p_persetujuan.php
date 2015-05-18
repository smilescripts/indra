<?php
include_once "../../koneksi/config.php";

$userid = $_GET['userid'];
$chkYesNo = $_GET['chkYesNo'];
$iddaftar = $_GET['iddaftar'];
$sql = "UPDATE  `spk`.`penilaianmahasiswa` SET  `STATUS_PERSETUJUAN` =  '$chkYesNo' WHERE  `penilaianmahasiswa`.`IDPENILAIAN` ='$userid '";
mysql_query($sql) or die(mysql_error());
$ubahstatuspendaftar=mysql_query("UPDATE  `spk`.`pendaftaranmahasiswa` SET  `STATUS_PROSES` =  '$chkYesNo' WHERE
`pendaftaranmahasiswa`.`IDDAFTAR` ='$iddaftar'");			
$getmhs=mysql_fetch_object ( mysql_query("SELECT * FROM `pendaftaranmahasiswa` WHERE `IDDAFTAR` = '$iddaftar' ")); 
$nrpnya=$getmhs->NRP;

if($chkYesNo=="layak mendapatkan beasiswa"){
$cekhistorimhs=mysql_query("select sum(histori) from histori where nrp='$nrpnya'");
$getdatahistori=mysql_fetch_array($cekhistorimhs);
$datahistori=$getdatahistori[0];
$prosestambahhistori=$datahistori+1;
mysql_query("UPDATE  `spk`.`histori` SET  `histori` =  '$prosestambahhistori' WHERE  `histori`.`nrp` =  '$nrpnya'");
}/*
if($chkYesNo==""){
$cekhistorimhs=mysql_query("select sum(histori) from histori where nrp='$nrpnya'");
$getdatahistori=mysql_fetch_array($cekhistorimhs);
$datahistori=$getdatahistori[0];
$prosestambahhistori=$datahistori-1;
mysql_query("UPDATE  `spk`.`histori` SET  `histori` =  '$prosestambahhistori' WHERE  `histori`.`nrp` =  '$nrpnya'");
}*/
?>