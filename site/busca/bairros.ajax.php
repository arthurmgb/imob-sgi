<?php
	header( 'Cache-Control: no-cache' );


	include "../cms/config.php";


	$id_cidade = mysql_real_escape_string( $_REQUEST['id_cidade'] );

	$bairros = array();

	$sql = "SELECT id, nome FROM bairros WHERE id_cidade = $id_cidade ORDER BY nome";
	$res = mysql_query( $sql );
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$bairros[] = array(
			'id'	=> $row['id'],
			'nome'	=> $row['nome'],
		);
	}

	echo( json_encode( $bairros ) );