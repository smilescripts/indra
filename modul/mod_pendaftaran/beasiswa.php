<?php
class PagingBeasiswa{
	// Fungsi untuk mencek halaman dan posisi data
	function cariPosisi($batas){
		if(empty($_GET['halaman'])){
			$posisi=0;
			$_GET['halaman']=1;
		}
		else{
			$posisi = ($_GET['halaman']-1) * $batas;
		}
		return $posisi;
	}

	// Fungsi untuk menghitung total halaman
	function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}

	// Fungsi untuk link halaman 1,2,3 (untuk admin)
	function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = "";

		// Link ke halaman pertama (first) dan sebelumnya (prev)
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=1> << </a></li> 
			<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$prev> < </a></li>  ";
		}
		else{ 
			$link_halaman .= "<li class='disabled'><a href=''> << </a></li> 
			<li class='disabled'><a href=''> < </a></li>  ";
		}

		// Link halaman 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
			if ($i < 1)
				continue;
				$angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a></li> ";
			}
			$angka .= " <li class='active'><a href=''>$halaman_aktif</a></li>  ";
	  
		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
			if($i > $jmlhalaman)
				break;
				$angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a></li> ";
		}
		$angka .= ($halaman_aktif+2<$jmlhalaman ? " <li><a href=''> ... </a></li>
		<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman>$jmlhalaman</a></li> " : " ");

		$link_halaman .= "$angka";

		// Link ke halaman berikutnya (Next) dan terakhir (Last) 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$next> > </a></li>
			<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman> >> </a></li> ";
		}
		else{
			$link_halaman .= " <li class='disabled'><a href=''> > </a></li> 
			<li class='disabled'><a href=''> >> </a></li>";
		}
		return $link_halaman;
	}
}
?>

<div class="mosaic-line mosaic-line-2">
	<div class="container-960 center">
		<h2 class="margin-none"><strong class="text-primary">Beasiswa</strong></h2>
	</div>
</div>

<div class="container">
	<div class="innerT">
		<div class="widget widget-heading-simple widget-body-gray">
				<div class="widget-body">
					<div class="tab-pane active" id="search-simple">
							<div class="widget widget-heading-simple widget-body-simple text-right">
								<form class="form-search">
								  	<input type="text" class="input-large" placeholder="Type your keywords .. " />
								  	<button type="submit" class="btn btn-inverse">Search</button>
								</form>
							</div>
							<div class="widget widget-heading-simple widget-body-white margin-none">
								<div class="widget-body">
									<?php
									$jmldata = mysql_num_rows(mysql_query("SELECT * FROM infobeasiswa"));
									?>
									<h5 class="text-uppercase strong separator bottom"><?php echo $jmldata; ?> Data Beasiswa</h5>

										<?php
											
											$p      = new PagingBeasiswa;
											$batas  = 5;
											$posisi = $p->cariPosisi($batas);
											
											$sql = mysql_query("SELECT * FROM infobeasiswa ORDER BY IDINFO ASC LIMIT $posisi,$batas");
											$no = $posisi+1;
											while ($data = mysql_fetch_array($sql)){
										?>
										<div class="row-fluid">
										<div class="span2 center">
											<?php if($data['FOTO']==""){?>
											<img data-src="holder.js/150x100" alt="Image" />
											<?php } ?>
											<?php if($data['FOTO']!=""){?>
											<img src="foto/beasiswa/<?php echo $data['IDINFO'].'/'; echo $data['FOTO'];?>" width="150" height="100">
											<?php } ?>
										</div>
										<div class="span10">
											<h5 class="strong text-uppercase"><?php echo $data['NAMA_BEASISWA']?></h5>
											<p><?php echo $data['DESKRIPSIINFO']?></p>
											<p><strong>Kuota : </strong><?php echo $data['KUOTA']?></p>
											<p><strong>Batas Akhir Pendaftaran : </strong><?php echo date("d-M-Y", strtotime($data['TANGGAL_AKHIR']));?></p>
											<p class="margin-none strong"><a href="?module=lihat_bsw&actionview=<?php echo $data['IDINFO']?>" class="glyphicons single chevron-right"><i></i>Lihat Beasiswa</a></p>
										</div>
									</div>
									<hr class="separator" />
										<?php } ?>
									<div class="row-fluid center">	
									<?php
										
										$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
										$linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
										echo "<div class='pagination margin-none span12'><ul>$linkHalaman</ul> </div>";
									?>
									</div>
								</div>
							</div>
					</div>

				</div>
		</div>
	</div>
</div>