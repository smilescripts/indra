<ul class="breadcrumb">
	<li>You are here</li>
	<li><a href="?module=beranda" class="glyphicons dashboard"><i></i> Beranda</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li>Restore</li>
</ul>

<h1>Restore Beasiswa Database</h1>
<div class="innerLR">   
   <div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
							<script language="javascript">
    function Checkfiles()
    {
        var fup = document.getElementById('filename');
        var fileName = fup.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if(ext == "sql")
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
            alert("Maaf Type file yang diizinkan hanya .sql !");
            fup.focus();
            return false;
        }
    }
</script>
                                <form id="validate_field_types" enctype="multipart/form-data" method="POST" action="" onsubmit="return Checkfiles();" > 
                                    <div class="formSep">
                                        <label class="req">File Import </label>
										
                                        <input value="" class="span10"  type="file" name="datafile" accept=".sql" id="filename" readonly/><br/>
										* file yang diizinkan bertipe .sql.
                                    </div>  
                                  <div class="formSep">
                                        <button type="submit" name="restore" class="btn btn-info">Restore</button>
										
                                    </div>
                                </form>
							     <?php
if(isset($_POST['restore'])){
	$koneksi=mysql_connect("localhost","root","fajar");
	mysql_select_db("spk",$koneksi);
	
	$nama_file=$_FILES['datafile']['name'];
	$ukuran=$_FILES['datafile']['size'];
	
	//periksa jika data yang dimasukan belum lengkap
	if ($nama_file=="")
	{
		echo "Fatal Error";
	}else{
		//definisikan variabel file dan alamat file
		$uploaddir='./restore/';
		$alamatfile=$uploaddir.$nama_file;

		//periksa jika proses upload berjalan sukses
		if (move_uploaded_file($_FILES['datafile']['tmp_name'],$alamatfile))
		{
			
			$filename = './restore/'.$nama_file.'';
			
			// Temporary variable, used to store current query
			$templine = '';
			// Read in entire file
			$lines = file($filename);
			// Loop through each line
			foreach ($lines as $line)
			{
				// Skip it if it's a comment
				if (substr($line, 0, 2) == '--' || $line == '')
					continue;
			 
				// Add this line to the current segment
				$templine .= $line;
				// If it has a semicolon at the end, it's the end of the query
				if (substr(trim($line), -1, 1) == ';')
				{
					// Perform the query
					mysql_query($templine);
					// Reset temp variable to empty
					$templine = '';
				}
			}
			echo '<br/>
			<div class="alert alert-block alert-success fade in">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<h4 class="alert-heading">Success!</h4>
										<p>
											Restore Database Berhasil Silahkan cek data Anda
										</p>
										
									</div>
			
			';
		
		}else{
			//jika gagal
			echo "Proses Restore Database gagal, kode error = " . $_FILES['location']['error'];
		}	
	}

}else{
	unset($_POST['restore']);
}
?>
	
	
                       
                            </div>
                        </div>
                    </div>
           