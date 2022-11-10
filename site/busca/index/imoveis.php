<?
	$banco = 'imoveis';	
	$bancotipo_imovel = 'tipo_imovel';	
	$bancotipo_negocio = 'tipo_negocio';	
	
	$id_estado_busca = $_POST["id_estado"];
	$id_cidade_busca = $_POST["id_cidade"];
	$id_bairro_busca = $_POST["id_bairro"];
	$dormitorios_busca = $_POST["dormitorios"];
	$id_tipo_imovel_busca = $_POST["id_tipo_imovel"];
	$id_tipo_negocio_busca = $_POST["id_tipo_negocio"];
	

	if ($id_estado_busca==''){$id_estado_busca = $_GET["id_estado"];}
	if ($id_cidade_busca==''){$id_cidade_busca = $_GET["id_cidade"];}
	if ($id_bairro_busca==''){$id_bairro_busca = $_GET["id_bairro"];}
	if ($dormitorios_busca==''){$dormitorios_busca = $_GET["dormitorios"];}
	if ($id_tipo_imovel_busca==''){$id_tipo_imovel_busca = $_GET["id_tipo_imovel"];}
	if ($id_tipo_negocio_busca==''){$id_tipo_negocio_busca = $_GET["id_tipo_negocio"];}
							
if($id_bairro_busca == '' && $id_tipo_negocio_busca == '' && $dormitorios_busca == '' && $id_tipo_imovel_busca == '') {
		$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca ORDER BY id DESC";	
	}elseif($id_bairro_busca != '' && $id_tipo_negocio_busca != '' && $dormitorios_busca != '' && $id_tipo_imovel_busca != '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_bairro = $id_bairro_busca and id_tipo_negocio = $id_tipo_negocio_busca and quartos = $dormitorios_busca and id_tipo_imovel = $id_tipo_imovel_busca ORDER BY id DESC ";	
	}elseif($id_bairro_busca == '' && $id_tipo_negocio_busca != '' && $dormitorios_busca != '' && $id_tipo_imovel_busca != '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_tipo_negocio = $id_tipo_negocio_busca and quartos = $dormitorios_busca and id_tipo_imovel = $id_tipo_imovel_busca ORDER BY id DESC ";	
	}elseif($id_bairro_busca != '' && $id_tipo_negocio_busca == '' && $dormitorios_busca != '' && $id_tipo_imovel_busca != '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_bairro = $id_bairro_busca and quartos = $dormitorios_busca and id_tipo_imovel = $id_tipo_imovel_busca ORDER BY id DESC";	
	}elseif($id_bairro_busca != '' && $id_tipo_negocio_busca != '' && $dormitorios_busca == '' && $id_tipo_imovel_busca != '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_bairro = $id_bairro_busca and id_tipo_negocio = $id_tipo_negocio_busca and id_tipo_imovel = $id_tipo_imovel_busca ORDER BY id DESC";	
	}elseif($id_bairro_busca != '' && $id_tipo_negocio_busca != '' && $dormitorios_busca != '' && $id_tipo_imovel_busca == '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_bairro = $id_bairro_busca and id_tipo_negocio = $id_tipo_negocio_busca and quartos = $dormitorios_busca ORDER BY id DESC";	
	}elseif($id_bairro_busca == '' && $id_tipo_negocio_busca == '' && $dormitorios_busca != '' && $id_tipo_imovel_busca != '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			quartos = $dormitorios_busca and id_tipo_imovel = $id_tipo_imovel_busca ORDER BY id DESC";	
	}elseif($id_bairro_busca == '' && $id_tipo_negocio_busca != '' && $dormitorios_busca == '' && $id_tipo_imovel_busca != '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_tipo_negocio = $id_tipo_negocio_busca and id_tipo_imovel = $id_tipo_imovel_busca ORDER BY id DESC";	
	}elseif($id_bairro_busca == '' && $id_tipo_negocio_busca != '' && $dormitorios_busca != '' && $id_tipo_imovel_busca == '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_tipo_negocio = $id_tipo_negocio_busca and quartos = $dormitorios_busca ORDER BY id DESC";	
	}elseif($id_bairro_busca != '' && $id_tipo_negocio_busca == '' && $dormitorios_busca == '' && $id_tipo_imovel_busca != '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_bairro = $id_bairro_busca and id_tipo_imovel = $id_tipo_imovel_busca ORDER BY id DESC";	
	}elseif($id_bairro_busca != '' && $id_tipo_negocio_busca == '' && $dormitorios_busca != '' && $id_tipo_imovel_busca == '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_bairro = $id_bairro_busca and quartos = $dormitorios_busca ORDER BY id DESC";	
	}elseif($id_bairro_busca != '' && $id_tipo_negocio_busca != '' && $dormitorios_busca == '' && $id_tipo_imovel_busca == '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_bairro = $id_bairro_busca and id_tipo_negocio = $id_tipo_negocio_busca ORDER BY id DESC";	
	}elseif($id_bairro_busca != '' && $id_tipo_negocio_busca == '' && $dormitorios_busca == '' && $id_tipo_imovel_busca == '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_bairro = $id_bairro_busca ORDER BY id DESC";	
	}elseif($id_bairro_busca == '' && $id_tipo_negocio_busca != '' && $dormitorios_busca == '' && $id_tipo_imovel_busca == '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_tipo_negocio = $id_tipo_negocio_busca ORDER BY id DESC";	
	}elseif($id_bairro_busca == '' && $id_tipo_negocio_busca == '' && $dormitorios_busca != '' && $id_tipo_imovel_busca == '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			quartos = $dormitorios_busca ORDER BY id DESC";
	}elseif($id_bairro_busca == '' && $id_tipo_negocio_busca == '' && $dormitorios_busca == '' && $id_tipo_imovel_busca != '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_tipo_imovel = $id_tipo_imovel_busca ORDER BY id DESC";
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
		$id_tipo_negocio = $linha["id_tipo_negocio"];
		
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

	
		if($id_tipo_negocio == '3'){$imglancamento = "<div class='faixa'></div>";}else{$imglancamento = '';}
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
    $link_de_navegacao .= " <a href='?pagina=$pagina_anterior&id_estado=$id_estado_busca&id_cidade=$id_cidade_busca&id_bairro=$id_bairro_busca&dormitorios=$dormitorios_busca&id_tipo_imovel=$id_tipo_imovel_busca&id_tipo_negocio=$id_tipo_negocio_busca'>Anterior</a> ";
}
for($i = 1; $i <= $total_de_paginas; $i++)
{
    if($i != $pagina)
    {
        /* link individual para as outras páginas */
        $link_de_navegacao .= " <a href='?pagina=$i&id_estado=$id_estado_busca&id_cidade=$id_cidade_busca&id_bairro=$id_bairro_busca&dormitorios=$dormitorios_busca&id_tipo_imovel=$id_tipo_imovel_busca&id_tipo_negocio=$id_tipo_negocio_busca'>$i</a> ";
    }else{
        $link_de_navegacao .= " [$i]";
    }
}
/* link "proximo" */
if($pagina != $total_de_paginas)
{
    $link_de_navegacao .= "<a href='?pagina=$pagina_posterior&id_estado=$id_estado_busca&id_cidade=$id_cidade_busca&id_bairro=$id_bairro_busca&dormitorios=$dormitorios_busca&id_tipo_imovel=$id_tipo_imovel_busca&id_tipo_negocio=$id_tipo_negocio_busca'>Próximo</a>";
}

	echo "<div class='navegacao'><p>$link_de_navegacao</p></div>";

   ?>
    
    