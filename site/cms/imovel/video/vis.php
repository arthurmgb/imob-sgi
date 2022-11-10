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
	$banco = 'imovel_video';
	$path = dirname(__FILE__);
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
				<a href='cad.php?id_imovel=$id_imovel'><p>Cadastar Video</p></a>
			</div>    
		</div>";

	echo "<div class='topo_pagina'>
			<div class='titulo_pagina'> Video cadastrado </div>    
		</div>";


	

$sql = "SELECT * FROM $banco where id_imovel = $id_imovel ORDER BY id DESC LIMIT 1";
$resultado = mysql_query($sql);

@$total_de_registros_da_pagina = mysql_num_rows($resultado);
if ($total_de_registros_da_pagina == 0)
{
    echo '<center><br> <br> <br> <br>Sem registros!</center>';
}
else
{

	echo "<div class='titulo'>
			<div class='titulovideo'> Video </div>      
			<div class='tituloexcluir'> Excluir </div>
		</div>";
	
	$colorcount = 0;
	while ($linha2=mysql_fetch_array($resultado)) {
		$video = $linha2["video"];
		$id = $linha2["id"];
		if($video == ''){$video = '../images/sem_imagem.jpg';}
		if (@$colorcount % 2) { @$color = '#F9F9F9'; } else { @$color = '#FFF'; }
	
		echo "<div class='item_video' style='background-color:$color; cursor:default' onMouseOver=\"javascript:this.style.backgroundColor='#EFEFEF'\" onMouseOut=\"javascript:this.style.backgroundColor='$color'\">
				<div class='itemvideo'> $video</div>       
				<div class='itemexcluir'><a href='javascript:confirmaExclusao(\"cad.php?acao=exc_&id=$id\")'><img border='0' src='../../img/btn_excluir.png' ></a> </div>
			</div>";

		@$colorcount++;
	}
}
	echo "<div class='navegacao'></div>";

?>
