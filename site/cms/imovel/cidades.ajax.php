<?php
/*
* HomeDevice v1.0
* HomeDevice é um Software proprietário, não livre, cuja cópia, 
* redistribuição ou modificação são em alguma medida restritos 
* pelo seu criador ou distribuidor.
* Desenvolvido por Fernando Blomer
* HomeDevice e WebDevice são nomes fansatia de produtos
* ou sistemas de propriedade de Fernando Blomer
* www.webdevice.com.br
*/
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	include "../config.php";
	@$conexao = mysql_connect($dbserver, $dbuser, $dbpass)	
	or die ("<font color=$colortex size=$sizetex2>Configuração de Banco de Dados Errada!</font>");
	
	mysql_query("SET NAMES 'utf8'", $conexao); 
	mysql_query('SET character_set_connection=utf8', $conexao); 
	mysql_query('SET character_set_client=utf8', $conexao); 
	mysql_query('SET character_set_results=utf8', $conexao);
	
	@$db = mysql_select_db($dbname)
	or die ("<font face=$face size=$sizetex color='$colortex'>Banco de Dados Inexistente!</font>");
	
	

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