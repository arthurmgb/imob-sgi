<?
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
	include "config.php"; 
	$bancoimovel = 'imoveis';
	$bancoestado = 'estados';
	$bancocidade = 'cidades';
	$bancobairro = 'bairros';
	$bancousuario = 'usuario';
	
	
	//proibe o acesso sozinho
	$ref = getenv("HTTP_REFERER");
	$endarquivo = $_SERVER["SCRIPT_FILENAME"];	
	if ($ref == $endarquivo){		
			$server = $_SERVER['SERVER_NAME']; 
			$site = "http://" . $server;
			header("Location: $site");	
	}
	
	
	$sql = mysql_query("SELECT * FROM $bancoimovel");
	$numImoveis = mysql_num_rows($sql);

	$sql = mysql_query("SELECT * FROM $bancoimovel where status = '1'");
	$numImoveisAtivos = mysql_num_rows($sql);
	
	$sql = mysql_query("SELECT * FROM $bancoimovel where status = '2'");
	$numImoveisInativos = mysql_num_rows($sql);
	
	$sql = mysql_query("SELECT * FROM $bancoimovel where destaque = '1'");
	$numImoveisDestaque = mysql_num_rows($sql);	
	
	$sql = mysql_query("SELECT * FROM $bancousuario");
	$numUsuarios = mysql_num_rows($sql);
	

	
	
	
?> <link rel="stylesheet" type="text/css" href="css/pagina_resumo.css">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<? echo"
	<div class='titulo_principal_resumo'>Imóveis</div>
	<div class='titulo_resumo'>Imóveis Cadastrados</div>
	<div class='item_resumo'>$numImoveis</div>
	
	<div class='titulo_resumo'>Imóveis Ativos</div>
	<div class='item_resumo'>$numImoveisAtivos</div>
	
	<div class='titulo_resumo'>Imóveis Inativos</div>
	<div class='item_resumo'>$numImoveisInativos</div>
	
	<div class='titulo_resumo'>Imóveis em Destaque</div>
	<div class='item_resumo'>$numImoveisDestaque</div>
	
	
	<div class='titulo_resumo'></div>
	<div class='titulo_principal_resumo'>Usuários</div>
	
	<div class='titulo_resumo'>Usuarios Cadastrados</div>
	<div class='item_resumo'>$numImoveisDestaque</div>
	";
?>
<body>
</body>
</html>