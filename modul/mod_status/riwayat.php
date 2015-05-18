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
			WHERE mahasiswa.NIM =  '$_SESSION[NIM]'");
?>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
		dom: 'C<"clear">lfrtip',
        responsive: true
    } );
} );
</script>

 <div class="mosaic-line mosaic-line-2">
	<div class="container-960 center">
		<h2 class="margin-none"><strong class="text-primary">Status Pendaftaran Beasiswa</strong></h2>
	</div>
</div>       		

<div class="container">
	<div class="innerT">
		<div class="widget widget-heading-simple widget-body-gray">
				<div class="widget-body">
					<table id="example" class="table-primary">
						<thead>
							<tr>
								<th>No.urut pendaftaran</th>
								<th>Jenis Beasiswa</th>
								<th>Nama Beasiswa</th>
								<th>Tanggal Daftar</th>
								<th>STATUS</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($objectdata=mysql_fetch_object($jointabel)){
							?>
							<tr>
								<td><?php echo $objectdata->IDDAFTAR;?></td>
								<td><?php echo $objectdata->JENIS;?></td>
								<td><?php echo $objectdata->NAMA;?></td>
								<td><?php echo $objectdata->TANGGAL;?></td>
								<td>
									<?php 
										echo $objectdata->STATUS_PROSES;
										if($objectdata->STATUS_PROSES==""){
											$query=mysql_query("SELECT STATUS_PERSETUJUAN FROM penilaianmahasiswa WHERE IDDAFTAR=$tampildata[IDDAFTAR]");
											$tampil=mysql_fetch_array($query);
											echo "$tampil[STATUS_PERSETUJUAN]";
										}
									?>
								</td>
							</tr>
								<?php } ?>
						<tbody>
					</table>
				</div>
			</div>
	</div>
</div>