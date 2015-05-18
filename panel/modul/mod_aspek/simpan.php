<?php 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `aspekpenilai` ( `IDASPEK` , `IDBEASISWA`, `NAMA_ASPEK` , `STATUSFAKTOR`  ) 
VALUES(  '{$_POST['IDASPEK']}' , '{$_POST['IDBEASISWA']}' , '{$_POST['NAMA_ASPEK']}' ,  '{$_POST['STATUSFAKTOR']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
$idaspek = mysql_insert_id(); 
header('location:?module=lihat_aspek&actionview=$idaspek');
}
?>

<ul class="breadcrumb">
	<li>You are here</li>
	<li><a href="?module=beranda" class="glyphicons dashboard"><i></i> Beranda</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li><a href="?module=aspek" class="glyphicons user"><i></i> Aspek Penilai</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li>Tambah Data</li>
</ul>

<h1>Tambah Data Aspek Penilaian</h1>
<div class="innerLR">
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
			<form id="validate_field_types" method="POST" action="">
                <div class="row-fluid">
                    <label class="req">NAMA Aspek </label>
                    <input value="" class="span12" type="text" name="NAMA_ASPEK" id="NAMA_ASPEK" />
                </div>
				<div class="row-fluid">
                    <label class="req">Jenis Beasiswa</label>
                    <?php
						$result = mysql_query("select * from jenisbeasiswa ");  
						echo '<select name="IDBEASISWA" style="width: 100%;">';  
						echo '<option>Silahkan Pilih Jenis Beasiswa</option>';  
						while ($row = mysql_fetch_array($result)) {  
							echo '<option value="' . $row['IDBEASISWA'] . '">' . $row['NAMA_BEASISWA']. '</option>';  
						}  
						echo '</select>';
					?>
                </div>
                <div class="row-fluid">
                    <label class="req">Status Faktor</label>
					<select name="STATUSFAKTOR" style="width: 100%;">
						<option>Silahkan Pilih Status Faktor</option>
						<option value="NCF">Faktor Utama</option>
						<option value="NSF">Faktor Tambahan</option>
					</select>
                </div>
				<div class="row-fluid">
                    <button type="submit" name="submitted" class="btn btn-info">Simpan Data</button>
					<a href="?module=aspek" class="btn btn-danger">Batal Simpan</a>
				</div>
            </form>
		</div>
	</div>
</div>