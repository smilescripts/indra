<?php 

if (isset($_POST['submitadd'])) {
$foto=$_FILES['foto']['name'];

foreach($_FILES['foto']['name'] as $key => $value){
			$keterangan = $_POST['keterangan'][$key];
			$name = $_FILES['foto']['name'][$key];
			$ext = pathinfo($name, PATHINFO_EXTENSION);
			$tmp  = $_FILES['foto']['tmp_name'][$key];
			$type=$_FILES['foto']['type'][$key];
			$ukuran=$_FILES['foto']['size'][$key];	
			if($value!=""){
				if($type != "image/gif"  &&  $type != "image/jpg"  && $type != "image/jpeg" && $type != "image/png") {
					echo "<script> alert('maaf file Yang Diizinkan hanya dengan Type jpg,jpeg,png,gif!'); window.location='?module=tambah'</script>";
				}
				if($ukuran>1000000){
					echo "<script> alert('maaf file tidak bisa lebih dari 1MB'); window.location='?module=tambah'</script>";
				}
				if(trim($name)!=''){
					$new_name = "1".$ext;
					foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
						$sql = "INSERT INTO `infobeasiswa` ( `IDINFO` ,`IDBEASISWA` ,  `IDPETUGAS` ,  `NAMA_BEASISWA` ,  `KUOTA` ,  `DESKRIPSIINFO` ,  `TANGGAL_AWAL` ,  `TANGGAL_AKHIR` , `FOTO`, `STATUS`  ) VALUES
						( NULL, '{$_POST['IDBEASISWA']}' ,  '{$_POST['IDPETUGAS']}' ,  '{$_POST['NAMA_BEASISWA']}' ,  '{$_POST['KUOTA']}' ,  '{$_POST['DESKRIPSIINFO']}' ,  '{$_POST['TANGGAL_AWAL']}' ,  '{$_POST['TANGGAL_AKHIR']}', '{$new_name}', '{$_POST['STATUS']}'  ) "; 
						mysql_query($sql) or die(mysql_error()); 

						$idinfo = mysql_insert_id(); 
					
					if (!file_exists('../foto/beasiswa/'.$idinfo)) {
						mkdir('../foto/beasiswa/'.$idinfo);
					}
           
					if(move_uploaded_file($tmp,'../foto/beasiswa/'.$idinfo.'/'.$new_name)){
               
					}
				}
			}
	
		}
 
echo "<script>alert('Sukses');window.location='?module=view&actionview=$idinfo'</script>";
}
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
	<li>Tambah Data</li>
</ul>

<h1>Ubah Data Beasiswa</h1>
<div class="innerLR">
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
            <form id="validate_field_types" method="POST" action="" enctype="multipart/form-data"> 
				<input type="hidden" id="IDPETUGAS" value="<?php echo $_SESSION['IDPETUGAS']; ?>" name="IDPETUGAS">
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
					<label class="req">Nama Beasiswa</label>
					<input class="span12" type="text" name="NAMA_BEASISWA" id="NAMA_BEASISWA" />
				</div> 
				<div class="row-fluid">
					<label class="req">Kuota Beasiswa</label>
					<input  class="span12" type="text" name="KUOTA" id="KUOTA" />
				</div> 
                <div class="row-fluid">
                    <label class="req">Deskripsi Info </label>
                    <textarea class="span12" rows="2" cols="20" name="DESKRIPSIINFO" id="DESKRIPSIINFO"></textarea>
                </div>   
				<div class="row-fluid" style="margin-bottom:10px;">
					<label for="start" class="req">Tanggal Awal</label>
					<input id="start" style="width: 200px" name="TANGGAL_AWAL" />
				</div>
				<div class="row-fluid" style="margin-bottom:10px;">
					<label for="end" class="req">Tanggal Akhir</label>
					<input id="end" style="width: 200px" name="TANGGAL_AKHIR" />
				</div>
				<div class="row-fluid" style="margin-bottom:10px;">
					<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
						<label class="req">Foto</label>
						<span class="btn btn-default btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" name="foto[]" value=""/></span>
					  	<span class="fileupload-preview"></span>
					  	<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">&times;</a>
					</div>
				</div>
				<div class="row-fluid">
					<label class="req">Status Beasiswa</label>
					<select name="STATUS" id="STATUS" style="width: 100%;">
						<option>Silahkan Pilih Status Beasiswa</option>
						<option value="aktif" >Aktif</option>
						<option value="tidak aktif" >Tidak Aktif</option>
					</select>
				</div>
                                    									
                <div class="row-fluid" align="right">
                    <button type="submit" name="submitadd" class="btn btn-info">Ubah Data</button>
					<a href="?module=beasiswa" class="btn btn-danger">Batal Ubah</a>
                </div>
            </form>
        </div>
    </div>
</div>