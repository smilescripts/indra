<?php 

	$datadetail = mysql_fetch_object ( mysql_query("SELECT pendaftaranmahasiswa.*,
													infobeasiswa.IDINFO,infobeasiswa.NAMA_BEASISWA AS NAMA,
													jenisbeasiswa.IDBEASISWA, jenisbeasiswa.NAMA_BEASISWA AS JENIS,
													jenisbeasiswa.NCF,jenisbeasiswa.NSF,
													mahasiswa.NIM,mahasiswa.NAMAMHS
													FROM `pendaftaranmahasiswa` 
													INNER JOIN mahasiswa ON mahasiswa.NIM = pendaftaranmahasiswa.NIM
													INNER JOIN infobeasiswa ON infobeasiswa.IDINFO = pendaftaranmahasiswa.IDINFO
													INNER JOIN jenisbeasiswa ON jenisbeasiswa.IDBEASISWA = infobeasiswa.IDBEASISWA
													WHERE `IDDAFTAR` = '$_GET[actiondetil]' ")); 
			
?>



<ul class="breadcrumb">
	<li>You are here</li>
	<li><a href="?module=beranda" class="glyphicons dashboard"><i></i> Beranda</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li><a href="?module=penilaian" class="glyphicons edit"><i></i> Penilaian</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li>Detail Penilaian</li>
</ul>

<h1>Detail Data Penilaian</h1>
<div class="innerLR">  
   <div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
			<div style="margin-left:5px;font-size:11pt">
				<table border="0" width="100%">
					<tr>
						<td width="50%">
							ID Daftar : <?php echo $datadetail->IDDAFTAR; ?><br/>
						</td>
						<td width="50%">
							NIM : <?php echo $datadetail->NIM; ?><br/>
						</td>
					</tr>
					<tr>
						<td>	
							Tanggal Pengajuan : <?php echo $datadetail->TANGGAL; ?>
						</td>
						<td>	
							Nama Mahasiswa : <?php echo $datadetail->NAMAMHS; ?>
						</td>
					</tr>
					<tr>
						<td>
                            Tanggal Penilaian : <?php echo date('Y-m-d');?>
						</td>
						<td>	
							Jenis Beasiswa : <?php echo $datadetail->JENIS; ?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>	
							Nama Beasiswa : <?php echo $datadetail->NAMA; ?>
						</td>
					</tr>
                </table>
			</div>
		</div>
	</div>
	<p class="separator text-center"><i class="icon-ellipsis-horizontal icon-3x"></i></p>
	<span><h1>Penilaian Beasiswa </h1><h4>(<?php echo ' Faktor Utama : '.$datadetail->NCF.'% '; ?> | <?php echo ' Faktor Tambahan : '.$datadetail->NSF.'% '; ?>)</h4></span>
	 <div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
			<table class="table table-striped table-condensed">
                <thead>
                	<tr >
						<th>Nama Kriteria</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>

					<?php
						//menampilkan data petugas
						echo'
							<form method="POST" action="?module=hasil&actionhasil='.$_GET["actiondetil"].'" name="myform">
                                ';
						$aspek=mysql_query("SELECT detail_beasiswa.*, aspekpenilai.NAMA_ASPEK, 
											aspekpenilai.IDASPEK, aspekpenilai.STATUSFAKTOR
											FROM detail_beasiswa
											INNER JOIN aspekpenilai ON aspekpenilai.IDASPEK=detail_beasiswa.IDASPEK
											WHERE aspekpenilai.IDBEASISWA=".$datadetail->IDBEASISWA."
											AND detail_beasiswa.IDINFO=".$datadetail->IDINFO);
						while($tampilaspek=mysql_fetch_object($aspek)){
								echo '<tr><td>'.$tampilaspek->NAMA_ASPEK.'<br>';
									if($tampilaspek->STATUSFAKTOR=="NCF"){echo '(Faktor Utama)';}
									else if($tampilaspek->STATUSFAKTOR=="NSF"){echo '(Faktor Tambahan)';}
									echo '</td>
								    <td>';
						$faktor=mysql_query("SELECT detail_beasiswa.*, aspekpenilai.NAMA_ASPEK, 
						faktorpenilai.IDFAKTOR, faktorpenilai.NAMA_FAKTOR, faktorpenilai.BOBOTNILAI 
						FROM detail_beasiswa 
						INNER JOIN aspekpenilai ON aspekpenilai.IDASPEK=detail_beasiswa.IDASPEK 
						INNER JOIN faktorpenilai ON faktorpenilai.IDASPEK=aspekpenilai.IDASPEK 
						WHERE detail_beasiswa.IDINFO=".$datadetail->IDINFO."
						AND aspekpenilai.IDASPEK=".$tampilaspek->IDASPEK);
						while($tampilfaktor=mysql_fetch_object($faktor)){
									echo '<label class="radio">
											<input class="radio" type="radio" name="'.$tampilaspek->IDASPEK.'" id="'.$tampilfaktor->IDFAKTOR.'" value="'.$tampilfaktor->BOBOTNILAI.'">
											'.$tampilfaktor->NAMA_FAKTOR.'
                                        </label><br/>';
						}
						
									echo '</td>
								</tr>'; 
						}
								echo '<tr>
								    <td>Kartu Tanda Mahasiswa</td>
								    <td>
										<label class="radio">
                                            <input class="radio" type="radio" name="ktm" id="1"   value="1">
                                            Ada
                                        </label> <br/>
										<label class="radio">
                                            <input class="radio" type="radio" name="ktm" id="2"  value="0">
                                            Tidak Ada
                                        </label>
									</td>
								</tr>
								<tr>
									<td>Kartu Keluarga</td>
									<td>
										<label class="radio">
                                            <input class="radio" type="radio" name="kk"  id="1"   value="1">
                                            Ada
                                        </label> <br/>
										<label class="radio">
                                            <input class="radio" type="radio" name="kk"  id="2"  value="0">
                                            Tidak Ada
                                        </label>
									</td>
								</tr>
								<tr>
									<td>Foto</td>
									<td>
										<label class="radio">
                                            <input class="radio" type="radio" name="foto" id="1"  value="1">
                                            Ada
                                        </label> <br/>
										<label class="radio">
                                            <input class="radio" type="radio" name="foto" id="2"  value="0">
                                            Tidak Ada
                                        </label>
									</td>
								</tr>';
					?>
                </tbody>
				<td colspan="2"><center>
					<input type="submit" class="btn btn-info" value="Proses">
					<a href="?module=penilaian"  class="btn btn-danger">Batal</a>
				</center></td>
							</form>
            </table>
			
        </div>
    </div>
</div>
                     