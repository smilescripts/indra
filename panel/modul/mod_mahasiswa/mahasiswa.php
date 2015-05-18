<?php 

	if($_GET['actiondelete']){

		$hapusmhs="DELETE FROM `mahasiswa` WHERE `NIM` = '$_GET[actiondelete]' ";
		$hapussemester="DELETE FROM `semester` WHERE `NIM` = '$_GET[actiondelete]' ";
		mysql_query($hapussemester);
		mysql_query($hapusmhs);
		echo "<script>alert('Sukses');window.location='?module=mahasiswa'</script>";
	}
	include "fungsi/class_paging.php";
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
	<li>Mahasiswa</li>
</ul>

<h1>Kelola Data Mahasiswa</h1>
<div class="innerLR">
	<div style="padding: 10px 10px 10px;">
		<a href="?module=tambah_mhs" class="btn btn-info"><i class="icon icon-plus-sign"></i> Tambah Data</a> | 
		<a href="?module=import_mhs" class="btn btn-danger"><i class="icon icon-download-alt" ></i> Import Data</a> | (Impor Data Berformat .xls)
	</div>	   
   <div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
			<table id="example" class="table-primary">
                <thead>
                    <tr>
						<th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Telepon</th>
						<th>Semester</th>
						<th>Prodi</th>
						<th>Tahun Ajaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
					<?php
						$querymahasiswa=mysql_query("SELECT * FROM mahasiswa") or die (mysql_error());
						$no = 1;
						while($objectdata=mysql_fetch_object($querymahasiswa)){
							echo'
                                <tr>
								   <td>'.$no.'</td>
								   <td>'.$objectdata->NIM.'</td>
								   <td>'.$objectdata->NAMAMHS.'</td>
								   <td>'.$objectdata->JK.'</td>
								   <td>'.$objectdata->ALAMATMHS.'</td>
								   <td>'.$objectdata->EMAIL.'</td>
								   <td>'.$objectdata->TELPONMHS.'</td>
								   <td>'.$objectdata->SEMESTER.'</td>
								';
							$IDPRODI=$objectdata->IDPRODI;
								   
							$tampilprodi=mysql_query("select NAMA_PRODI from prodi where IDPRODI='$IDPRODI'");
							$tampildp=mysql_fetch_array($tampilprodi);
							$prodi=$tampildp['NAMA_PRODI'];
								   
							echo '<td>'.$prodi.'</td>
								<td>'.$objectdata->TAHUN_AJARAN.'</td>' ;
								   
							echo'
								<td><a href="?module=ubah_mhs&actionedit='.$objectdata->NIM.'" class="btn btn-info">Ubah</a> | 
								<a href="?module=mahasiswa&actiondelete='.$objectdata->NIM.'" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data ini?\');" class="btn btn-danger">Hapus</a></td>
								</tr>
							';
							$no++;
						}
								  
					?>
                </tbody>
            </table>
			<div class="ribbon-wrapper"><div class="ribbon primary">Mahasiswa</div></div>
        </div>
    </div>
</div>