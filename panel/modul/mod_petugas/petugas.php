<?php 

	if($_GET['actiondelete']){

		mysql_query("DELETE FROM `petugas` WHERE `IDPETUGAS` = '$_GET[actiondelete]' ") ; 
		echo "<script>alert('Sukses');window.location='?module=petugas'</script>";
	}

?>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
		dom: 'C<"clear">lfrtip',
        responsive: true
    } );
} );
</script>

<ul class="breadcrumb">
	<li>You are here</li>
	<li><a href="?module=beranda" class="glyphicons dashboard"><i></i> Beranda</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li>Petugas</li>
</ul>

<h1>Kelola Data Petugas</h1>
<div class="innerLR">
	<div style="padding: 10px 10px 10px;">
				<a href="?module=tambah_petugas" class="btn btn-info"><i class="icon icon-plus-sign"></i> Tambah Data</a> | 
				<a href="?module=import_petugas" class="btn btn-danger"><i class="icon icon-download-alt"></i> Import Data</a> | (Impor Data Berformat .xls)
	</div>
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
			<table id="example" class="table-primary">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Email</th>
						<th>Telepon</th>
						<th>Password</th>
						<th>Aksi</th>
					 </tr>
				</thead>
				<tbody>
					<?php
						$querypetugas=mysql_query("SELECT * FROM petugas") or die (mysql_error());
						$no = 1;
						while($objectdata=mysql_fetch_object($querypetugas)){
							echo'
								<tr>
									<td>'.$no.'</td>
									<td>'.$objectdata->NAMAPETUGAS.'</td>
									<td>'.$objectdata->JKPETUGAS.'</td>
									<td>'.$objectdata->ALAMATPETUGAS.'</td>
									<td>'.$objectdata->EMAILPETUGAS.'</td>
									<td>'.$objectdata->TELPONPETUGAS.'</td>
									<td>'.$objectdata->PASSWORDPETUGAS.'</td>
									<td><a href="?module=ubah_petugas&actionedit='.$objectdata->IDPETUGAS.'" class="btn btn-info"> Ubah</a> | 
									<a href="?module=petugas&actiondelete='.$objectdata->IDPETUGAS.'" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data ini?\');" class="btn btn-danger"> Hapus</a></td>
								</tr>';
								$no++;
						}
					?>
				</tbody>
			</table>
			<div class="ribbon-wrapper"><div class="ribbon primary">Petugas</div></div>
		</div>
	</div>
</div>

           