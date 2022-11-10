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
	$banco = 'google_webmaster';	
	
		require_once "../../login/seguranca.php";
		$dados = $_SESSION["dados"];
		if ($dados["nivel"] != '1'){
				echo" <script> window.alert('Você não tem permissão para acessar este item!')</script> 
				<meta HTTP-EQUIV = 'Refresh' CONTENT = '0; URL = ../../home.php'>";
		}
	
	//proibe o acesso sozinho
	$ref = getenv("HTTP_REFERER");
	$endarquivo = $_SERVER["SCRIPT_FILENAME"];	
	if ($ref == $endarquivo){		
			$server = $_SERVER['SERVER_NAME']; 
			$site = "http://" . $server;
			header("Location: $site");	
	}
	
?> <link rel="stylesheet" type="text/css" href="../../css/pagina_google.css"> <?	


	// Busca no Banco de Dados
	
		@$sql = "SELECT * FROM $banco";
		@$resultado = mysql_query($sql)
		or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
		
		$linha=mysql_fetch_array($resultado);
			 $metatag = $linha["metatag"];				  

	// ALTERAR
	if($_GET['acao'] == "alt"){
				
	$query = "UPDATE $banco SET metatag='".$_POST['metatag']."'";								
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
						<meta HTTP-EQUIV = "Refresh" CONTENT = "0; URL = cad.php">
						<?	
					}
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
			<div class='titulo_pagina'>Google para WebMasters</div>    
		</div>";
        
	echo "<form id='formcadastro' name='formcadastro' method='POST' action='cad.php?acao=alt' enctype='multipart/form-data'>";		
	
	 echo "<div class='formulario'>
	 
			<div class='titulo1_formulario'><p>ADICIONANDO SEU SITE NO GOOGLE</p><br>
										<p>Cadastre-se no google para webmaster, http://www.google.com/webmasters/sitemaps/?hl=pt-BR se tiver gmail, orkut ou qualquer outro serviço google só informar seu login e senha</p><br></div>

			<div class='titulo1_formulario'>
				<p>1 - Clique em Adicionar um site e digite o URL do site que deseja adicionar</p><br>

				<p>2 - Clique em Continuar. A página Verificação de site é exibida.</p><br>

				<p>3 - SELECIONE A OPÇÃO: Adicionar uma metatag à página inicial do seu site</p><br>

				<p>4 - Copie o código e insera no campo logo abaixo</p><br>
				
				<p>5 - Clique em Salvar Informação</p></div>			
		</div>";	
            
     echo "<div class='formulario'>
	 
			<div class='titulo1_formulario'><p>Metatag</p></div>
			<div class='item1_formulario'><input type='text' id='metatag' name='metatag' value='$metatag' class='validate[required] item_normal_formulario'/></div>  
			 			 
			 <div class='item_select_ajuda'>
				<img src='../../images/ajuda.png' onclick=\"$.jGrowl('Siga os passos acima para cadastrar seu site no google Caso tenha alguma dúvida acesse http://www.google.com/support/webmasters/?hl=pt-BR.', { header: 'Google', position:'center', life: 100000});\" />
         	</div>
		
			<div class='btn_formulario'>
				<input type='image' src='../../images/btn_salvar.png'  value='Enviar' />
         	</div>
			
			
		</div>";
		
		
	echo "<div class='formulario'>
		<div class='titulo1_formulario'><p>INFORMANDO SEU SITEMAP AO GOOGLE</p><br>
				<p>Depois de cadastrar e verificar seu site, o próximo passo é adicionar o sitemaps ao google, siga os passos abaixo</p><br>
				
				<p>1 - Clique no nome do seu site</p><br>
				
				<p>2 - No menu lateral esquerdo tem a opção configuração do site</p><br>
				
				<p>3 - Clique em Sitemaps</p><br>
				
				<p>4 - Clique em Enviar um Sitemap</p><br>
				
				<p>5 - Informe o nome sitemap.xml, depois clique em Enviar Sitemap</p></div>
				
		</div>";
			
	echo "<div class='navegacao'><p></p></div>";	
?>                 
</body> 
</html>