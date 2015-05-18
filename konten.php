<?php
//session_start();
include_once("include/koneksi.php");
//error_reporting(0);
$module = $_GET['module'];
	
	if ($module == 'petunjuk'){
		include "modul/mod_petunjuk/petunjuk.php";
	}
	
	elseif ($module == 'beasiswa'){
		include "modul/mod_pendaftaran/beasiswa.php";
	}
	
	elseif ($module == 'lihat_bsw'){
		include "modul/mod_pendaftaran/view.php";
	}
	
	elseif ($module == 'pendaftaran'){
		include "modul/mod_pendaftaran/pendaftaran.php";
	}
	
	elseif ($module == 'status'){
		include "modul/mod_status/cekstatus.php";
	}
	
	elseif ($module == 'riwayat'){
		include "modul/mod_status/riwayat.php";
	}
	
	else {
		include "modul/mod_home/home.php";
	}
	
?>