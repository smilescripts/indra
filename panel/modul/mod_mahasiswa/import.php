<ul class="breadcrumb">
	<li>You are here</li>
	<li><a href="?module=beranda" class="glyphicons dashboard"><i></i> Beranda</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li><a href="?module=mahasiswa" class="glyphicons user"><i></i> Mahasiswa</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li>Import Data</li>
</ul>
<h1>Import Data Mahasiswa</h1>
<div class="innerLR">
	<div class="span6">
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
				<script language="javascript">
					function Checkfiles()
					{
						var fup = document.getElementById('filename');
						var fileName = fup.value;
						var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
						if(ext == "xls")
						{
							return true;
						} 
						else if(ext=="")
						{
							alert("Silahkan Pilih File");
							fup.focus();
							return false;
						}else
						{
							alert("Maaf Type file yang diizinkan hanya .xls !");
							fup.focus();
							return false;
						}
					}
				</script>
				
				<form id="validate_field_types" enctype="multipart/form-data" method="POST" action="" onsubmit="return Checkfiles();">  
					<div class="row-fluid">
						<label class="req">File Import </label>
						<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-default btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input value=""  type="file" name="fileexcel" accept=".xls" id="filename" class="margin-none" readonly/></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
						</div>
						* file yang bisa di import adalah .xls (Excel 2003-2007).
					</div>  
					<div class="row-fluid" align="right">
						<button type="submit" name="upload" class="btn btn-info">Import</button>
						<a href="?module=mahasiswa" class="btn btn-danger">Batal </a>
					</div>
				</form>
				<?php if(isset($_POST['upload'])){
					// file yang tadinya di upload, di simpan di temporary file PHP, file tersebut yang kita ambil
					// dan baca dengan PHP Excel Class
					$data = new Spreadsheet_Excel_Reader($_FILES['fileexcel']['tmp_name']);
					$hasildata = $data->rowcount($sheet_index=0);
					// default nilai 
					$sukses = 0;
					$gagal = 0;

					for ($i=2; $i<=$hasildata; $i++)
					{
						$data1 = $data->val($i,1); 
						$data2 = $data->val($i,2);
						$data3 = $data->val($i,3);
						$data4 = $data->val($i,4);
						$data5 = $data->val($i,5);
						$data6 = $data->val($i,6);
						$data7 = $data->val($i,7);
						$data8 = $data->val($i,8);
						$data9 = $data->val($i,9);
						$data10 = $data->val($i,10);
	 

						$query = "INSERT INTO mahasiswa  VALUES ('$data1','$data2','$data3','$data4', '$data5', '$data6','$data7','$data8','$data9','$data10')";
						$hasil = mysql_query($query);

						if ($hasildata) $sukses++;
						else $gagal++;
					}

					echo "<pre>";
					echo "<b>import data selesai.</b> <br>";
					echo "Data yang berhasil di import : " . $sukses .  "<br>";
					echo "Data yang gagal diimport : ".$gagal .  "<br>";
					echo "</pre>";
						
									
				}?>
				<div class="ribbon-wrapper"><div class="ribbon primary">Mahasiswa</div></div>
			</div>
		</div>
	</div>
</div>
                 