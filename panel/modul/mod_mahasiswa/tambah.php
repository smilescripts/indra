<?php
	if (isset($_POST['submitted'])) {

		foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
		$ceknrp=mysql_query("select NIM from mahasiswa where NIM='{$_POST['NIM']}'");
		$dapat=mysql_fetch_object($ceknrp);
		if($dapat->NIM!=""){

			echo "<script>alert('Maaf NIM Sudah Terdaftar');window.location='?module=tambah_mhs'</script>";

		}
		else{
			$sql = "INSERT INTO `mahasiswa` ( `NIM` ,  `IDPRODI` ,  `NAMAMHS` ,  `JK` ,  `ALAMATMHS` ,  `EMAIL` ,  `TELPONMHS` ,  `PASSWORDMHS`, `SEMESTER`, `TAHUN_AJARAN`  ) VALUES
			(  '{$_POST['NIM']}' ,  '{$_POST['IDPRODI']}' ,  '{$_POST['NAMAMHS']}' ,  '{$_POST['JK']}' ,  '{$_POST['ALAMATMHS']}' ,  '{$_POST['EMAIL']}' ,  '{$_POST['TELPONMHS']}' ,  '{$_POST['PASSWORDMHS']}', '{$_POST['SEMESTER']}','{$_POST['TAHUN_AJARAN']}'  ) "; 
			mysql_query($sql) or die(mysql_error()); 


			echo "<script>alert('Sukses');window.location='?module=mahasiswa'</script>";
		}
	} 
?>
<ul class="breadcrumb">
	<li>You are here</li>
	<li><a href="?module=beranda" class="glyphicons dashboard"><i></i> Beranda</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li><a href="?module=mahasiswa" class="glyphicons user"><i></i> Mahasiswa</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li>Tambah Data</li>
</ul>

<h1>Tambah Data Mahasiswa</h1>
<div class="innerLR">
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
            <form id="validate_field_types" method="POST" action=""> 
                <div class="row-fluid">
                    <label class="req">NIM </label>
                    <input value="" placeholder="NIM" class="span12"  type="text" name="NIM" id="NIM" />
                </div>    
				<div class="row-fluid">
                    <label class="req">Nama Mahasiswa</label>
                    <input value="" placeholder="Nama Mahasiswa" class="span12" type="text" name="NAMAMHS" id="NAMAMHS" />
                </div>
                <div class="row-fluid">
                    <label class="req">Prodi</label>
                    <?php
						$result = mysql_query("select * from prodi ");  
						echo '<select name="IDPRODI" style="width: 100%;">';  
						echo '<option>Silahkan Pilih Program Studi</option>';  
						while ($row = mysql_fetch_array($result)) {  
							echo '<option value="' . $row['IDPRODI'] . '">' . $row['NAMA_PRODI']. '</option>';  
						}  
						echo '</select>';
					?>
                </div>
                <div class="row-fluid">
                    <label class="req">Jenis Kelamin</label>
                    <select name="JK" id="JK" style="width: 100%;" required="true">
                        <option value="">Silahkan Pilih</option>
                        <option value="laki-laki">laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>	
				<div class="row-fluid">
                    <label class="req">Alamat Mahasiswa</label>
                    <textarea placeholder="Alamat Mahasiswa" class="span12" rows="2" cols="20" name="ALAMATMHS" id="ALAMATMHS" ></textarea>
                </div>
				<div class="row-fluid">
                    <label class="req">Email Mahasiswa</label>
                    <input value="" placeholder="Email Mahasiswa" class="span12" type="Email" name="EMAIL" id="EMAIL" />
                </div> 
				<div class="row-fluid">
                    <label class="req">Telepon Mahasiswa</label>
                    <input value="" placeholder="Telepon Mahasiswa" class="span12" type="text" name="TELPONMHS" id="TELPONMHS" />
                </div>
				<div class="row-fluid">
                    <label class="req">Kata Sandi </label>
                    <input value="" placeholder="Kata Sandi" class="span12" type="password" name="PASSWORDMHS" id="PASSWORDMHS" />
                </div>
				<div class="row-fluid">
                    <label class="req">Nama Semester</label>
                    <select name="SEMESTER" style="width: 100%;">
						<option value="1">Semester 1</option>
						<option value="2">Semester 2</option>
						<option value="3">Semester 3</option>
						<option value="4">Semester 4</option>
						<option value="5">Semester 5</option>
						<option value="6">Semester 6</option>
						<option value="7">Semester 7</option>
						<option value="8">Semester 8</option>
					</select>
                </div>
				<div class="row-fluid">
                    <label class="req">Tahun Ajaran</label>
                    <input value="" placeholder="Tahun Ajaran" class="span12" type="text" name="TAHUN_AJARAN" id="TAHUN_AJARAN" />
                </div>
                <div class="row-fluid" align="right">
                    <button type="submit" name="submitted" class="btn btn-info">Simpan Data</button>
					<a href="?module=mahasiswa" class="btn btn-danger">Batal Simpan</a>
                </div>
            </form>
			<div class="ribbon-wrapper"><div class="ribbon primary">Mahasiswa</div></div>
        </div>
    </div>
</div>