
/*
 * Editor client script for DB table detail_beasiswa
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		"ajax": "php/table.detail_beasiswa.php",
		"table": "#detail_beasiswa",
		"fields": [
			{
				"label": "Nama Beasiswa",
				"name": "detail_beasiswa.IDINFO",
				"type": "select",
			},
			{
				"label": "NAMA ASPEK",
				"name": "detail_beasiswa.IDASPEK",
				"type": "select",
			},
			{
				"label": "BOBOT",
				"name": "detail_beasiswa.BOBOT"
			}
		]
	} );

	$('#detail_beasiswa').DataTable( {
		"dom": "Tfrtip",
		"ajax": "php/table.detail_beasiswa.php",
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
		}
	} );
} );

}(jQuery));

