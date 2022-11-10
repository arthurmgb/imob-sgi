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
	$banco = 'imoveis';
	$path = dirname(__FILE__);
	
	//proibe o acesso sozinho
	$ref = getenv("HTTP_REFERER");
	$endarquivo = $_SERVER["SCRIPT_FILENAME"];	
	if ($ref == $endarquivo){		
			$server = $_SERVER['SERVER_NAME']; 
			$site = "http://" . $server. "/cms/home.php";
			header("Location: $site");	
	}

?>
<link rel="stylesheet" type="text/css" href="css/home_imovel.css">

<?
$sql = "SELECT * FROM $banco ORDER BY id DESC";
$resultado = mysql_query($sql);


if (isset($_GET['pagina'])) {
	$pagina = $_GET['pagina'];
} else {
	$pagina = 1;
}
$registros_por_pagina = "4";
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
	
	
	echo "<div class='titulo'>
			<div class='titulocodigo'> Código </div>    
			<div class='titulofoto'> Foto </div> 
			<div class='titulonome'> Nome </div>    
			<div class='tituloexcluir'> Alterar </div>    
		</div>";
	
	$colorcount = 0;
	while ($linha2=mysql_fetch_array($resultado)) {
		$nome = $linha2["nome"];
		$id = $linha2["id"];
		$cod = $linha2["cod_imob"];
		$foto = $linha2["foto"];
		if($foto == ''){$foto = 'images/sem_imagem.jpg';}else { $foto = 'imovel/'.$foto; }
		if (@$colorcount % 2) { @$color = '#F9F9F9'; } else { @$color = '#FFF'; }
	
		echo "<div class='item' style='background-color:$color; cursor:default' onMouseOver=\"javascript:this.style.backgroundColor='#EFEFEF'\" onMouseOut=\"javascript:this.style.backgroundColor='$color'\">
				<div class='itemcodigo'>$cod</div> 
				<div class='itemfoto'> <img src='$foto' width='40' height='40'/></div>    
				<div class='itemnome'> $nome </div>    								
				<div class='itemexcluir'><a href='imovel/cad.php?acao=alt_&id=$id' id='cadUsuario'><img border='0' src='img/btn_alterar.png' ></a> </div>

			</div>";

		@$colorcount++;	
	
		}
}
?>
