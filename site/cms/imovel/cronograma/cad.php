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
	$banco = 'imovel_cronograma';
	$id_imovel = $_GET["id_imovel"];
	
	require_once "../../login/seguranca.php";
	$dados = $_SESSION["dados"];
	if ($dados["nivel"] == '1' || $dados["nivel"] == '2'){	

	
	//proibe o acesso sozinho
	$ref = getenv("HTTP_REFERER");
	$endarquivo = $_SERVER["SCRIPT_FILENAME"];	
	if (!$ref || $ref == $endarquivo){		
			$server = $_SERVER['SERVER_NAME']; 
			$site = "http://" . $server;
			header("Location: $site");	
	}
	
?> <link rel="stylesheet" type="text/css" href="../../css/pagina_imovel.css"> <?


// Busca no Banco de Dados

if($_GET['acao'] == "alt_"){
	@$sql = "SELECT * FROM $banco WHERE id_imovel='".$_GET['id_imovel']."'";
	@$resultado = mysql_query($sql)
	or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
	
	$linha=mysql_fetch_array($resultado);
		$id = $linha["id"];			 	 	 	 	 	 	
		$pronto = $linha["pronto"];		 	 	 	 	 	 	
		$obra = $linha["obra"];	 	 	 	 	 	 	
		$escavacao = $linha["escavacao"];	 	 	 	 	 	 	
		$contencao = $linha["contencao"];	 	 	 	 	 	 	
		$fundacao = $linha["fundacao"];		 	 	 	 	 	 	
		$estrutura = $linha["estrutura"];			 	 	 	 	 	 	
		$alvenaria = $linha["alvenaria"];			 	 	 	 	 	 	
		$instalacao = $linha["instalacao"];			 	 	 	 	 	 	
		$rinterno = $linha["rinterno"];			 	 	 	 	 	 	
		$rexterno = $linha["rexterno"];			 	 	 	 	 	 	
		$acabamento = $linha["acabamento"];
		$finalizacao = $linha["finalizacao"];
		
		
		if($id == ''){
			$_GET['acao'] = "";
		}		
}


// CADASTRAR 
if($_GET['acao'] == "cad"){
					
			$query = "INSERT INTO $banco (id, id_imovel, pronto, obra, escavacao, contencao, fundacao, estrutura, alvenaria, instalacao, rinterno, rexterno, acabamento, finalizacao) VALUES 
			('null','$id_imovel', '".$_POST['pronto']."', '".$_POST['obra']."', '".$_POST['escavacao']."', '".$_POST['contencao']."', '".$_POST['fundacao']."', '".$_POST['estrutura']."'
			, '".$_POST['alvenaria']."', '".$_POST['instalacao']."', '".$_POST['rinterno']."', '".$_POST['rexterno']."', '".$_POST['acabamento']."', '".$_POST['finalizacao']."');";
			$result = mysql_query($query);
			if (!$result) {
			    echo "ERRO: $query";
			} else {
				require_once "../../login/seguranca.php";
				$idusuario_historico = $_SESSION["dados"];
				$dadossql = "INSERT INTO historico ( id ,id_usuario ,acao)VALUES (NULL ,  '".$idusuario_historico["id_usuario"]."', 'cadastrou na tabela $banco')";
				$resultadosql = mysql_query($dadossql);
				if (!$resultadosql) {
					echo "ERRO: $dadossql";
				}
				?>
				<script>
		            window.alert("Informação cadastrada com sucesso!");
		        </script>
		        <meta HTTP-EQUIV = "Refresh" CONTENT = "0; URL = ../vis.php?id_imovel=<? echo $id_imovel ?>">
				<?	
			}
}

// ALTERAR
if($_GET['acao'] == "alt"){
				
			// Atualizando os dados.
			$query = "UPDATE $banco SET id_imovel='$id_imovel', pronto ='".$_POST['pronto']."', obra='".$_POST['obra']."', escavacao='".$_POST['escavacao']."', contencao='".$_POST['contencao']."', fundacao='".$_POST['fundacao']."', 
			estrutura='".$_POST['estrutura']."', alvenaria='".$_POST['alvenaria']."', instalacao='".$_POST['instalacao']."', rinterno='".$_POST['rinterno']."', rexterno='".$_POST['rexterno']."', 
			acabamento='".$_POST['acabamento']."', finalizacao='".$_POST['finalizacao']."' WHERE id='".$_GET['id']."'";
			@$resultado = mysql_query($query);
			if (!$resultado) {
				    echo "ERRO2: $query";
				} else {
					require_once "../../login/seguranca.php";
				$idusuario_historico = $_SESSION["dados"];
				$dadossql = "INSERT INTO historico ( id ,id_usuario ,acao)VALUES (NULL ,  '".$idusuario_historico["id_usuario"]."', 'alterou na tabela $banco')";
				$resultadosql = mysql_query($dadossql);
				if (!$resultadosql) {
					echo "ERRO: $dadossql";
				}
					?>
					<script>
			            window.alert("Informação alterada com sucesso!");
			        </script>
			        <meta HTTP-EQUIV = "Refresh" CONTENT = "0; URL = ../vis.php?id_imovel=<? echo $id_imovel ?>">
					<?	
				}
}

// EXCLUIR
if($_GET['acao'] == "exc_"){	
									
			$sql = "delete from `$banco` where id_imovel = '$id_imovel' and id = '".$_GET['id']."'";
			$resultado = mysql_query($sql)
			or die ("Não foi possível realizar a exclusão dos dados.".$sql);
			require_once "../../login/seguranca.php";
				$idusuario_historico = $_SESSION["dados"];
				$dadossql = "INSERT INTO historico ( id ,id_usuario ,acao)VALUES (NULL ,  '".$idusuario_historico["id_usuario"]."', 'excluiu na tabela $banco')";
				$resultadosql = mysql_query($dadossql);
				if (!$resultadosql) {
					echo "ERRO: $dadossql";
				}
			?>
				<script>
				   window.alert("Informação excluida com sucesso!");
				</script>
				<meta HTTP-EQUIV = "Refresh" CONTENT = "0; URL = ../vis.php?id_imovel=<? echo $id_imovel ?>">
			<?
			exit();
}

?>
<html>
<head>
<!-- Validator	-->
<link rel="stylesheet" href="../../css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="../../js/jquery-1.4.2.js"  type="text/javascript"></script>
<script src="../../js/jquery.validationEngine-pt.js" type="text/javascript"></script>
<script src="../../js/jquery.validationEngine.js" type="text/javascript"></script>		
				
    <script>	
		$(document).ready(function() {	
			$("#formcadastro").validationEngine()
		
		});
		
		// JUST AN EXAMPLE OF CUSTOM VALIDATI0N FUNCTIONS : funcCall[validate2fields]
		function validate2fields(){
			if($("#firstname").val() =="" ||  $("#lastname").val() == ""){
				return false;
			}else{
				return true;
			}
		}
	</script>    
<!-- Validator	-->
<!-- Ajuda -->
	<script src="../../js/jquery.jgrowl.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/jquery.jgrowl.css"/>
<!-- Ajuda -->
    
	</head>
<?

	echo "<div class='topo_pagina'>
			<div class='titulo_pagina'> Cronograma da Obra </div>    
		</div>";
        
			if ($_GET['acao'] == "cad_" or empty($_GET['acao'])){	
				echo "<form id='formcadastro' name='formcadastro' method='POST' action='cad.php?acao=cad&id_imovel=".$_GET['id_imovel']."' enctype='multipart/form-data'>";
			}
			if($_GET['acao'] == "alt_" or $_GET['acao'] == "alt"){
				echo "<form id='formcadastro' name='formcadastro' method='POST' action='cad.php?acao=alt&id=$id&id_imovel=".$_GET['id_imovel']."' enctype='multipart/form-data'>";
			}
				
            
   echo "<div class='formulario'>
   			
			<div class='titulo_7_formulario'><p>Obras iniciadas</p></div>	 
	 		<div class='titulo_7_formulario'><p>Escavações</p></div>	 
			<div class='titulo_7_formulario'><p>Contenções</p></div>
			<div class='titulo_7_formulario'><p>Fundações</p></div>
			
			<div class='item_7_formulario'><input type='text' id='obra' name='obra' value='$obra' class='validate[required] item_7_formulario'/></div>
			<div class='item_7_formulario'><input type='text' id='escavacao' name='escavacao' value='$escavacao' class='validate[required] item_7_formulario'/></div>
			<div class='item_7_formulario'><input type='text' id='contencao' name='contencao' value='$contencao' class='validate[required] item_7_formulario'/></div>
			<div class='item_7_formulario'><input type='text' id='fundacao' name='fundacao' value='$fundacao' class='validate[required] item_7_formulario'/></div>
  			<div class='item_select_ajuda'>
				<img src='../../images/ajuda.png' onclick=\"$.jGrowl('Preencha estes itens com o valor de 0 a 100. Utilize somente números', { header: 'Porcentagem', position:'center', life: 100000});\" />
			</div>
			
	</div>";
	
	echo "<div class='formulario'>
   			
			<div class='titulo_7_formulario'><p>Estrutura</p></div>	 
	 		<div class='titulo_7_formulario'><p>Alvenaria</p></div>	 
			<div class='titulo_7_formulario'><p>Instalações</p></div>
			<div class='titulo_7_formulario'><p>Revestimento interno</p></div>
			
			<div class='item_7_formulario'><input type='text' id='estrutura' name='estrutura' value='$estrutura' class='validate[required] item_7_formulario'/></div>
			<div class='item_7_formulario'><input type='text' id='alvenaria' name='alvenaria' value='$alvenaria' class='validate[required] item_7_formulario'/></div>
			<div class='item_7_formulario'><input type='text' id='instalacao' name='instalacao' value='$instalacao' class='validate[required] item_7_formulario'/></div>
			<div class='item_7_formulario'><input type='text' id='rinterno' name='rinterno' value='$rinterno' class='validate[required] item_7_formulario'/></div>
  			<div class='item_select_ajuda'>
				<img src='../../images/ajuda.png' onclick=\"$.jGrowl('Preencha estes itens com o valor de 0 a 100. Utilize somente números', { header: 'Porcentagem', position:'center', life: 100000});\" />
			</div>
			
	</div>";
	
		echo "<div class='formulario'>
   			
			<div class='titulo_7_formulario'><p>Revestimento externo</p></div>	 
	 		<div class='titulo_7_formulario'><p>Acabamento</p></div>	 
			<div class='titulo_7_formulario'><p>Finalização</p></div>
			<div class='titulo_7_formulario'><p>Pronto para morar</p></div>
			
			<div class='item_7_formulario'><input type='text' id='rexterno' name='rexterno' value='$rexterno' class='validate[required] item_7_formulario'/></div>
			<div class='item_7_formulario'><input type='text' id='acabamento' name='acabamento' value='$acabamento' class='validate[required] item_7_formulario'/></div>
			<div class='item_7_formulario'><input type='text' id='finalizacao' name='finalizacao' value='$finalizacao' class='validate[required] item_7_formulario'/></div>
			<div class='item_7_formulario'><input type='text' id='pronto' name='pronto' value='$pronto' class='validate[required] item_7_formulario'/></div>
			<div class='item_select_ajuda'>
				<img src='../../images/ajuda.png' onclick=\"$.jGrowl('Preencha estes itens com o valor de 0 a 100. Utilize somente números', { header: 'Porcentagem', position:'center', life: 100000});\" />
			</div>
  		
			
	</div>";
	
	echo "<div class='formulario'>		
			<div class='btn_formulario'>
				<input type='image' src='../../images/btn_salvar.png'  value='Enviar' />
         	</div>
			
	</div>";
			
	echo "<div class='navegacao'><p></p></div>";	
	
	
	}else{
		
			echo" <script> window.alert('Você não tem permissão para acessar este item!')</script> 
				<meta HTTP-EQUIV = 'Refresh' CONTENT = '0; URL = ../../home.php'>";
				exit();	
		}
?>                 
</body> 
</html>