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
													WHERE `IDDAFTAR` = '$_GET[actionhasil]' ")); 
													
	
?>



<ul class="breadcrumb">
	<li>You are here</li>
	<li><a href="?module=beranda" class="glyphicons dashboard"><i></i> Beranda</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li><a href="?module=penilaian" class="glyphicons edit"><i></i> Penilaian</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li>Hasil Penilaian</li>
</ul>

<h1>Hasil Data Penilaian</h1>
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
	 <div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
			<table class="table table-striped table-condensed">
                <thead>
                	<tr >
						<th>Data</th>
					<?php
					
						$aspek=mysql_query("SELECT detail_beasiswa.*, aspekpenilai.NAMA_ASPEK, 
											aspekpenilai.IDASPEK, aspekpenilai.STATUSFAKTOR
											FROM detail_beasiswa
											INNER JOIN aspekpenilai ON aspekpenilai.IDASPEK=detail_beasiswa.IDASPEK
											WHERE aspekpenilai.IDBEASISWA=".$datadetail->IDBEASISWA."
											AND detail_beasiswa.IDINFO=".$datadetail->IDINFO);
						while($tampilaspek=mysql_fetch_object($aspek)){
								echo '<th>'.$tampilaspek->NAMA_ASPEK.'';
									if($tampilaspek->STATUSFAKTOR=="NCF"){echo '(Faktor Utama)';}
									else if($tampilaspek->STATUSFAKTOR=="NSF"){echo '(Faktor Tambahan)';}
									echo '</th>';
						}
					?>
					</tr>
                </thead>
                <tbody>
					<tr>
						<td>Nilai</td>
						<?php
						$aspek2=mysql_query("SELECT detail_beasiswa.*, aspekpenilai.NAMA_ASPEK, 
											aspekpenilai.IDASPEK, aspekpenilai.STATUSFAKTOR
											FROM detail_beasiswa
											INNER JOIN aspekpenilai ON aspekpenilai.IDASPEK=detail_beasiswa.IDASPEK
											WHERE aspekpenilai.IDBEASISWA=".$datadetail->IDBEASISWA."
											AND detail_beasiswa.IDINFO=".$datadetail->IDINFO);
						while($tampilaspek2=mysql_fetch_object($aspek2)){
						?>
						<td><?php echo $_POST[$tampilaspek2->IDASPEK]; ?></td>
						<?php }?>
					</tr>
					<tr>
						<td>Bobot</td>
						<?php
						$aspek3=mysql_query("SELECT detail_beasiswa.*, aspekpenilai.NAMA_ASPEK, 
											aspekpenilai.IDASPEK, aspekpenilai.STATUSFAKTOR
											FROM detail_beasiswa
											INNER JOIN aspekpenilai ON aspekpenilai.IDASPEK=detail_beasiswa.IDASPEK
											WHERE aspekpenilai.IDBEASISWA=".$datadetail->IDBEASISWA."
											AND detail_beasiswa.IDINFO=".$datadetail->IDINFO);
						while($tampilaspek3=mysql_fetch_object($aspek3)){
						?>
						<td><?php echo $tampilaspek3->BOBOT; ?></td>
						<?php }?>
					</tr>
					<tr>
						<td>Selisih</td>
						<?php
						$aspek4=mysql_query("SELECT detail_beasiswa.*, aspekpenilai.NAMA_ASPEK, 
											aspekpenilai.IDASPEK, aspekpenilai.STATUSFAKTOR
											FROM detail_beasiswa
											INNER JOIN aspekpenilai ON aspekpenilai.IDASPEK=detail_beasiswa.IDASPEK
											WHERE aspekpenilai.IDBEASISWA=".$datadetail->IDBEASISWA."
											AND detail_beasiswa.IDINFO=".$datadetail->IDINFO);
						while($tampilaspek4=mysql_fetch_object($aspek4)){
							$selisih=$_POST[$tampilaspek4->IDASPEK]-$tampilaspek4->BOBOT;
						?>
						<td><?php echo $selisih; ?></td>
						<?php }?>
					</tr>
					<tr>
						<td>Pemetaan tabel GAP</td>
						<?php
						$aspek5=mysql_query("SELECT detail_beasiswa.*, aspekpenilai.NAMA_ASPEK, 
											aspekpenilai.IDASPEK, aspekpenilai.STATUSFAKTOR
											FROM detail_beasiswa
											INNER JOIN aspekpenilai ON aspekpenilai.IDASPEK=detail_beasiswa.IDASPEK
											WHERE aspekpenilai.IDBEASISWA=".$datadetail->IDBEASISWA."
											AND detail_beasiswa.IDINFO=".$datadetail->IDINFO);
						while($tampilaspek5=mysql_fetch_object($aspek5)){
							$selisih=$_POST[$tampilaspek5->IDASPEK]-$tampilaspek5->BOBOT;
							if($selisih=="0"){$gap="5";}
							if($selisih=="1"){$gap="4.5";}
							if($selisih=="-1"){$gap="4";}
							if($selisih=="2"){$gap="3.5";}
							if($selisih=="-2"){$gap="3";}
							if($selisih=="3"){$gap="2.5";}
							if($selisih=="-3"){$gap="2";}
							if($selisih=="4"){$gap="1.5";}
							if($selisih=="-4"){$gap="1";}
						?>
						<td><?php echo $gap; ?></td>
						<?php }?>
					</tr>
					
                </tbody>
				
            </table>
			<!-- Perhitungan NCF -->
			<?php
			$jmlcf=0;
			$cf=0;
			$aspek6=mysql_query("SELECT detail_beasiswa.*, aspekpenilai.NAMA_ASPEK, 
								aspekpenilai.IDASPEK, aspekpenilai.STATUSFAKTOR
								FROM detail_beasiswa
								INNER JOIN aspekpenilai ON aspekpenilai.IDASPEK=detail_beasiswa.IDASPEK
								WHERE aspekpenilai.IDBEASISWA=".$datadetail->IDBEASISWA."
								AND detail_beasiswa.IDINFO=".$datadetail->IDINFO."
								AND aspekpenilai.STATUSFAKTOR='NCF'");
			while($tampilaspek6=mysql_fetch_object($aspek6)){
				$jmlcf++;
				$selisih=$_POST[$tampilaspek6->IDASPEK]-$tampilaspek6->BOBOT;
				if($selisih=="0"){$gap="5";}
				if($selisih=="1"){$gap="4.5";}
				if($selisih=="-1"){$gap="4";}
				if($selisih=="2"){$gap="3.5";}
				if($selisih=="-2"){$gap="3";}
				if($selisih=="3"){$gap="2.5";}
				if($selisih=="-3"){$gap="2";}
				if($selisih=="4"){$gap="1.5";}
				if($selisih=="-4"){$gap="1";}
			
			$cf=$cf+$gap;
			}
			?>
			<h4>Nilia Total Faktor Utama : <?php if($jmlcf!="0"){$ncf=$cf/$jmlcf; echo $cf/$jmlcf;}else{$ncf="0"; echo '0';} ?></h4>
			
			
			<!-- Perhitungan NSF -->
			<?php
			$jmlsf=0;
			$sf=0;
			$aspek7=mysql_query("SELECT detail_beasiswa.*, aspekpenilai.NAMA_ASPEK, 
								aspekpenilai.IDASPEK, aspekpenilai.STATUSFAKTOR
								FROM detail_beasiswa
								INNER JOIN aspekpenilai ON aspekpenilai.IDASPEK=detail_beasiswa.IDASPEK
								WHERE aspekpenilai.IDBEASISWA=".$datadetail->IDBEASISWA."
								AND detail_beasiswa.IDINFO=".$datadetail->IDINFO."
								AND aspekpenilai.STATUSFAKTOR='NSF'");
			while($tampilaspek7=mysql_fetch_object($aspek7)){
				$jmlsf++;
				$selisih=$_POST[$tampilaspek7->IDASPEK]-$tampilaspek7->BOBOT;
				if($selisih=="0"){$gap="5";}
				if($selisih=="1"){$gap="4.5";}
				if($selisih=="-1"){$gap="4";}
				if($selisih=="2"){$gap="3.5";}
				if($selisih=="-2"){$gap="3";}
				if($selisih=="3"){$gap="2.5";}
				if($selisih=="-3"){$gap="2";}
				if($selisih=="4"){$gap="1.5";}
				if($selisih=="-4"){$gap="1";}
			
			$sf=$sf+$gap;
			}
			?>
			<h4>Nilia Total Faktor Tambahan : <?php if($jmlsf!="0"){$nsf=$sf/$jmlsf; echo $sf/$jmlsf;}else{$nsf="0"; echo '0';} ?></h4>
			<?php $hasil = (($datadetail->NCF/100)*$ncf)+(($datadetail->NSF/100)*$nsf); ?>
			<h4>Hasil Akhir : <?php echo $datadetail->NCF.'%('.$ncf.') + '.$datadetail->NSF.'%('.$nsf.') = '.$hasil; ?></h4>
			<a href="?module=penilaian" class="btn btn-danger">Selesai</a>
        </div>
    </div>
</div>
<?php
	$ptg=$_SESSION['IDPETUGAS'];
	$tgl=date('Y-m-d');
	$querysimpan=mysql_query("insert into penilaianmahasiswa (`IDPENILAIAN`,`IDPETUGAS`,`IDDAFTAR`,`STATUS_PERSETUJUAN`,`TANGGAL_PENILAIAN`,`HASIL_PENILAIAN`)
											values(NULL,'$ptg','$_GET[actionhasil]','','$tgl','$hasil')");
	$ubahstatuspendaftar=mysql_query("UPDATE  `spk`.`pendaftaranmahasiswa` SET  `STATUS_PROSES` =  'Sedang Diproses' WHERE  `pendaftaranmahasiswa`.`IDDAFTAR` ='$_GET[actionhasil]'");						 

?>