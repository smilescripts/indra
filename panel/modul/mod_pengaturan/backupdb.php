<ul class="breadcrumb">
	<li>You are here</li>
	<li><a href="?module=beranda" class="glyphicons dashboard"><i></i> Beranda</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li>Backup</li>
</ul>

<h1>BackUp Beasiswa Database</h1>
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
                                <form id="validate_field_types" enctype="multipart/form-data" method="POST" action="" > 
                                    <div class="formSep">
                                        <label class="req">File Import </label>
										
                                        <input value="" class="span10"  type="file" name="fileexcel" accept=".sql" id="filename" readonly/><br/>
										* file yang diizinkan bertipe .sql.
                                    </div>  
                                  <div class="formSep">
                                        <button type="submit" name="backup" class="btn btn-info">Backup</button>
										
                                    </div>
                                </form>
							         <?php
if(isset($_POST['backup'])){

	
	$file=date("DdMY").'spk'.time().'.sql';
	
	//panggil fungsi dengan memberi parameter untuk koneksi dan nama file untuk backup
	backup_tables("localhost","root","fajar","spk",$file);
	
	?>
	<p align="center">&nbsp;</p>
							<div  class="alert alert-block alert-success fade in">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<h4 class="alert-heading">Success!</h4>
										<p>
											Silahkan Klik Tombol Download Dibawah Ini Untuk Mengambil Data Backup Database
										</p>
										<p>
											<a class="btn btn-success" href="download_backup_data.php?nama_file=<?php echo $file;?>">Download Data Backup</a> 
										</p>
									</div>
	
	<?php
}else{
	unset($_POST['backup']);
}


function backup_tables($host,$user,$pass,$name,$nama_file,$tables = '*')
{
	//untuk koneksi database
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}else{
		//jika hanya table-table tertentu
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//looping dulu ah
	foreach($tables as $table)
	{
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);
		
		//menyisipkan query drop table untuk nanti hapus table yang lama
		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysql_fetch_row($result))
			{
				//menyisipkan query Insert. untuk nanti memasukan data yang lama ketable yang baru dibuat. so toy mode : ON
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
					//akan menelusuri setiap baris query didalam
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	
	//simpan file di folder yang anda tentukan sendiri. kalo saya sech folder "DATA"
	$nama_file;
	
	$handle = fopen('./backup/'.$nama_file,'w+');
	fwrite($handle,$return);
	fclose($handle);
}
?>
                       
                            </div>
                        </div>
                    </div>