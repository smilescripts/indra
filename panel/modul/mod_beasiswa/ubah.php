<?php 

if (isset($_POST['submitedit'])) {
foreach($_FILES['foto']['name'] as $foto => $value){
			$name = $_FILES['foto']['name'][$foto];
			$ext = pathinfo($name, PATHINFO_EXTENSION);
			$tmp  = $_FILES['foto']['tmp_name'][$foto];
			$type=$_FILES['foto']['type'][$foto];
			$ukuran=$_FILES['foto']['size'][$foto];	
			if($value!=""){
				if($type != "image/gif"  &&  $type != "image/jpg"  && $type != "image/jpeg" && $type != "image/png") {
					echo "<script> alert('maaf file Yang Diizinkan hanya dengan Type jpg,jpeg,png,gif!'); window.location='?module=ubah'</script>";
				}
				if($ukuran>1000000){
					echo "<script> alert('maaf file tidak bisa lebih dari 1MB'); window.location='?module=ubah'</script>";
				}
				if(trim($name)!=''){
					$new_name = "1.".$ext;
					
					foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
					$sql = "UPDATE `infobeasiswa` SET 
					`IDBEASISWA` =  '{$_POST['IDBEASISWA']}' ,
					 `IDPETUGAS` =  '{$_SESSION['IDPETUGAS']}',
					 `NAMA_BEASISWA` =  '{$_POST['NAMA_BEASISWA']}' ,
					 `KUOTA` =  '{$_POST['KUOTA']}' , 
					 `DESKRIPSIINFO` =  '{$_POST['DESKRIPSIINFO']}' ,   
					 `TANGGAL_AWAL` =  '{$_POST['TANGGAL_AWAL']}' ,  
					 `TANGGAL_AKHIR` =  '{$_POST['TANGGAL_AKHIR']}',
					 `FOTO` =  '{$new_name}',
					 `STATUS` =  '{$_POST['STATUS']}'
					 WHERE `IDINFO` = '$_GET[actionedit]'
					 "; 
					 
					mysql_query($sql) or die(mysql_error()); 
					
					if (!file_exists('../foto/beasiswa/'.$_GET['actionedit'])) {
						mkdir('../foto/beasiswa/'.$_GET['actionedit']);
					}
           
					if(move_uploaded_file($tmp,'../foto/beasiswa/'.$_GET['actionedit'].'/'.$new_name)){
               
					}
				}
			}else{
				foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
					$sql = "UPDATE `infobeasiswa` SET 
					`IDBEASISWA` =  '{$_POST['IDBEASISWA']}' ,
					 `IDPETUGAS` =  '{$_SESSION['IDPETUGAS']}',
					 `NAMA_BEASISWA` =  '{$_POST['NAMA_BEASISWA']}' ,
					 `KUOTA` =  '{$_POST['KUOTA']}' , 
					 `DESKRIPSIINFO` =  '{$_POST['DESKRIPSIINFO']}' ,   
					 `TANGGAL_AWAL` =  '{$_POST['TANGGAL_AWAL']}' ,  
					 `TANGGAL_AKHIR` =  '{$_POST['TANGGAL_AKHIR']}',
					 `FOTO` =  '',
					 `STATUS` =  '{$_POST['STATUS']}'
					 WHERE `IDINFO` = '$_GET[actionedit]'
					 "; 
					 
					mysql_query($sql) or die(mysql_error());
			}
	
	}

 
echo "<script>alert('Sukses');window.location='?module=beasiswa'</script>";
} 
$datainfo=mysql_query("select * from infobeasiswa where IDINFO='$_GET[actionedit]'") or die (mysql_error());
$tampilinfo=mysql_fetch_object($datainfo);
?>

<script>
    $(document).ready(function() {
        function startChange() {
            var startDate = start.value(),
            endDate = end.value();

            if (startDate) {
                startDate = new Date(startDate);
                startDate.setDate(startDate.getDate());
                end.min(startDate);
            } else if (endDate) {
                start.max(new Date(endDate));
            } else {
                endDate = new Date();
                start.max(endDate);
                end.min(endDate);
            }
        }

        function endChange() {
            var endDate = end.value(),
            startDate = start.value();

            if (endDate) {
                endDate = new Date(endDate);
                endDate.setDate(endDate.getDate());
                start.max(endDate);
            } else if (startDate) {
                end.min(new Date(startDate));
            } else {
                endDate = new Date();
                start.max(endDate);
                end.min(endDate);
            }
        }

        var start = $("#start").kendoDatePicker({
			change: startChange,
			format: "yyyy-MM-dd"
        }).data("kendoDatePicker");

        var end = $("#end").kendoDatePicker({
			change: endChange,
			format: "yyyy-MM-dd"
        }).data("kendoDatePicker");

        start.max(end.value());
            end.min(start.value());
    });
