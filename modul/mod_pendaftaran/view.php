<?php 

$datainfo=mysql_query("select * from infobeasiswa where IDINFO='$_GET[actionview]'") or die (mysql_error());
$tampilinfo=mysql_fetch_object($datainfo);
$idbsw=$tampilinfo->IDBEASISWA;

$result = mysql_query("select * from jenisbeasiswa where IDBEASISWA='$idbsw'") or die (mysql_error());;
$tampiljns=mysql_fetch_object($result);

	
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
			<div class="row-fluid"><h4><strong>
				<table class="table table-striped table-white table-primary" style="width:100%;">
					<thead>
						<tr>
							<th colspan="3" align="left"><center>
								<?php if($tampilinfo->FOTO!=""){?>
									<div style="padding:10px 10px 10px;">
											<img src="foto/beasiswa/<?php echo $tampilinfo->IDINFO.'/'; echo $tampilinfo->FOTO;?>" width="200" height="200">
									</div>
								<?php } ?>
							</center></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="width: 20%;">Jenis Beasiswa</td>
							<td style="width: 2%;">:</td>
							<td style="width: 78%;"><?php echo $tampiljns->NAMA_BEASISWA;?></td>
						</tr>
						<tr>
							<td style="width: 20%;">Nama Beasiswa</td>
							<td style="width: 2%;">:</td>
							<td style="width: 78%;"><?php echo $tampilinfo->NAMA_BEASISWA;?></td>
						</tr>
						<tr>
							<td style="width: 20%;">Kuota</td>
							<td style="width: 2%;">:</td>
							<td style="width: 78%;"><?php echo $tampilinfo->KUOTA;?></td>
						</tr>
						<tr>
							<td style="width: 20%;">Deskripsi Info</td>
							<td style="width: 2%;">:</td>
							<td style="width: 78%;"><?php echo $tampilinfo->DESKRIPSIINFO;?></td>
						</tr>
						<tr>
							<td style="width: 20%;">Tanggal Awal</td>
							<td style="width: 2%;">:</td>
							<td style="width: 78%;"><?php echo date("d-M-Y", strtotime($tampilinfo->TANGGAL_AWAL));?></td>
						</tr>
						<tr>
							<td style="width: 20%;">Tanggal Akhir</td>
							<td style="width: 2%;">:</td>
							<td style="width: 78%;"><?php echo date("d-M-Y", strtotime($tampilinfo->TANGGAL_AKHIR));?></td>
						</tr>
						<tr>
							<td colspan="3"><center><a href="?module=pendaftaran&actiondaftar=<?php echo $_GET['actionview']; ?>" class="btn btn-primary">DAFTAR</a></center></td>
						</tr>
					</tbody>
				</table></strong></h4>
			</div>
        </div>
    </div>
	<br>
</div>
</div>