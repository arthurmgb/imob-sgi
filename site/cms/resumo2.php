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
	$bancoestado = 'estados';
	$bancocidade = 'cidades';
	$bancobairro = 'bairros';
	$bancobanner = 'banner';
	$bancoimovel = 'imoveis';
	
	
	//proibe o acesso sozinho
	$ref = getenv("HTTP_REFERER");
	$endarquivo = $_SERVER["SCRIPT_FILENAME"];	
	if ($ref == $endarquivo){		
			$server = $_SERVER['SERVER_NAME']; 
			$site = "http://" . $server;
			header("Location: $site");	
	}
	
	
	$sql = mysql_query("SELECT * FROM $bancoestado");
	$numEstados = mysql_num_rows($sql);

	$sql = mysql_query("SELECT * FROM $bancocidade");
	$numCidades = mysql_num_rows($sql);
	
	$sql = mysql_query("SELECT * FROM $bancobairro");
	$numBairros = mysql_num_rows($sql);
	
	$sql = mysql_query("SELECT * FROM $bancobanner");
	$numbanners = mysql_num_rows($sql);	
	
	$sql = mysql_query("SELECT * FROM $bancoimovel where status = '1'");
	$numImoveisAtivos = mysql_num_rows($sql);
	

	
	
	
?> <link rel="stylesheet" type="text/css" href="css/pagina_resumo.css">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<? echo"
	<div class='titulo_principal_resumo'>Locais</div>
	<div class='titulo_resumo'>Estados Cadastrados</div>
	<div class='item_resumo'>$numEstados</div>
	
	<div class='titulo_resumo'>Cidades Cadastrados</div>
	<div class='item_resumo'>$numCidades</div>
	
	<div class='titulo_resumo'>Bairros Cadastrados</div>
	<div class='item_resumo'>$numBairros</div>
	
	
	<div class='titulo_resumo'></div>
	<div class='titulo_principal_resumo'>Outros</div>
	
	<div class='titulo_resumo'>Banners Cadastrados</div>
	<div class='item_resumo'>$numbanners</div>
	
	<div class='titulo_resumo'>Imóveis adicionados ao Sitemap</div>
	<div class='item_resumo'>$numImoveisAtivos</div>
	";
?>
<body>
</body>
</html>