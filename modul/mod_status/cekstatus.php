<?php
	if(!isset($_SESSION['NIM'])){
		echo"<script>alert('Lakukan Login Terlebih Dahulu');window.location='index.php'</script>";
	}

 	$jointabel=mysql_query("SELECT mahasiswa.NIM, mahasiswa.IDPRODI, mahasiswa.NAMAMHS, 
			mahasiswa.JK, mahasiswa.ALAMATMHS, mahasiswa.EMAIL, mahasiswa.TELPONMHS, 
			mahasiswa.SEMESTER,mahasiswa.TAHUN_AJARAN,
			prodi.IDPRODI, prodi.NAMA_PRODI,
			pendaftaranmahasiswa.IDDAFTAR,
			pendaftaranmahasiswa.NIM,pendaftaranmahasiswa.TANGGAL,pendaftaranmahasiswa.FOTO,
			pendaftaranmahasiswa.STATUS_PROSES,pendaftaranmahasiswa.IDINFO,
			infobeasiswa.NAMA_BEASISWA AS NAMA, infobeasiswa.IDBEASISWA, jenisbeasiswa.NAMA_BEASISWA AS JENIS
			FROM mahasiswa
			INNER JOIN prodi ON prodi.IDPRODI = mahasiswa.IDPRODI
			INNER JOIN pendaftaranmahasiswa ON pendaftaranmahasiswa.NIM = mahasiswa.NIM
			INNER JOIN infobeasiswa ON infobeasiswa.IDINFO = pendaftaranmahasiswa.IDINFO
			INNER JOIN jenisbeasiswa ON jenisbeasiswa.IDBEASISWA = infobeasiswa.IDBEASISWA
			WHERE mahasiswa.NIM =  '$_SESSION[NIM]' ORDER BY pendaftaranmahasiswa.TANGGAL DESC LIMIT 1");
	$tampildata=mysql_fetch_array($jointabel);
?>

 <div class="mosaic-line mosaic-line-2">
	<div class="container-960 center">
		<h2 class="margin-none"><strong class="text-primary">Status Pendaftaran Beasiswa</strong></h2>
	</div>
</div>       		

<div class="container">
	<div class="innerT">
		<div class="widget widget-heading-simple widget-body-gray">
				<div class="widget-body">

					<h1>STATUS: 
					<?php 
						if($tampildata["STATUS_PROSES"]=="Belum Diproses"){echo "$tampildata[STATUS_PROSES]";}
						if($tampildata["STATUS_PROSES"]=="Sedang Diproses"){echo "$tampildata[STATUS_PROSES]";}
						if($tampildata["STATUS_PROSES"]=="Layak Mendapatkan Beasiswa"){echo "$tampildata[STATUS_PROSES]";}
						if($tampildata["STATUS_PROSES"]==""){
							$query=mysql_query("SELECT STATUS_PERSETUJUAN FROM penilaianmahasiswa WHERE IDDAFTAR=$tampildata[IDDAFTAR]");
							$tampil=mysql_fetch_array($query);
							echo "$tampil[STATUS_PERSETUJUAN]";
						}
					?>
					</h1>
					<br/>
					<table border="1" width="100%" class="footable table table-striped table-bordered table-white table-primary">
						<thead>
							<tr><th colspan="2"><center><img src="foto/mahasiswa/<?php echo $tampildata["IDINFO"].'/'; echo $tampildata["FOTO"];?>" width="150" height="200"></center></th></tr>
						</thead>
						<tbody>
							<tr>
								<td width="20%">No.urut pendaftaran</td>
								<td width="80%"><?php echo $tampildata["IDDAFTAR"];?></td>
							</tr>
							<tr>
								<td>Jenis Beasiswa</td>
								<td><?php echo $tampildata["JENIS"];?></td>
							</tr>
							<tr>
								<td>Nama Beasiswa</td>
								<td><?php echo $tampildata["NAMA"];?></td>
							</tr>
							<tr>
								<td>Tanggal Daftar</td>
								<td><?php echo $tampildata["TANGGAL"];?></td>
							</tr>
							<tr>
								<td>NIM</td>
								<td><?php echo $tampildata["NIM"];?></td>
							</tr>
							<tr>
								<td>Semester</td>
								<td><?php echo $tampildata["SEMESTER"];?></td>
							</tr>
							<tr>
								<td>Program studi</td>
								<td><?php echo $tampildata["NAMA_PRODI"];?></td>
							</tr>
							<tr>
								<td>Tahun Ajaran</td>
								<td><?php echo $tampildata["TAHUN_AJARAN"];?></td>
							</tr>
							<tr>
								<td>Telepon</td>
								<td><?php echo $tampildata["TELPONMHS"];?></td>
							</tr>
						<tbody>
					</table>
				</div>
			</div>
	</div>
</div>