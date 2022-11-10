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
	include "../../config.php"; 
	$banco = 'imovel_acompanhe_data';
	$id_imovel=$_GET["id_imovel"];
	
	//proibe o acesso sozinho
	$ref = getenv("HTTP_REFERER");
	$endarquivo = $_SERVER["SCRIPT_FILENAME"];	
	if ($ref == $endarquivo){		
			$server = $_SERVER['SERVER_NAME']; 
			$site = "http://" . $server. "/cms/home.php";
			header("Location: $site");	
	}

?>
<link rel="stylesheet" type="text/css" href="../../css/pagina_imovel.css">

<script language="javascript">
	function confirmaExclusao(aURL) {
		if(confirm('Deseja realmente excluir esta informação?')) {
			location.href = aURL;
		}
	}
</script>


<?
	echo "<div class='btn_pagina'>
			<div class='btn_cadastro'>
				<a href='cad.php?id_imovel=$id_imovel'><p>Cadastar Data</p></a>
			</div>    
		</div>";

	echo "<div class='topo_pagina'>
			<div class='titulo_pagina'>Datas cadastradas </div>    
		</div>";


	

$sql = "SELECT * FROM $banco where id_imovel = $id_imovel ORDER BY data ASC";
$resultado = mysql_query($sql);

if (isset($_GET['pagina'])) {
	$pagina = $_GET['pagina'];
} else {
	$pagina = 1;
}
$registros_por_pagina = "10";
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
    echo '<center><br><br><br><br>Sem registros!</center>';
    exit;
}
else
{

	echo "<div class='titulo'>
			<div class='titulodata'> Data </div>    
			<div class='tituloexcluir'> Imagens </div> 
			<div class='tituloexcluir'> Alterar </div>    
			<div class='tituloexcluir'> Excluir </div>
		</div>";
	
	$colorcount = 0;
	while ($linha2=mysql_fetch_array($resultado)) {
		$data = $linha2["data"];
		$id_imovel = $linha2["id_imovel"];
		$id = $linha2["id"];
		if (@$colorcount % 2) { @$color = '#F9F9F9'; } else { @$color = '#FFF'; }
	
		echo "<div class='item_data' style='background-color:$color; cursor:default' onMouseOver=\"javascript:this.style.backgroundColor='#EFEFEF'\" onMouseOut=\"javascript:this.style.backgroundColor='$color'\">   
				<div class='itemdata'> $data </div>    
				<div class='itemexcluir_data'><a href='galeria/visimg.php?id_imovel=$id_imovel&id=$id' id='cadUsuario'><img border='0' src='../../img/btn_galeria.png' ></a> </div>
				<div class='itemexcluir_data'><a href='cad.php?acao=alt_&id_imovel=$id_imovel&id=$id' id='cadUsuario'><img border='0' src='../../img/btn_alterar.png' ></a> </div>
				<div class='itemexcluir_data'><a href='javascript:confirmaExclusao(\"cad.php?acao=exc_&id_imovel=$id_imovel&id=$id\")'><img border='0' src='../../img/btn_excluir.png' ></a> </div>
			</div>";

		@$colorcount++;
	}
}

$link_de_navegacao = '';
/* link "anterior" */
if($pagina_anterior)
{
    $link_de_navegacao .= " <a href='vis.php?pagina=$pagina_anterior'>Anterior</a> ";
}
for($i = 1; $i <= $total_de_paginas; $i++)
{
    if($i != $pagina)
    {
        /* link individual para as outras páginas */
        $link_de_navegacao .= " <a href='vis.php?pagina=$i'>$i</a> ";
    }else{
        $link_de_navegacao .= " [$i]";
    }
}
/* link "proximo" */
if($pagina != $total_de_paginas)
{
    $link_de_navegacao .= "<a href='vis.php?pagina=$pagina_posterior'>Próximo</a>";
}

	echo "<div class='navegacao'><p>$link_de_navegacao</p></div>";

?>
