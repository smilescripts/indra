<ul class="breadcrumb">
	<li>You are here</li>
	<li><a href="?module=beranda" class="glyphicons dashboard"><i></i> Beranda</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li>Aspek Penilaian</li>
</ul>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
		dom: 'C<"clear">lfrtip',
        responsive: true
    } );
} );
</script>

<h1>Kelola Data Aspek Penilaian</h1>
<div class="innerLR">
	<div style="padding: 10px 10px 10px;">
		<a href="?module=tambah_aspek" class="btn btn-info"><i class="icon icon-plus-sign"></i> Tambah Data</a>
		</div>	
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
			<table id="example" class="table-primary">
				<thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Aspek</th>
                        <th>Jenis Beasiswa</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
				<?php
				//menampilkan data petugas
					$queryaspekpenilai=mysql_query("SELECT * FROM aspekpenilai ORDER BY IDASPEK DESC") or die (mysql_error());
				    while($objectdata=mysql_fetch_object($queryaspekpenilai)){
						$IDBEASISWA=$objectdata->IDBEASISWA;
						$tampilbsw=mysql_query("select NAMA_BEASISWA from jenisbeasiswa where IDBEASISWA='$IDBEASISWA'");
						$tampildp=mysql_fetch_array($tampilbsw);
						$beasiswa=$tampildp['NAMA_BEASISWA'];
						echo'
                            <tr>
								<td>'.$objectdata->IDASPEK.'</td>
								<td>'.$objectdata->NAMA_ASPEK.'</td>
								<td>'.$beasiswa.'</td>
								<td>'.$objectdata->STATUSFAKTOR.'</td>
								<td><center><a href="?module=ubah_aspek&actionedit='.$objectdata->IDASPEK.'" class="btn btn-info">Ubah</a> 
								<a href="?module=lihat_aspek&actionview='.$objectdata->IDASPEK.'" class="btn btn-info">Lihat</a> 
								</center></td>
							</tr>
						';
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
</div>
            