<?php 

$datainfo=mysql_query("select * from infobeasiswa where IDINFO='$_GET[actionview]'") or die (mysql_error());
$tampilinfo=mysql_fetch_object($datainfo);
$idbsw=$tampilinfo->IDBEASISWA;

$result = mysql_query("select * from jenisbeasiswa where IDBEASISWA='$idbsw'") or die (mysql_error());;
$tampiljns=mysql_fetch_object($result);

?>

<ul class="breadcrumb">
	<li>You are here</li>
	<li><a href="?module=beranda" class="glyphicons dashboard"><i></i> Beranda</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li><a href="?module=beasiswa" class="glyphicons info"><i></i> Beasiswa</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li>Ubah Data</li>
</ul>

<h1>Beasiswa</h1>
<div class="innerLR">
	<div class="heading-buttons">
		<h2 class="heading pull-left">Detail Beasiswa</h2>
		<div class="clearfix"></div>
	</div><br/>
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
			<div class="row-fluid"><h4><strong>
				<table class="table table-striped table-white table-primary" style="width:100%;">
					<thead>
						<tr>
							<th colspan="3" align="left"><center>
								<?php if($tampilinfo->FOTO!=""){?>
									<div style="padding:10px 10px 10px;">
											<img src="../foto/beasiswa/<?php echo $tampilinfo->IDINFO.'/'; echo $tampilinfo->FOTO;?>" width="200" height="200">
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
							<td style="width: 78%;"><?php echo $tampilinfo->TANGGAL_AWAL;?></td>
						</tr>
						<tr>
							<td style="width: 20%;">Tanggal Akhir</td>
							<td style="width: 2%;">:</td>
							<td style="width: 78%;"><?php echo $tampilinfo->TANGGAL_AKHIR;?></td>
						</tr>
					</tbody>
				</table></strong></h4>
			</div>
        </div>
    </div>
	<br>
	<p class="separator text-center"><i class="icon-ellipsis-horizontal icon-3x"></i></p>
	<div class="heading-buttons">
		<h2 class="heading pull-left">Faktor Penilaian Beasiswa</h2>
		<div class="clearfix"></div>
	</div><br/>
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
			<div class="row-fluid">
				<input type="hidden" id="IDBEASISWA2" value="<?php echo $tampiljns->IDBEASISWA; ?>" name="IDBEASISWA2">
				<input type="hidden" id="IDINFO2" value="<?php echo $_GET['actionview']; ?>" name="IDINFO2">
				<script>
					(function($){
						var id = $('#IDBEASISWA2').val();
						var id2 = $('#IDINFO2').val();
						//alert(idinfo);
					$(document).ready(function() {
						
						var editor = new $.fn.dataTable.Editor( {
							"ajax": "DataTablesEditor/php/table.detail_beasiswa.php?id="+id+"&id2="+id2,
							"table": "#detail_beasiswa",
							"fields": [
								
								{
									"label": "NAMA ASPEK",
									"name": "detail_beasiswa.IDASPEK",
									"type": "select",
								},
								{
									"label": "BOBOT",
									"name": "detail_beasiswa.BOBOT",
									"type": "select",
										options:["1","2","3","4"],
								}
							]
						} );

						$('#detail_beasiswa').DataTable( {
							responsive: true,
							"dom": "Tfrtip",
							"ajax": "DataTablesEditor/php/table.detail_beasiswa.php?id="+id+"&id2="+id2,
							"columns": [
								{
									"data": "infobeasiswa.NAMA_BEASISWA"
								},
								{
									"data": "aspekpenilai.NAMA_ASPEK"
								},
								{
									"data": "detail_beasiswa.BOBOT"
								}
							],
							"tableTools": {
								"sRowSelect": "os",
								"aButtons": [
									{ "sExtends": "editor_create", "editor": editor },
									{ "sExtends": "editor_edit",   "editor": editor },
									{ "sExtends": "editor_remove", "editor": editor }
								]
							},
							
							 initComplete: function ( settings, json ) {
								// Populate the site select list with the data available in the
								// database on load
								
								editor.field( 'detail_beasiswa.IDASPEK' ).update( json.aspekpenilai );
							}
						} );
					} );

					}(jQuery));
				</script>
				<table class="table table-striped table-bordered table-condensed table-primary" id="detail_beasiswa" width="50%">
					<thead>
						<tr>
							<th>Nama Beasiswa</th>
							<th>Nama Aspek</th>
							<th>Bobot</th>
							
						</tr>
					</thead>
				</table>
				
			</div>
        </div>
    </div>
</div>
