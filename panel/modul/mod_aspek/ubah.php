<?php 
if (isset($_POST['submittededit'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `aspekpenilai` SET    `NAMA_ASPEK` =  '{$_POST['NAMA_ASPEK']}' ,  `IDBEASISWA` =  '{$_POST['IDBEASISWA']}' ,  `STATUSFAKTOR` =  '{$_POST['STATUSFAKTOR']}'   WHERE `IDASPEK` =  '{$_POST['IDASPEK']}' "; 
mysql_query($sql) or die(mysql_error());  
header('location:panel.php?module=aspek');			
} 

$data = mysql_fetch_object ( mysql_query("SELECT * FROM `aspekpenilai` WHERE `IDASPEK` = '$_GET[actionedit]' ")); 
?>

<ul class="breadcrumb">
	<li>You are here</li>
	<li><a href="?module=beranda" class="glyphicons dashboard"><i></i> Beranda</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li><a href="?module=aspek" class="glyphicons user"><i></i> Aspek Penilai</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li>Ubah Data</li>
</ul>

<h1>Ubah Data Aspek Penilaian</h1>
<div class="innerLR">
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
            <form id="validate_field_types" method="POST" action="">
				<div class="row-fluid">
                    <label class="req">NAMA Aspek </label>
                    <input value="<?php echo $data->NAMA_ASPEK;?>" class="span12" type="text" name="NAMA_ASPEK" id="NAMA_ASPEK" />
					<input value="<?php echo $data->IDASPEK;?>" class="span12" type="hidden" name="IDASPEK" id="IDASPEK" />                
                </div>
				<div class="row-fluid">
                    <label class="req">Jenis Beasiswa</label>
                    <?php
						$result = mysql_query("select * from jenisbeasiswa ");  
						echo '<select name="IDBEASISWA" style="width: 100%;">';  
						echo '<option>Silahkan Pilih Jenis Beasiswa</option>';  
						while ($row = mysql_fetch_array($result)) {  
							echo '<option value="' . $row['IDBEASISWA'] . '"';if($data->IDBEASISWA==$row['IDBEASISWA']){echo "selected='selected'";} echo'>' . $row['NAMA_BEASISWA']. '</option>';  
						}  
						echo '</select>';
					?>
                </div>
                <div class="row-fluid">
                    <label class="req">Status Faktor</label>
					<select name="STATUSFAKTOR" style="width: 100%;">
						<option>Silahkan Pilih Status Faktor</option>
						<option value="NCF" <?php if($data->STATUSFAKTOR=="NCF"){echo "selected='selected'";} ?>>Faktor Utama</option>
						<option value="NSF" <?php if($data->STATUSFAKTOR=="NSF"){echo "selected='selected'";} ?>>Faktor Tambahan</option>
					</select>
                </div>
                <div class="row-fluid">
                    <button type="submit" name="submittededit" class="btn btn-info">Simpan Data</button>
					<a href="?module=aspek" class="btn btn-danger">Batal Simpan</a>
                </div>
            </form>
        </div>
    </div>
</div>
