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
	<li>Penilaian</li>
</ul>

<h1>Kelola Data Penilaian</h1>
<div class="innerLR">  
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
			<form action="" method="POST">
				<div class="row-fluid">
                    <div class="row-fluid">
						<label class="req">Nama Beasiswa</label>
						<?php
							$result = mysql_query("select * from infobeasiswa ORDER BY NAMA_BEASISWA");  
							echo '<select name="IDINFO" style="width: 30%;">';  
							echo '<option value="">Silahkan Pilih Nama Beasiswa</option>';  
							while ($row = mysql_fetch_array($result)) {  
								echo '<option value="' . $row['IDINFO'] . '">' . $row['NAMA_BEASISWA']. '</option>';  
							}  
							echo '</select>';
						?>
					</div>
                    <div style="margin-top:25px" >
                        <input type="submit" name="detail" class="btn btn-info" value="Lihat" >
                    </div>
                </div>
			</form>
        </div>
    </div>
<br>
<p class="separator text-center"><i class="icon-ellipsis-horizontal icon-3x"></i></p>
	<?php
	if($_POST["IDINFO"]!=""){
	if(isset($_POST['detail'])){
		$idinfo=$_POST["IDINFO"];
	?>
   <div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">  
			<table id="example" class="table-primary">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>STATUS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
					<?php
						//menampilkan data petugas
						$querypenilaian=mysql_query("SELECT pendaftaranmahasiswa.IDDAFTAR,pendaftaranmahasiswa.NIM, pendaftaranmahasiswa.STATUS_PROSES, mahasiswa.NAMAMHS
													FROM pendaftaranmahasiswa 
													INNER JOIN mahasiswa ON pendaftaranmahasiswa.NIM = mahasiswa.NIM 
													where pendaftaranmahasiswa.IDINFO=$idinfo AND pendaftaranmahasiswa.STATUS_PROSES='Belum Diproses'") or die (mysql_error());
						$no=1;
						while($objectdata=mysql_fetch_object($querypenilaian)){
						echo'
                            <tr>
								<td>'.$no.'</td>
								<td>'.$objectdata->NIM.'</td>
								<td>'.$objectdata->NAMAMHS.'</td>
								<td>'.$objectdata->STATUS_PROSES.'</td>
								<td><a href="?module=dpenilaian&actiondetil='.$objectdata->IDDAFTAR.'" class="btn btn-info">Detil</a> 
								</td>
							</tr>
						';
						$no++;
						}
					?>
                </tbody>
            </table>
        </div>
    </div>
	<?php }} ?>
</div>

           