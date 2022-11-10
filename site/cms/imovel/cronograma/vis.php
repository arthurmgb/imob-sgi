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
	include "topo_acompanhe.php"; 
	include "../../config.php"; 
	$banco = 'imovel_acompanhe_data';
	
	$id_imovel=$_GET["id_imovel"];

?>

<script language="javascript">
	function confirmaExclusao(aURL) {
		if(confirm('Deseja realmente excluir esta informação?')) {
			location.href = aURL;
		}
	}
</script>


<?

if (isset($_GET['pagina'])) {
	$pagina = $_GET['pagina'];
} else {
	$pagina = 1;
}

// CONECTAR DB
$conexao = mysql_connect($dbserver, $dbuser, $dbpass);
$db = mysql_select_db("$dbname");

$sql = "SELECT * FROM $banco where id_imovel = '$id_imovel' ORDER BY id DESC";
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
    echo '<center>Sem registros!</center>';
    exit;
}
else
{
echo"<center>";
echo "<table width=825 border=0 cellpadding=1 cellspacing=1>";
echo "<tr>";
echo "<td width=100><font size=\"2\" color=\"#666666\"><B>Data</B></font></td>";
echo "<td><font size=\"2\" color=\"#666666\"><B><center>Imagens</B></font></td>";
echo "<td><font size=\"2\" color=\"#666666\"><B><center>Alterar</B></font></td>";
echo "<td><font size=\"2\" color=\"#666666\"><B><center>Excluir</B></font></td>";
echo "</tr>";

while ($linha2=mysql_fetch_array($resultado)) {
$data = $linha2["data"];

$colorbg = "#EDEDED";

if (@$colorcount % 2) { @$color = @$colorbg; } else { @$color = @$colortb; }
echo "<tr align=top bgcolor=\"$color\">";   
echo "<td width=600><font size=\"2\" color=\"#999999\">$data</font></td>";         
echo "<td width=50><p align=center><a href='galeria/index.php?id=".$linha2['id']."&id_imovel=".$linha2['id_imovel']."'><img border=\"0\" src=\"../../img/btn_galeria.png\" ></a></font></td>";
echo "<td width=50><p align=center><a href='cad.php?acao=alt_&id=".$linha2['id']."&id_imovel=".$linha2['id_imovel']."'><img border=\"0\" src=\"../../img/btn_alterar.png\" ></a></font></td>";
echo "<td width=50><p align=center><a href=\"javascript:confirmaExclusao('cad.php?acao=exc_&id=".$linha2['id']."&id_imovel=".$linha2['id_imovel']."')\"><img border=\"0\" src=\"../../img/btn_excluir.png\"></a></td>";
echo "</tr>";
@$colorcount++;
}
echo "</table>";  }
echo"</center>";
$link_de_navegacao = '';
/* link "anterior" */
if($pagina_anterior)
{
    $link_de_navegacao .= " <a href='vis.php?pagina=$pagina_anterior&pg=$pg'><font size=\"2\" color=\"#666666\">Anterior</font></a> ";
}
for($i = 1; $i <= $total_de_paginas; $i++)
{
    if($i != $pagina)
    {
        /* link individual para as outras páginas */
        $link_de_navegacao .= " <a href='vis.php?pagina=$i&pg=$pg'><font size=\"2\" color=\"#666666\">$i</font></a> ";
    }else{
        $link_de_navegacao .= " <font size=\"2\" color=\"#666666\"><b>[$i]</b></font> ";
    }
}
/* link "proximo" */
if($pagina != $total_de_paginas)
{
    $link_de_navegacao .= "<a href='vis.php?pagina=$pagina_posterior&pg=$pg'><font size=\"2\" color=\"#666666\">Próximo</font></a>";
}

	echo "<br><p align=\"center\">" . $link_de_navegacao;

?>
</html>