</script>

<ul class="breadcrumb">
	<li>You are here</li>
	<li><a href="?module=beranda" class="glyphicons dashboard"><i></i> Beranda</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li><a href="?module=beasiswa" class="glyphicons info"><i></i> Beasiswa</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li>Ubah Data</li>
</ul>

<h1>Ubah Data Beasiswa</h1>
<div class="innerLR">
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
            <form id="validate_field_types" method="POST" action="" enctype="multipart/form-data"> 
				<div class="row-fluid">
					<label class="req">Jenis Beasiswa</label>
					<?php
						$result = mysql_query("select * from jenisbeasiswa ");  
						echo '<select name="IDBEASISWA" id="IDBESISWA" style="width: 100%;">';
						echo '<option>Silahkan Pilih Jenis Beasiswa</option>';  
						while ($row = mysql_fetch_array($result)) {  
							echo '<option value="' . $row['IDBEASISWA'] . '" ';if($tampilinfo->IDBEASISWA==$row['IDBEASISWA']){echo "selected='selected'";} echo'>' . $row['NAMA_BEASISWA']. '</option>';  
						}  
						echo '</select>';
					?>
				</div>
				<div class="row-fluid">
					<label class="req">Nama Beasiswa</label>
					<input value="<?php echo $tampilinfo->NAMA_BEASISWA;?>" class="span12" type="text" name="NAMA_BEASISWA" id="NAMA_BEASISWA" />
				</div> 
				<div class="row-fluid">
					<label class="req">Kuota Beasiswa</label>
					<input value="<?php echo $tampilinfo->KUOTA;?>" class="span12" type="text" name="KUOTA" id="KUOTA" />
				</div> 
                <div class="row-fluid">
                    <label class="req">Deskripsi Info </label>
                    <textarea class="span12" rows="2" cols="20" name="DESKRIPSIINFO" id="DESKRIPSIINFO"><?php echo $tampilinfo->DESKRIPSIINFO;?></textarea>
                </div>   
				<div class="row-fluid">
					<label for="start" class="req">Tanggal Awal</label>
					<input id="start" style="width: 200px" name="TANGGAL_AWAL" value="<?php echo $tampilinfo->TANGGAL_AWAL;?>"/>
				</div>
				<div class="row-fluid">
					<label for="end" class="req">Tanggal Akhir</label>
					<input id="end" style="width: 200px" name="TANGGAL_AKHIR" value="<?php echo $tampilinfo->TANGGAL_AKHIR;?>"/>
				</div>
				<div class="row-fluid" style="margin-bottom:10px;">
					<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
						<label class="req">Foto</label>
						<?php if($tampilinfo->FOTO!=""){?>
							<div style="padding:10px 10px 10px;">
									<img src="../foto/beasiswa/<?php echo $tampilinfo->IDINFO.'/'; echo $tampilinfo->FOTO;?>" width="200" height="200">
							</div>
						<?php } ?>
						<span class="btn btn-default btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" name="foto[]" id="foto[]" value=""/></span>
					  	<span class="fileupload-preview"></span>
					  	<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">&times;</a>
					</div>
				</div>
				<div class="row-fluid">
					<label class="req">Status Beasiswa</label>
					<select name="STATUS" id="STATUS" style="width: 100%;">
						<option>Silahkan Pilih Status Beasiswa</option>
						<option value="aktif" <?php if($tampilinfo->STATUS=="aktif"){echo "selected='selected'";} ?> >Aktif</option>
						<option value="tidak aktif" <?php if($tampilinfo->STATUS=="tidak aktif"){echo "selected='selected'";} ?> >Tidak Aktif</option>
					</select>
				</div>
                                    									
                <div class="row-fluid" align="right">
                    <button type="submit" name="submitedit" class="btn btn-info">Ubah Data</button>
					<a href="?module=beasiswa" class="btn btn-danger">Batal Ubah</a>
                </div>
            </form>
        </div>
    </div>
</div>