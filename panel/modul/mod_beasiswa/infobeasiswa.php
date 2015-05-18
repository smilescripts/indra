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
	<li>Beasiswa</li>
</ul>

<h1>Info Beasiswa</h1>
<div class="innerLR">
	<div style="padding: 10px 10px 10px;">
		<a href="?module=tambah" class="btn btn-info"><i class="icon icon-plus-sign"></i> Tambah Data</a>
		<!--<a href="?module=import_mhs" class="btn btn-danger"><i class="icon icon-download-alt" ></i> Import Data</a> | (Impor Data Berformat .xls)-->
	</div>
    <div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
			<table  id="example" class="table table-striped table-bordered table-condensed table-primary">
                <thead>
                    <tr>
						<th>No</th>
                        <th>Jenis Beasiswa</th>
                        <th>Nama Beasiswa</th>
                        <th>Kuota</th>
                        <!--<th>Deskripsi Info</th>-->
                        <th>Tanggal Awal</th>
                        <th>Tanggal Akhir</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
					<?php
						//menampilkan data mahasiswa
						$queryinfo=mysql_query("SELECT * FROM infobeasiswa") or die (mysql_error());
						$no=1;				
					    while($objectdata=mysql_fetch_object($queryinfo)){
							echo'
                                <tr>
									<td>'.$no.'</td>';
									
							$IDBEASISWA=$objectdata->IDBEASISWA;
								   
							$queryjenis=mysql_query("select NAMA_BEASISWA from jenisbeasiswa where IDBEASISWA='$IDBEASISWA'");
							$tampiljenis=mysql_fetch_array($queryjenis);
							$jenis=$tampiljenis['NAMA_BEASISWA'];
							
							echo'
									<td>'.$jenis.'</td>
									<td>'.$objectdata->NAMA_BEASISWA.'</td>
									<td>'.$objectdata->KUOTA.'</td>
									
								    <td>'.$objectdata->TANGGAL_AWAL.'</td>
								    <td>'.$objectdata->TANGGAL_AKHIR.'</td>
								    <td>'.$objectdata->STATUS.'</td>
								  
								    <td><a href="?module=ubah&actionedit='.$objectdata->IDINFO.'" class="btn btn-info">Ubah</a> | 
										<a href="?module=view&actionview='.$objectdata->IDINFO.'" class="btn btn-danger">View</a>
								</tr>';
							$no++;
						}
					?>
                </tbody>
            </table>
			<div class="ribbon-wrapper"><div class="ribbon primary">Beasiswa</div></div>
        </div>
    </div>
</div>