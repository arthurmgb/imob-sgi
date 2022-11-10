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
	$banco = 'chat';	
	
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
	
?> <link rel="stylesheet" type="text/css" href="../css/pagina_chat.css"> <?	


	// Busca no Banco de Dados
	
		@$sql = "SELECT * FROM $banco";
		@$resultado = mysql_query($sql)
		or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
		
		$linha=mysql_fetch_array($resultado);
			 $codigochat = $linha["codigochat"];				  

	// ALTERAR
	if($_GET['acao'] == "alt"){
				
	$query = "UPDATE $banco SET codigochat='".$_POST['codigochat']."'";								
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
			<div class='titulo_pagina'>Configurar Chat</div>    
		</div>";
        
	echo "<form id='formcadastro' name='formcadastro' method='POST' action='cad.php?acao=alt' enctype='multipart/form-data'>";		
	
	 echo "<div class='formulario'>
	 
			<div class='titulo1_formulario'><p>CONFIGURANDO CHAT MSN</p><br>
			
			<p>Para ter atendimento online em seu site é necessário uma conta no MSN. Para se cadastrar acesse o link: http://www.hotmail.com. Após o cadastro siga os passos abaixo.</p><br>	
			
			
			<p>1 - Acesse o site http://settings.messenger.live.com/applications/WebSettings.aspx</p><br>

			<p>2 - Faça o login com o seu Passport</p><br>
			
			<p>3 - Marque o checkbox \"permitir que as pessoas vejam o seu status do Messenger em sites e enviem mensagens para você\". Se essa opção não for marcada, seu status será sempre OFFLINE.</p><br>
			
			<p>4 - Clique em Salvar</p><br>
			
			<p>5 - Clique na guia Criar HTML e escolha suas preferências visuais e funcionais.</p><br>
			
			<p>6 - Copie o HTML que será gerado e cole no campo logo abaixo e depois clique em Salvar Informações.</p><br>	</div>					
					
		</div>";
            
     echo "<div class='formulario'>
	 
			<div class='titulo1_formulario'><p>Código do Chat</p></div>
			<div class='item1_formulario'><input type='text' id='codigochat' name='codigochat' value='$codigochat' class='validate[required] item_normal_formulario'/></div>  
			 			 
			 <div class='item_select_ajuda'>
				<img src='../images/ajuda.png' onclick=\"$.jGrowl('Siga os passos acima para configurar o chat de seu site.', { header: 'Chat', position:'center', life: 100000});\" />
         	</div>
		
			<div class='btn_formulario'>
				<input type='image' src='../images/btn_salvar.png'  value='Enviar' />
         	</div>
			
			
		</div>";
			
	echo "<div class='navegacao'><p></p></div>";	
?>                 
</body> 
</html>