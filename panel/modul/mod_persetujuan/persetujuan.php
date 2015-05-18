<script>
$(document).ready(function() {
    $('#example').DataTable( {
		dom: 'C<"clear">lfrtip',
        responsive: true
    } );
} );
</script>

<script type="text/javascript">
function chkit(uid,iddaftar, chk) {    
chk = (chk==true ? "layak mendapatkan beasiswa" : "");   var url = "modul/mod_persetujuan/p_persetujuan.php?userid="+uid+"&chkYesNo="+chk+"&iddaftar="+iddaftar; 
  if(window.XMLHttpRequest)
 {         
  req = new XMLHttpRequest();
 }
 else if(window.ActiveXObject) 
 {     
   req = new ActiveXObject("Microsoft.XMLHTTP");
 }  
 // Use get instead of post.  
 req.open("GET", url, true);   req.send(null);}
 </script>

<ul class="breadcrumb">
	<li>You are here</li>
	<li><a href="?module=beranda" class="glyphicons dashboard"><i></i> Beranda</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li>Persetujuan</li>
</ul>

<h1>Kelola Data Persetujuan</h1>
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
                        <th>Nama</th>
                        <th>Histori</th>
                        <th>Tanggal Penilaian</th>
                        <th>Hasil</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
					<?php
						//menampilkan data petugas
						$querypersetujuan=mysql_query("
						SELECT penilaianmahasiswa.IDPENILAIAN, penilaianmahasiswa.IDDAFTAR, penilaianmahasiswa.STATUS_PERSETUJUAN, 
						penilaianmahasiswa.TANGGAL_PENILAIAN, penilaianmahasiswa.HASIL_PENILAIAN, 

						pendaftaranmahasiswa.IDDAFTAR, pendaftaranmahasiswa.NIM, pendaftaranmahasiswa.TANGGAL, pendaftaranmahasiswa.FOTO,
						pendaftaranmahasiswa.STATUS_PROSES FROM penilaianmahasiswa
						INNER JOIN pendaftaranmahasiswa ON pendaftaranmahasiswa.IDDAFTAR = penilaianmahasiswa.IDDAFTAR
	
						WHERE pendaftaranmahasiswa.IDINFO=$idinfo AND penilaianmahasiswa.STATUS_PERSETUJUAN='' ORDER BY penilaianmahasiswa.HASIL_PENILAIAN DESC") or die (mysql_error());
						$no=0;			
					    while($objectdata=mysql_fetch_object($querypersetujuan)){
							$no++;
						echo'
                            <tr>
							    <td>'.$no.'</td>
								<td>';
								$getmhs=mysql_fetch_object ( mysql_query("SELECT * FROM `pendaftaranmahasiswa` WHERE `IDDAFTAR` = '$objectdata->IDDAFTAR' ")); 
								echo $getmhs->NIM;
								echo'</td>
								<td>';
								$getmhs1=mysql_fetch_object ( mysql_query("SELECT * FROM `mahasiswa` WHERE `NIM` = '$getmhs->NIM' ")); 
								echo $getmhs1->NAMAMHS;
								echo'</td>
								<td>';
								echo'</td>
								<td>'.$objectdata->TANGGAL_PENILAIAN.'</td>
								<td>'.$objectdata->HASIL_PENILAIAN.'</td>
								<td>';
					?>
								   
					<input name="chk" type="checkbox" id="chk_<?php echo $objectdata->IDPENILAIAN; ?>" value="<?php echo $objectdata->IDPENILAIAN; ?>" onclick="chkit(<?php echo $objectdata->IDPENILAIAN; ?>,<?php echo $objectdata->IDDAFTAR; ?>, this.checked);" />Disetujui<br/>
					<?php
					    echo'
						        </td>
							</tr>
							';
						}
					?>
                </tbody>
            </table>
		</div>
    </div>
	<?php }} ?>
</div>
     