<?php

/*
 * Editor server script for DB table faktorpenilai
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

$idaspek=$_GET['id'];

// Build our Editor instance and process the data coming from _POST
$editor=Editor::inst( $db, 'faktorpenilai', 'IDFAKTOR' )
		->fields(
			Field::inst( 'faktorpenilai.IDASPEK' ),
				//->set( Field::SET_CREATE )
				//->setValue( $idinfo ),
			Field::inst( 'aspekpenilai.NAMA_ASPEK' ),
			Field::inst( 'faktorpenilai.NAMA_FAKTOR' )
				->validator( 'Validate::notEmpty' ),
			Field::inst( 'faktorpenilai.BOBOTNILAI' )
				->validator( 'Validate::notEmpty' )
		)
		->leftJoin( 'aspekpenilai', 'aspekpenilai.IDASPEK', '=', 'faktorpenilai.IDASPEK' )
		->where($key = "faktorpenilai.IDASPEK", $value = $idaspek, $op = "=" )
		->process( $_POST )
		->data();
	
echo json_encode( $editor );