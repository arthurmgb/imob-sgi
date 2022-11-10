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
	include "../config.php"; 
	$banco = ' historico';
	$bancousuario = 'usuario';
	
	
	//proibe o acesso sozinho
	$ref = getenv("HTTP_REFERER");
	$endarquivo = $_SERVER["SCRIPT_FILENAME"];	
	if ($ref == $endarquivo){		
			$server = $_SERVER['SERVER_NAME']; 
			$site = "http://" . $server. "/cms/home.php";
			header("Location: $site");	
	}
			

?>
<link rel="stylesheet" type="text/css" href="../css/pagina_relatorio.css">

<?

	echo "<div class='topo_pagina'>
			<div class='titulo_pagina'>Relatório de ações</div>    
		</div>";


	
	if($_GET["id"] != ''){		
		require_once "../login/seguranca.php";
		$dados = $_SESSION["dados"];
		$id_usuario = $dados["id_usuario"] ;
		
		$sql = "SELECT * FROM $banco where id_usuario = $id_usuario ORDER BY data DESC";
	}else{
		$sql = "SELECT * FROM $banco ORDER BY data DESC";	
	}
	

$resultado = mysql_query($sql);

if (isset($_GET['pagina'])) {
	$pagina = $_GET['pagina'];
} else {
	$pagina = 1;
}
$registros_por_pagina = "15";
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
			<div class='titulodata'> Data </div>    
			<div class='titulonome'> Nome </div>
			<div class='tituloacao'> Acão </div>    

		</div>";
	
	$colorcount = 0;
	while ($linha2=mysql_fetch_array($resultado)) {
		$acao = $linha2["acao"];
		$id = $linha2["id_usuario"];
		$data = $linha2["data"];
		
		$sql2 = "SELECT * FROM $bancousuario where id_usuario = $id ORDER BY nome DESC";
		$resultado2 = mysql_query($sql2);		
		while ($linha3=mysql_fetch_array($resultado2)) {
			$nomeusuario = $linha3["nome"];
		}
		
		
		if (@$colorcount % 2) { @$color = '#F9F9F9'; } else { @$color = '#FFF'; }
	
		echo "<div class='item' style='background-color:$color; cursor:default' onMouseOver=\"javascript:this.style.backgroundColor='#EFEFEF'\" onMouseOut=\"javascript:this.style.backgroundColor='$color'\">
				<div class='itemdata'> $data</div>    
				<div class='itemnome'> $nomeusuario </div>    
				<div class='itemacao'> $acao </div>    
			</div>";

		@$colorcount++;
	}
}

$link_de_navegacao = '';
/* link "anterior" */
if($pagina_anterior)
{
    $link_de_navegacao .= " <a href='vis.php?pagina=$pagina_anterior&id=".$_GET["id"]."''>Anterior</a> ";
}
for($i = 1; $i <= $total_de_paginas; $i++)
{
    if($i != $pagina)
    {
        /* link individual para as outras páginas */
        $link_de_navegacao .= " <a href='vis.php?pagina=$i&id=".$_GET["id"]."''>$i</a> ";
    }else{
        $link_de_navegacao .= " [$i]";
    }
}
/* link "proximo" */
if($pagina != $total_de_paginas)
{
    $link_de_navegacao .= "<a href='vis.php?pagina=$pagina_posterior&id=".$_GET["id"]."'>Próximo</a>";
}

	echo "<div class='navegacao'><p>$link_de_navegacao</p></div>";

?>
