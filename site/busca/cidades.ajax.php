<?php
	header( 'Cache-Control: no-cache' );

	include "../cms/config.php";


	$id_estado = mysql_real_escape_string( $_REQUEST['id_estado'] );

	$cidades = array();

	$sql = "SELECT id, nome FROM cidades WHERE id_estado = $id_estado ORDER BY nome";
	$res = mysql_query( $sql );
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$cidades[] = array(
			'id'	=> $row['id'],
			'nome'	=> $row['nome'],
		);
	}

	echo( json_encode( $cidades ) );