<?php

/*
 * Editor server script for DB table detail_beasiswa
 * Created by http://editor.datatables.net/generator
 */
 
 
// DataTables PHP library and database connection
include( "lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Join,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;


// Build our Editor instance and process the data coming from _POST

//$idinfo=1;	
$idbsw=$_GET['id'];
$idinfo=$_GET['id2'];

	
$editor=Editor::inst( $db, 'detail_beasiswa', 'id' )
    ->field(
		Field::inst( 'detail_beasiswa.IDINFO' )
				->set( Field::SET_CREATE )
				->setValue( $idinfo ),
        Field::inst( 'infobeasiswa.NAMA_BEASISWA' ),
		
		Field::inst( 'detail_beasiswa.IDASPEK' )->validator( 'Validate::unique' ),
        Field::inst( 'aspekpenilai.NAMA_ASPEK' ),
		Field::inst( 'detail_beasiswa.BOBOT' )
    )
    ->leftJoin( 'infobeasiswa', 'infobeasiswa.IDINFO', '=', 'detail_beasiswa.IDINFO' )
	->leftJoin( 'aspekpenilai', 'aspekpenilai.IDASPEK', '=', 'detail_beasiswa.IDASPEK' )
	->process( $_POST )
	->data();
	//->process($_POST)
    //->json();
	
	
	if (!isset($_POST['action'])) {
    // Get a list of sites for the select list
		$editor['aspekpenilai'] = $db
		  ->query( 'select' )
		  ->table( 'aspekpenilai' )
		  ->get( 'IDASPEK as value' )
		  ->get( 'NAMA_ASPEK as label' )
		  ->where($key = "IDBEASISWA", $value = $idbsw, $op = "=" )
		  ->exec()
		  ->fetchAll();    
	};
	
	echo json_encode( $editor );
	
// Build our Editor instance and process the data coming from _POST
