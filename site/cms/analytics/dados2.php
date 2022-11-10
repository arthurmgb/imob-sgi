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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include "../config.php"; 
	$banco = 'google_analytics';
	
	//proibe o acesso sozinho
	$ref = getenv("HTTP_REFERER");
	$endarquivo = $_SERVER["SCRIPT_FILENAME"];	
	if ($ref == $endarquivo){		
			$server = $_SERVER['SERVER_NAME']; 
			$site = "http://" . $server. "/cms/home.php";
			header("Location: $site");	
	}
	
  $sql = "SELECT * FROM $banco";
  $resultado = mysql_query($sql)
  	or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
		
		$linha=mysql_fetch_array($resultado);
			$email = $linha["email"];
			$senha = $linha["senha"];

?>
<link rel="stylesheet" type="text/css" href="../css/home_analytics.css">
</head>
<?
	require_once("gapi.class.php");
	


	// Autenticação
	$ga = new gapi($email, $senha);
	
	// Pega os dados da conta e perfis de site
    $ga->requestAccountData();
 
    // Pra cada resultado encontrado...
    foreach ($ga->getResults() as $perfil) {
       // Exibe os dados de cada um dos perfis de site
        // ID do perfil do site
		$id = $perfil->getProfileId();
    }


	// Define o periodo do relatório
	$inicio = date('Y-m-01', strtotime('-1 day')); // 1° dia do mês passado
	$fim = date('Y-m-t', strtotime('-1 day')); // Último dia do mês passado

	
		// Busca os pageviews e visitas (total do mês passado)
	$ga->requestReportData($id, 'referralPath', array('pageviews', 'visits'), null, null, $inicio, $fim);
	foreach ($ga->getResults() as $dados) {
		echo "<div class='item' style='background-color:$color; cursor:default' onMouseOver=\"javascript:this.style.backgroundColor='#EFEFEF'\" onMouseOut=\"javascript:this.style.backgroundColor='$color'\">
					<div class='itemmes'>
						Referências " . $dados . ": " . $dados->getReferralPath() .' '.$dados->getVisits() . " Visita(s) e  
					</div>
			  </div>";
	}
?>