<?php

	if(!isset($_SESSION['NIM'])){
			echo"<script>alert('Lakukan Login Terlebih Dahulu');window.location='login.php'</script>";
		}
		
		$cektahun=mysql_query("select * from  pendaftaranmahasiswa where NIM='$_SESSION[NIM]'");
	$objektahun=mysql_fetch_object($cektahun);
	$substr=$objektahun->TANGGAL;
	$pecah=substr($substr,0,4);
	$tahunini=date('Y');
 
	if($pecah=="$tahunini"){
		echo"<script>alert('Anda Telah Memasukan Beasiswa Tahun Ini');window.location='?module=lihat_bsw&actionview=$_GET[actiondaftar]'</script>";
	}
	
	if(isset($_POST['prosesdaftar'])){
		$IDDAFTAR=$_POST['IDDAFTAR'];
		$NIM=$_POST['NIM'];
		$TANGGAL=date('Y-m-d');
		///$status=$_POST['status'];
		$notelp=$_POST['notelp'];
		$alamat=$_POST['alamat'];
		$email=$_POST['email'];
		$foto=$_FILES['foto']['name'];
		mysql_query("UPDATE  `spk`.`mahasiswa` SET  `TELPONMHS` =  '$notelp', `ALAMATMHS` =  '$alamat', `EMAIL` =  '$email' WHERE  `mahasiswa`.`NIM` =  '$NIM'");
 
		foreach($_FILES['foto']['name'] as $key => $value){
			$name = $_FILES['foto']['name'][$key];
			$tmp  = $_FILES['foto']['tmp_name'][$key];
			$ext = pathinfo($name, PATHINFO_EXTENSION);
			$type=$_FILES['foto']['type'][$key];
			$ukuran=$_FILES['foto']['size'][$key];	
			$max=1024*1024;
			if($value!=""){
				if($ukuran<=$max){
				if($type == "image/gif"  ||  $type == "image/jpg"  || $type == "image/jpeg" || $type == "image/png") {
						if(trim($name)!=''){
							$new_name = $NIM.".".$ext;
							$sql = "INSERT INTO `pendaftaranmahasiswa` ( `IDDAFTAR` ,`NIM`, `IDINFO`, `TANGGAL`,`FOTO`,`STATUS_PROSES` ) 
							VALUES('$IDDAFTAR' ,'$NIM','$_GET[actiondaftar]','$TANGGAL','$new_name','Belum Diproses') "; 
							mysql_query($sql) or die(mysql_error());
							
							if (!file_exists('foto/mahasiswa/'.$_GET['actiondaftar'])) {
								mkdir('foto/mahasiswa/'.$_GET['actiondaftar']);
							}
				   
							if(move_uploaded_file($tmp,'foto/mahasiswa/'.$_GET['actiondaftar'].'/'.$new_name)){
					   
							}
							
							echo "<script>alert('Sukses');window.location='?module=lihat_bsw&actionview=$_GET[actiondaftar]'</script>";
						}
					}else{
						echo "<script> alert('maaf file Yang Diizinkan hanya dengan Type jpg,jpeg,png,gif!'); window.location='?module=pendaftaran&actiondaftar=$_GET[actiondaftar]'</script>";
					}
					
				}else{
					echo "<script> alert('maaf file tidak bisa lebih dari 1MB'); window.location='?module=pendaftaran&actiondaftar=$_GET[actiondaftar]'</script>";
				}
				
			}
	
		}
	
	} 

	$jointabel=mysql_query("SELECT mahasiswa.NIM, mahasiswa.IDPRODI, mahasiswa.NAMAMHS, 
	mahasiswa.JK, mahasiswa.ALAMATMHS, mahasiswa.EMAIL, mahasiswa.TELPONMHS, mahasiswa.SEMESTER, 
	mahasiswa.TAHUN_AJARAN, prodi.IDPRODI, prodi.NAMA_PRODI
			
	FROM mahasiswa
	INNER JOIN prodi ON prodi.IDPRODI = mahasiswa.IDPRODI
	WHERE mahasiswa.NIM =  '$_SESSION[NIM]'");
	$tampildata=mysql_fetch_array($jointabel);
?>

<div class="mosaic-line mosaic-line-2">
	<div class="container-960 center">
		<h2 class="margin-none"><strong class="text-primary">Pendaftaran Beasiswa</strong></h2>
	</div>
</div>
	
<div class="container">
	<div class="innerT">
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
				<table border="1" width="500" class="footable table table-striped table-bordered table-white table-primary">
					<thead>
						<tr><th></th><th>DATA</th></tr>
					</thead>
					<?php
						$query = "SELECT max(IDDAFTAR) as idMaks FROM pendaftaranmahasiswa";
						$hasil = mysql_query($query);
						$data  = mysql_fetch_array($hasil);
						$nim = $data['idMaks'];

						//mengatur 6 karakter sebagai jumalh karakter yang tetap
						//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
						$noUrut = (int) substr($nim, 4, 3);
						$noUrut++;

						//menjadikan 201353 sebagai 6 karakter yang tetap
						$char =  date('ym');

						//%03s untuk mengatur 3 karakter di belakang 201353
						$IDbaru = $char . sprintf("%03s", $noUrut);
					?>
					<tbody>
						<tr>
							<td>Nama</td>
							<td><?php echo $tampildata["NAMAMHS"] ;?></td>
						</tr>
						<tr>
							<td>NIM</td>
							<td><?php echo $tampildata["NIM"] ;?></td>
						</tr>
						<tr>
							<td>Semester</td>
							<td><?php echo $tampildata["SEMESTER"] ;?></td>
						</tr>
						<tr>
							<td>Program studi</td>
							<td><?php echo $tampildata["NAMA_PRODI"] ;?></td>
						</tr>
						<tr>
							<td>Tahun Ajaran</td>
							<td><?php echo $tampildata["TAHUN_AJARAN"] ;?></td>
						</tr>
					</tbody>
				</table>
				<form id="validate_field_types" action="" method="POST" enctype="multipart/form-data">
				<?php if($tampildata["FOTO"]==""){?>
					<div class="row-fluid">
						<label class="req">Id daftar</label>
						<input type="text" style="height:30px;width:200px;" name="IDDAFTAR" value="<?php echo $IDbaru; ?>" required="true" readonly>
					</div>
					<div class="row-fluid">
						<label class="req">Foto</label>
						<input type="hidden" name="NIM" value="<?php echo $tampildata["NIM"] ;?>" >
						<input type="file" name="foto[]" value="" >
					</div>
				<?php } ?>
				<?php if($tampildata["FOTO"]!=""){?>
					<div class="row-fluid">
						<label class="req">Foto</label>
						<img src="foto_mhs/<?php echo $tampildata["FOTO"];?>" width="200" height="200">
					</div>
				<?php } ?>
					<div class="row-fluid">
						<label class="req">Alamat</label>
						<textarea class="span12" name="alamat" value="" required="true" placeholder="Masukan Alamat"><?php echo $tampildata["ALAMATMHS"];?></textarea>
					</div>
					<div class="row-fluid">
						<label class="req">Email</label>
						<input value="<?php echo $tampildata["EMAIL"];?>" type="Email" style="height:30px;width:200px;" name="email" value="" required="true" placeholder="Masukan Email">
					</div>
					<div class="row-fluid">
						<label class="req">Telepon</label>
						<input value="<?php echo $tampildata["TELPONMHS"];?>" type="text" style="height:30px;width:200px;" name="notelp" value="" required="true" placeholder="Masukan No.Telp">
					</div>
					<div class="row-fluid">
						<input type="submit" class="btn btn-block btn-primary" style="height:30px;width:200px;" name="prosesdaftar" value="Proses"></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
               