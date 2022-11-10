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
	header("Content-Type: text/html; charset=utf-8",true);
	include "../../../config.php"; 
	$banco = 'imovel_acompanhe_galeria';
	$path = dirname(__FILE__);
	$id = $_GET["id"];
	$id_imovel = $_GET["id_imovel"];
	
	
	//proibe o acesso sozinho
	$ref = getenv("HTTP_REFERER");
	$endarquivo = $_SERVER["SCRIPT_FILENAME"];	
	if ($ref == $endarquivo){		
			$server = $_SERVER['SERVER_NAME']; 
			$site = "http://" . $server. "/cms/home.php";
			header("Location: $site");	
	}

?>
<link rel="stylesheet" type="text/css" href="../../../css/pagina_imovel.css">

<script language="javascript">
	function confirmaExclusao(aURL) {
		if(confirm('Deseja realmente excluir esta imagem?')) {
			location.href = aURL;
		}
	}
</script>

<?
echo "<div class='btn_pagina'>
			<div class='btn_cadastro'>
				<a href='index.php?id=$id&id_imovel=$id_imovel'><p>Cadastar Imagens</p></a>
			</div>    
		</div>";

	echo "<div class='topo_pagina'>
			<div class='titulo_pagina'> Imagens cadastradas </div>    
		</div>";

echo"<div class='vis_fotos'>";
$sql = "SELECT * FROM $banco where id_imovel = '$id_imovel' and id_data = '$id' ORDER BY id DESC";
$resultado = mysql_query($sql);


if (isset($_GET['pagina'])) {
	$pagina = $_GET['pagina'];
} else {
	$pagina = 1;
}
$registros_por_pagina = "5000";
$pagina_anterior = $pagina - 1;
$pagina_posterior = $pagina + 1;
$registro_inicio = ($registros_por_pagina * $pagina) - $registros_por_pagina;

$total_de_registros = mysql_num_rows($resultado);

if ($total_de_registros <= $registros_por_pagina) {
    $total_de_paginas = 1;
}elseif (($total_de_registros % $registros_por_pagina) == 0) {
    $total_de_paginas = ($total_de_registros / $registros_por_pagina);
}else{
    $total_de_paginas = ($total_de_registros / $registros_por_pagina) + 1;
}


$total_de_paginas = (int) $total_de_paginas;

if (($pagina > $total_de_paginas) || ($pagina < 0))
{
    echo 'número da página inválido';
    exit;
}


$sql = $sql . " LIMIT $registro_inicio, $registros_por_pagina";

$resultado = mysql_query($sql);
$total_de_registros_da_pagina = mysql_num_rows($resultado);
if ($total_de_registros_da_pagina == 0)
{
    echo '<center>Sem registros!</center>';
    exit;
}
else
{
	
	echo "<div class='titulo_fotos'>
			<div class='titulofoto'> Imagem </div>    
		</div>";
	$colorcount = 0;
	while ($linha=mysql_fetch_array($resultado)) {
		$idimg = $linha["id"];
		$imagem = $linha["thumb"];

		if (@$colorcount % 2) { @$color = '#F9F9F9'; } else { @$color = '#FFF'; }
	
		echo "<div class='item_foto' style='background-color:$color; cursor:default' onMouseOver=\"javascript:this.style.backgroundColor='#EFEFEF'\" onMouseOut=\"javascript:this.style.backgroundColor='$color'\">	
					<div class='informativo_pagina'>
						<div class='img_informativo_pagina'>
							<a href='?id=$id'><img src='../../$imagem' /></a>
						</div>
						<div class='titulo_informativo_pagina'>
							<a href=\"javascript:confirmaExclusao('excimg.php?idimg=$idimg')\"> <img border='0' src='../../../img/btn_excluir.png' > </a>
						</div>
					</div>
					
		</div>";
	}
}


echo "</div><div class='navegacao'><p>$link_de_navegacao</p></div>";
	

?>