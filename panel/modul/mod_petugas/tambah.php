<?php
	if (isset($_POST['submitted'])) { 
		foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
		
		$sql = "INSERT INTO `petugas` ( `IDPETUGAS` ,  `NAMAPETUGAS` ,  `JKPETUGAS` ,  `ALAMATPETUGAS` ,  `EMAILPETUGAS` ,  `TELPONPETUGAS` ,  `PASSWORDPETUGAS`  ) VALUES(NULL ,  '{$_POST['NAMAPETUGAS']}' ,  '{$_POST['JKPETUGAS']}' ,  '{$_POST['ALAMATPETUGAS']}' ,  '{$_POST['EMAILPETUGAS']}' ,  '{$_POST['TELPONPETUGAS']}' ,  '{$_POST['PASSWORDPETUGAS']}'  ) "; 
		mysql_query($sql) or die(mysql_error()); 
		echo "<script>alert('Sukses');window.location='?module=petugas'</script>";
	} 
?>

<ul class="breadcrumb">
	<li>You are here</li>
	<li><a href="?module=beranda" class="glyphicons dashboard"><i></i> Beranda</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li><a href="?module=petugas" class="glyphicons user"><i></i> Petugas</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li>Tambah Data</li>
</ul>

<h1>Tambah Data Petugas</h1>
<div class="innerLR">
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
            <form action="" method="POST">
                <div class="row-fluid">
					<label class="req">Nama Petugas</label>
                    <input value="" placeholder="Nama Petugas" class="span12" type="text" name="NAMAPETUGAS" id="NAMAPETUGAS" />
                </div>
                <div class="row-fluid">
					<label class="req">Alamat Petugas</label>
                    <textarea placeholder="Alamat Petugas" class="span12" rows="2" cols="20" name="ALAMATPETUGAS" id="ALAMATPETUGAS" ></textarea>
                </div>
                <div class="row-fluid">
                    <label class="req">Jenis Kelamin</label>
                    <select name="JKPETUGAS" id="JKPETUGAS" style="width: 100%;" id="select2_3">
                        <option value="">== Pilih Jenis Kelamin ==</option>
                        <option value="laki-laki">laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>	
				<div class="row-fluid">
                    <label class="req">Email </label>
                    <input value="" placeholder="Email" class="span12" type="Email" name="EMAILPETUGAS" id="Email" />
                </div> 
				<div class="row-fluid">
                    <label class="req">Telepon </label>
                    <input value="" placeholder="Telepon" class="span12" type="text" name="TELPONPETUGAS" id="TELPONPETUGAS" />
                </div>
				<div class="row-fluid">
                    <label class="req">Kata Sandi </label>
                    <input value="" placeholder="Kata Sandi" class="span12" type="password" name="PASSWORDPETUGAS" id="PASSWORDPETUGAS" />
                </div>
                <div class="row-fluid" align="right">
                    <button type="submit" name="submitted" class="btn btn-info">Simpan Data</button>
					<a href="?module=petugas" class="btn btn-danger">Batal Simpan</a>
                </div>
            </form>
			<div class="ribbon-wrapper"><div class="ribbon primary">Petugas</div></div>
        </div>
    </div>
</div>
               