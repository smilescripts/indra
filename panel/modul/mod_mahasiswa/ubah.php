<?php 
	if (isset($_POST['submitedit'])) {
		if($_POST['PASSWORDMHS']!=""){ 
			foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
			$sql = "UPDATE `mahasiswa` SET  
			`NIM` =  '{$_POST['NIM']}' , 
			`IDPRODI` =  '{$_POST['IDPRODI']}' , 
			`NAMAMHS` =  '{$_POST['NAMAMHS']}' , 
			`JK` =  '{$_POST['JK']}' , 
			`ALAMATMHS` =  '{$_POST['ALAMATMHS']}' ,  
			`EMAIL` =  '{$_POST['EMAIL']}' ,  
			`TELPONMHS` =  '{$_POST['TELPONMHS']}' , 
			`PASSWORDMHS` =  '{$_POST['PASSWORDMHS']}', 
			`SEMESTER` =  '{$_POST['SEMESTER']}', 
			`TAHUN_AJARAN` =  '{$_POST['TAHUN_AJARAN']}'
			WHERE `NIM` = '$_POST[NIM]' "; 
			mysql_query($sql) or die(mysql_error()); 

		}
		if($_POST['PASSWORDMHS']==""){ 
			foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
			$sql = "UPDATE `mahasiswa` SET  
			`NIM` =  '{$_POST['NIM']}' , 
			`IDPRODI` =  '{$_POST['IDPRODI']}' , 
			`NAMAMHS` =  '{$_POST['NAMAMHS']}' , 
			`JK` =  '{$_POST['JK']}' ,  
			`ALAMATMHS` =  '{$_POST['ALAMATMHS']}' , 
			`EMAIL` =  '{$_POST['EMAIL']}' , 
			`TELPONMHS` =  '{$_POST['TELPONMHS']}', 
			`SEMESTER` =  '{$_POST['SEMESTER']}', 
			`TAHUN_AJARAN` =  '{$_POST['TAHUN_AJARAN']}' 
			WHERE `NIM` = '$_POST[NIM]' "; 
			mysql_query($sql) or die(mysql_error()); 
		} 
		echo "<script>alert('Sukses');window.location='?module=mahasiswa'</script>";
	} 

	$datamhs=mysql_query("select * from mahasiswa where NIM='$_GET[actionedit]'") or die (mysql_error());
	$tampilmhs=mysql_fetch_object($datamhs);
		   
		   ?>

<ul class="breadcrumb">
	<li>You are here</li>
	<li><a href="?module=beranda" class="glyphicons dashboard"><i></i> Beranda</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li><a href="?module=mahasiswa" class="glyphicons user"><i></i> Mahasiswa</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li>Ubah Data</li>
</ul>

<h1>Ubah Data Mahasiswa</h1>
<div class="innerLR">
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
            <form id="validate_field_types" method="POST" action=""> 
                <div class="row-fluid">
                    <label class="req">NIM </label>
                    <input value="<?php echo $tampilmhs->NIM;?>" class="span12"  type="text" name="NIM" id="NIM" readonly/>
                </div>    
				<div class="row-fluid">
                    <label class="req">Nama Mahasiswa</label>
                    <input value="<?php echo $tampilmhs->NAMAMHS;?>" class="span12" type="text" name="NAMAMHS" id="NAMAMHS" />
                </div>
                <div class="row-fluid">
                    <label class="req">Prodi Mahasiswa</label>
                    <?php
						$result = mysql_query("select * from prodi ");  
						echo '<select name="IDPRODI" id="IDPRODI" style="width: 100%;">';
						echo '<option>Silahkan Pilih Program Studi</option>';  
						while ($row = mysql_fetch_array($result)) {  
							echo '<option value="' . $row['IDPRODI'] . '" ';if($tampilmhs->IDPRODI==$row['IDPRODI']){echo "selected='selected'";} echo'>' . $row['NAMA_PRODI']. '</option>';  
						}  
						echo '</select>';
					?>
                </div>
                <div class="row-fluid">
                    <label class="req">Jenis Kelamin</label>
                    <select name="JK" id="JK" style="width: 100%;" required="true">
                        <option value="laki-laki" <?php if($tampilmhs->JK=="laki-laki"){echo "selected='selected'";}?>>laki-laki</option>
                         <option value="Perempuan" <?php if($tampilmhs->JK=="Perempuan"){echo "selected='selected'";}?>>Perempuan</option>
                    </select>
                </div>	
				<div class="row-fluid">
                    <label class="req">Alamat Mahasiswa</label>
                    <textarea class="span12" rows="2" cols="20" name="ALAMATMHS" id="ALAMATMHS" ><?php echo $tampilmhs->ALAMATMHS;?></textarea>
                </div>
				<div class="row-fluid">
                    <label class="req">Email Mahasiswa</label>
                    <input value="<?php echo $tampilmhs->EMAIL;?>" class="span12" type="Email" name="EMAIL" id="EMAIL" />
                </div> 
				<div class="row-fluid">
                    <label class="req">Telepon Mahasiswa</label>
					<input value="<?php echo $tampilmhs->TELPONMHS;?>" class="span12" type="text" name="TELPONMHS" id="TELPONMHS" />
                </div>
				<div class="row-fluid">
                    <label class="req">Kata Sandi </label>
                    <input value="" class="span12" type="password" name="PASSWORDMHS" id="PASSWORDMHS"/><br/>*kosongkan field Kata Sandi jika tidak ada perubahan
                </div>
				<div class="row-fluid">
                    <label class="req">Nama Semester</label>
                    <select name="SEMESTER" style="width: 100%;">
						<option value="1" <?php if($tampilmhs->SEMESTER=="1"){echo'selected="selected"';} ?>>Semester 1</option>
						<option value="2" <?php if($tampilmhs->SEMESTER=="2"){echo'selected="selected"';} ?>>Semester 2</option>
						<option value="3" <?php if($tampilmhs->SEMESTER=="3"){echo'selected="selected"';} ?>>Semester 3</option>
						<option value="4" <?php if($tampilmhs->SEMESTER=="4"){echo'selected="selected"';} ?>>Semester 4</option>
						<option value="5" <?php if($tampilmhs->SEMESTER=="5"){echo'selected="selected"';} ?>>Semester 5</option>
						<option value="6" <?php if($tampilmhs->SEMESTER=="6"){echo'selected="selected"';} ?>>Semester 6</option>
						<option value="7" <?php if($tampilmhs->SEMESTER=="7"){echo'selected="selected"';} ?>>Semester 7</option>
						<option value="8" <?php if($tampilmhs->SEMESTER=="8"){echo'selected="selected"';} ?>>Semester 8</option>
					</select>
                </div>
				<div class="row-fluid">
                    <label class="req">Tahun Ajaran</label>
                    <input  class="span12" type="text" name="TAHUN_AJARAN" id="TAHUN_AJARAN" value="<?php echo $tampilmhs->TAHUN_AJARAN;?>" />
                </div>
                <div class="row-fluid" align="right">
                    <button type="submit" name="submitedit" class="btn btn-info">Ubah Data</button>
					<a href="?module=mahasiswa" class="btn btn-danger">Batal Ubah</a>
                </div>
            </form>
			<div class="ribbon-wrapper"><div class="ribbon primary">Mahasiswa</div></div>
        </div>
    </div>
</div>