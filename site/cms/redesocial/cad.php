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
	$banco = 'redessociais';
	
		require_once "../login/seguranca.php";
		$dados = $_SESSION["dados"];
		if ($dados["nivel"] != '1'){
				echo" <script> window.alert('Você não tem permissão para acessar este item!')</script> 
				<meta HTTP-EQUIV = 'Refresh' CONTENT = '0; URL = ../home.php'>";
		}
		
	//proibe o acesso sozinho
	$ref = getenv("HTTP_REFERER");
	$endarquivo = $_SERVER["SCRIPT_FILENAME"];	
	if ($ref == $endarquivo){		
			$server = $_SERVER['SERVER_NAME']; 
			$site = "http://" . $server;
			header("Location: $site");	
	}
	
?> <link rel="stylesheet" type="text/css" href="../css/pagina_dados.css"> <?	


		@$sql = "SELECT * FROM $banco";
		@$resultado = mysql_query($sql)
		or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
		
		$linha=mysql_fetch_array($resultado);
			 $youtube = $linha["youtube"];	
			 $orkut = $linha["orkut"];
			 $facebook = $linha["facebook"];
			 $twitter = $linha["twitter"];
			 $msn = $linha["msn"];


	// ALTERAR
	if($_GET['acao'] == "alt"){				
					
				// Atualizando os dados.
								$query = "UPDATE $banco SET msn = '".$_POST["msn"]."', youtube = '".$_POST["youtube"]."', twitter = '".$_POST["twitter"]."', facebook = '".$_POST["facebook"]."',orkut = '".$_POST["orkut"]."'";								
				@$resultado = mysql_query($query);
				if (!$resultado) {
						echo "ERRO2: $query";
					} else {
						require_once "../login/seguranca.php";
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
<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="../js/jquery-1.4.2.js"  type="text/javascript"></script>
<script src="../js/jquery.validationEngine-pt.js" type="text/javascript"></script>
<script src="../js/jquery.validationEngine.js" type="text/javascript"></script>		
				
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
	<script src="../js/jquery.jgrowl.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/jquery.jgrowl.css"/>
<!-- Ajuda -->
    
	</head>
<?


	echo "<div class='topo_pagina'>
			<div class='titulo_pagina'>Redes Sociais</div>    
		</div>";
        
	echo "<form id='formcadastro' name='formcadastro' method='POST' action='cad.php?acao=alt' enctype='multipart/form-data'>";

				
            
     echo "<div class='formulario'>
			<div class='titulo1_formulario'><p>Facebook</p></div>
			<div class='item1_formulario'><input type='text' id='facebook' name='facebook' value='$facebook' class=' item1_formulario'/></div>  
			
			<div class='titulo1_formulario'><p>Orkut</p></div>
			<div class='item1_formulario'><input type='text' id='orkut' name='orkut' value='$orkut' class=' item1_formulario'/></div>
			
			<div class='titulo1_formulario'><p>Twitter</p></div>
			<div class='item1_formulario'><input type='text' id='twitter' name='twitter' value='$twitter' class='item1_formulario'/></div>
			
			<div class='titulo1_formulario'><p>Youtube</p></div>
			<div class='item1_formulario'><input type='text' id='youtube' name='youtube' value='$youtube' class='item1_formulario'/></div>
			
			<div class='titulo1_formulario'><p>Msn</p></div>
			<div class='item1_formulario'><input type='text' id='msn' name='msn' value='$msn' class='item1_formulario'/></div>
					 			 
			 
		
			<div class='btn_formulario'>
				<input type='image' src='../images/btn_salvar.png'  value='Enviar' />
         	</div>
			
			
		</div>";
			
	echo "<div class='navegacao'><p></p></div>";	
?>                 
</body> 
</html>