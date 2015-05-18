<?php 

$datainfo=mysql_query("select * from aspekpenilai where IDASPEK='$_GET[actionview]'") or die (mysql_error());
$tampilinfo=mysql_fetch_object($datainfo);
$idbsw=$tampilinfo->IDBEASISWA;

$result = mysql_query("select * from jenisbeasiswa where IDBEASISWA='$idbsw'") or die (mysql_error());;
$tampiljns=mysql_fetch_object($result);
?>

<ul class="breadcrumb">
	<li>You are here</li>
	<li><a href="?module=beranda" class="glyphicons dashboard"><i></i> Beranda</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li><a href="?module=aspek" class="glyphicons info"><i></i> Aspek Penilaian</a></li>
	<li class="divider"><i class="icon-caret-right"></i></li>
	<li>Detail Aspek Penilaian</li>
</ul>

<h1>Aspek Penilaian</h1>
<div class="innerLR">
	<div class="heading-buttons">
		<h2 class="heading pull-left">Detail Aspek Penilaian</h2>
		<div class="clearfix"></div>
	</div><br/>
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
			<div class="row-fluid"><h4><strong>
				<table class="table table-striped table-white table-primary" style="width:100%;">
					<thead>
						<tr>
							<th colspan="3" align="left"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="width: 20%;">Jenis Beasiswa</td>
							<td style="width: 2%;">:</td>
							<td style="width: 78%;"><?php echo $tampiljns->NAMA_BEASISWA;?></td>
						</tr>
						<tr>
							<td style="width: 20%;">Nama Aspek</td>
							<td style="width: 2%;">:</td>
							<td style="width: 78%;"><?php echo $tampilinfo->NAMA_ASPEK;?></td>
						</tr>
						<tr>
							<td style="width: 20%;">Status Faktor</td>
							<td style="width: 2%;">:</td>
							<td style="width: 78%;"><?php echo $tampilinfo->STATUSFAKTOR;?></td>
						</tr>
					</tbody>
				</table></strong></h4>
			</div>
        </div>
    </div>
	<br>
	<p class="separator text-center"><i class="icon-ellipsis-horizontal icon-3x"></i></p>
	<div class="heading-buttons">
		<h2 class="heading pull-left">Faktor Penilaian</h2>
		<div class="clearfix"></div>
	</div><br/>
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
			<div class="row-fluid">
				<input type="hidden" id="IDASPEK2" value="<?php echo $_GET['actionview']; ?>" name="IDASPEK2">
				<script>
					(function($){
						var id = $('#IDASPEK2').val();
						//alert(id);
						$(document).ready(function() {
							var editor = new $.fn.dataTable.Editor( {
								"ajax": "DataTablesEditor/php/table.faktorpenilai.php?id="+id,
								"table": "#faktorpenilai",
								"fields": [
									{
										"label": "Nama Faktor",
										"name": "faktorpenilai.NAMA_FAKTOR"
									},
									{
										"label": "Bobot",
										"name": "faktorpenilai.BOBOTNILAI",
										"type": "select",
											options: ["1","2","3","4"],
									}
								]
							} );

							$('#faktorpenilai').DataTable( {
								responsive: true,
								"dom": "Tfrtip",
								"ajax": "DataTablesEditor/php/table.faktorpenilai.php?id="+id,
								"columns": [
									{
										"data": "aspekpenilai.NAMA_ASPEK"
									},
									{
										"data": "faktorpenilai.NAMA_FAKTOR"
									},
									{
										"data": "faktorpenilai.BOBOTNILAI"
									}
								],
								"tableTools": {
									"sRowSelect": "os",
									"aButtons": [
										{ "sExtends": "editor_create", "editor": editor },
										{ "sExtends": "editor_edit",   "editor": editor },
										{ "sExtends": "editor_remove", "editor": editor }
									]
								}
							} );
						} );

					}(jQuery));

				</script>
				<table class="table table-striped table-bordered table-condensed table-primary" id="faktorpenilai" width="50%">
					<thead>
						<tr>
						<th>Nama Aspek</th>
						<th>Nama Faktor</th>
						<th>Bobot</th>
						</tr>
					</thead>
				</table>
				
			</div>
        </div>
    </div>
</div>
