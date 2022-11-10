<?
	$banco = 'imoveis';	
	$bancotipo_imovel = 'tipo_imovel';	
	$bancotipo_negocio = 'tipo_negocio';	
	
	$selecao = $_GET["negocio"];
	
							
if($selecao == ''){
	$sql = "SELECT * FROM $banco ORDER BY id DESC";
}else  if($selecao == 'comprar'){
	$sql = "SELECT * FROM $banco where id_tipo_negocio = '1' and status = '1' ORDER BY id DESC";	
}else  if($selecao == 'alugar'){
	$sql = "SELECT * FROM $banco where id_tipo_negocio = '2' and status = '1' ORDER BY id DESC";	
}


$resultado = mysql_query($sql);


if (isset($_GET['pagina'])) {
	$pagina = $_GET['pagina'];
} else {
	$pagina = 1;
}
$registros_por_pagina = "12";
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
		
	while ($linha=mysql_fetch_array($resultado)) {
		$foto = $linha["foto"];
		$codigo = $linha["cod_imob"];
		$nome  = $linha["nome"];
		$id = $linha["id"];
		$id_tipo_imovel = $linha["id_tipo_imovel"];
		$id_tipo_negocio = $linha["id_tipo_negocio"];
		$estagio_obra = $linha["estagio_obra"];
		
		$sql2 = "SELECT * FROM $bancotipo_imovel WHERE id ='$id_tipo_imovel'";
		$resultado2 = mysql_query($sql2);
					
		while ($linha2=mysql_fetch_array($resultado2)) {										
			$nome_tipo_imovel  = $linha2["nome"];
		}
		
		$sql3 = "SELECT * FROM $bancotipo_negocio WHERE id ='$id_tipo_negocio'";
		$resultado3 = mysql_query($sql3);
					
		while ($linha3=mysql_fetch_array($resultado3)) {										
			$nome_tipo_negocio  = $linha3["nome"];
		}

	
		if($estagio_obra == '3'){$imglancamento = "<div class='faixa'></div>";}else{$imglancamento = '';}
		if($foto == ''){$foto = '../../cms/images/sem_imagem.jpg';}else { $foto = '../../cms/imovel/'.$foto; }													
		echo"
			<div class='item_maisimoveis'>
				$imglancamento
				<a href='../../imovel/index/descricao.php?id=$id'>
					<img src='$foto' /><br><br>
					<b>$nome_tipo_imovel</b> - <b>$nome_tipo_negocio</b>  <br>
					$codigo - $nome <br>
					
				</a>
			</div>";	
	
		}
}

$link_de_navegacao = '';
/* link "anterior" */
if($pagina_anterior)
{
    $link_de_navegacao .= " <a href='?pagina=$pagina_anterior&negocio=$selecao'>Anterior</a> ";
}
for($i = 1; $i <= $total_de_paginas; $i++)
{
    if($i != $pagina)
    {
        /* link individual para as outras páginas */
        $link_de_navegacao .= " <a href='?pagina=$i&negocio=$selecao'>$i</a> ";
    }else{
        $link_de_navegacao .= " [$i]";
    }
}
/* link "proximo" */
if($pagina != $total_de_paginas)
{
    $link_de_navegacao .= "<a href='?pagina=$pagina_posterior&negocio=$selecao'>Próximo</a>";
}

	echo "<div class='navegacao'><p>$link_de_navegacao</p></div>";

   ?>
    
    