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
	<li>Beasiswa</li>
</ul>

<h1><i class="icon-file icon-fixed-width text-primary"></i> Laporan</h1>
<div class="innerLR">   
   <div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
			<form action="" method="POST">
				<div class="row-fluid">
					
                    <label for="start">Dari Tanggal:</label><input id="start" style="width: 200px" value="" name="dari"/>
					<label for="end">Sampai Tanggal:</label><input id="end" style="width: 200px" value="" name="sampai"/>

                     <div style="margin-top:25px" >
                        <input type="submit" name="laporan" class="btn btn-info" value="proses Laporan" >
                    </div>
                </div>
			</form>
        </div>
    </div>
<br>
<p class="separator text-center"><i class="icon-ellipsis-horizontal icon-3x"></i></p>
 <?php
	if(isset($_POST['laporan'])){
		$dari=$_POST["dari"];
		$sampai=$_POST["sampai"];
?>

<div class="heading-buttons">
	<h2 class="heading pull-left"><i class="icon-inbox icon-fixed-width text-primary"></i> Data Laporan Periode <?php echo $dari;?> Sampai <?php echo $sampai;?></h2>
	<div class="clearfix"></div>
</div><br/>
	<div class="widget widget-heading-simple widget-body-gray">
	<div class="widget-body">
		<table class="table table-striped table-condensed">
            <thead>
			<tr>
                <th>Jumlah Pendaftar :
					<?php
						$dapatpendaftar=mysql_query("select count(IDPENILAIAN) from penilaianmahasiswa where TANGGAL_PENILAIAN between '$dari' and '$sampai'");
						$hitungpendaftar=mysql_fetch_array($dapatpendaftar);
						$tampilpendaftar=$hitungpendaftar[0];
						echo $tampilpendaftar;
						echo "Pendaftar";
					?>
				</th>
			</tr>
			<tr>
                <th>Jumlah Diterima :
					<?php
						$dapatpendaftarditerima=mysql_query("select count(IDPENILAIAN) from penilaianmahasiswa where TANGGAL_PENILAIAN between '$dari' and '$sampai' and STATUS_PERSETUJUAN='Disetujui'");
						$hitungpendaftarditerima=mysql_fetch_array($dapatpendaftarditerima);
						$tampilpendaftarditerima=$hitungpendaftarditerima[0];
						echo $tampilpendaftarditerima;
						echo "Pendaftar";
					?>
				</th>
			</tr>
		</thead>
        </table>
	</div>
	</div><br>
	<p class="separator text-center"><i class="icon-ellipsis-horizontal icon-3x"></i></p>
	<div class="heading-buttons">
		<h2 class="heading pull-left"><i class="icon-list-alt icon-fixed-width text-primary"></i> Data Penerima Beasiswa</h2>
		<span class="heading pull-right"><a href="?module=excel" class="btn btn-danger">Cetak Excell</a></span>
		<div class="clearfix"></div>
	</div><br/>
	<div class="widget widget-heading-simple widget-body-gray">
    <div class="widget-body">
		<table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tanggal Penilaian</th>
                    <th>Hasil</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
				<?php
					//menampilkan data petugas
					$querypersetujuan=mysql_query("SELECT * FROM penilaianmahasiswa where STATUS_PERSETUJUAN='layak mendapatkan beasiswa'") or die (mysql_error());
				    while($objectdata=mysql_fetch_object($querypersetujuan)){
						echo'
                            <tr>
								<td>'.$objectdata->IDPENILAIAN.'</td>
								<td>';
								$getmhs=mysql_fetch_object ( mysql_query("SELECT * FROM `pendaftaranmahasiswa` WHERE `IDDAFTAR` = '$objectdata->IDDAFTAR' ")); 
								echo $getmhs->NRP;
								echo'</td>
								<td>';
								$getmhs1=mysql_fetch_object ( mysql_query("SELECT * FROM `mahasiswa` WHERE `NIM` = '$getmhs->NIM' ")); 
								echo $getmhs1->NAMAMHS;
								echo'</td>
								<td>'.$objectdata->TANGGAL_PENILAIAN.'</td>
								<td>'.$objectdata->HASIL_PENILAIAN.'</td>
								<td>'.$objectdata->STATUS_PERSETUJUAN.'</td>';
				?>
				<?php
						echo'
						    </tr>';
				} ?>
            </tbody>
        </table>
	</div>
	</div><br>
    <p class="separator text-center"><i class="icon-ellipsis-horizontal icon-3x"></i></p>
	<div class="heading-buttons">
		<h2 class="heading pull-left"><i class="icon-bar-chart icon-fixed-width text-primary"></i> Penyajian Grafik</h2>
		<div class="clearfix"></div>
	</div>
	<div class="widget-body">

		<script src="../js/highcharts.js" type="text/javascript"></script>
		<script src="../js/exporting.js" type="text/javascript"></script>
		<script type="text/javascript">
			var chart1; // globally available
			$(document).ready(function() {
				chart1 = new Highcharts.Chart({
					chart: {
						renderTo: 'grafik',
						type: 'column'
					},   
					title: {
						text: 'Grafik Penerimaan'
					},
					xAxis: {
						categories: ['Status ']
					},
					yAxis: {
						title: {
							text: 'Jumlah Pengaduan'
						}
					},
					series:             
						[
						<?php 
							$sqla = "SELECT *  FROM penilaianmahasiswa";
							$query1 = mysql_query($sqla); 
							while( $ret = mysql_fetch_array( $query1) ){
								$merek=$ret['IDPENILAIAN'];
								$seri=$ret['STATUS_PERSETUJUAN'];                     
								$sql_jumlah   = "SELECT count(IDPENILAIAN) FROM penilaianmahasiswa where TANGGAL_PENILAIAN between '$dari' and '$sampai' and IDPENILAIAN='$merek'";        
								$query_jumlah = mysql_query($sql_jumlah); 
								while( $data = mysql_fetch_array( $query_jumlah ) ){
									$jumlah = $data[0];   
								}             
						?>
							{
								name: '<?php echo $tipe.'('.$seri.')'; ?>',
								data: [<?php echo $jumlah; ?>]
							},
							<?php } ?>
						]
				});
			});	
		</script>
		<div id='grafik' ></div>
		<hr/>
		<script type="text/javascript" >
			$(function () {
				var chart;
				$(document).ready(function () {
				// Build the chart
					chart = new Highcharts.Chart({
					chart: {
						renderTo: 'laporanchart',
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: 'Grafik PIE Chart'
					},
					tooltip: {
						pointFormat: '{series.name}: <b>{point.percentage}%</b>',
						percentageDecimals: 1
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: false
							},
							showInLegend: true
						}
					},
					series: [{
						type: 'pie',
						name: 'Presentase',
						data: [
							<?php 
								$sqla = "SELECT *  FROM penilaianmahasiswa";
								$query1 = mysql_query($sqla); 
								while( $ret = mysql_fetch_array( $query1) ){
									$merek=$ret['IDPENILAIAN'];
									$seri=$ret['STATUS_PERSETUJUAN'];                     
									$sql_jumlah   = "SELECT count(IDPENILAIAN) FROM penilaianmahasiswa where TANGGAL_PENILAIAN between '$dari' and '$sampai' and IDPENILAIAN='$merek'";        
									$query_jumlah = mysql_query($sql_jumlah); 
									while( $data = mysql_fetch_array( $query_jumlah ) ){
										$jumlah = $data[0];   
									}             
							?>
									['<?php echo $seri; ?>',  <?php echo $jumlah; ?>],
              
								<?php } ?>
                    
						]
					}]
					});
				});
    
			});
		</script>
		

<!--grafik akan ditampilkan disini -->
		<div id="laporanchart" style="min-width: 600px;
			height: 600px; margin: 0 auto">
		</div>		
    </div>
</div>
<?php } ?>