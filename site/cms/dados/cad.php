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
	$banco = 'dados_imobiliaria';
	$path = dirname(__FILE__);
	
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
			 $nome = $linha["nome"];	
			 $slogan = $linha["slogan"];
			 $telefone1 = $linha["telefone1"];
			 $telefone2 = $linha["telefone2"];
			 $email = $linha["email"];
			 $creci = $linha["creci"];
			 $endereco = $linha["endereco"];
			 $bairro = $linha["bairro"];
			 $cidade = $linha["cidade"];
			 $estado = $linha["estado"];
			 $cep = $linha["cep"];
			 $logo_grande = $linha["logo_grande"];		  


	// ALTERAR
	if($_GET['acao'] == "alt"){
				
				//Foto
				//Diretorio onde serao salvas as imagens
				  $dirImg = dirname(__FILE__)."/capa/";
				  $data = date('dmy').time('His').time();
				  $nomeImg = $_FILES['local']['name']; 
				  $nomeImg = $data.$nomeImg;   
	
			If( $nomeImg == $data){
				
				// Buscando a imagem antiga
				@$sql = "SELECT * FROM $banco";
				@$resultado = mysql_query($sql)
				or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
				$linha=mysql_fetch_array($resultado);
				$nomeImg = $linha["logo_grande"];
				
				$senhaNova = md5($_POST['senha']);
				
				// Atualizando os dados.
				$query = "UPDATE $banco SET nome = '".$_POST["nome"]."', slogan = '".$_POST["slogan"]."', telefone1 = '".$_POST["telefone1"]."', telefone2 = '".$_POST["telefone2"]."', email = '".$_POST["email"]."', creci = '".$_POST["creci"]."', endereco = '".$_POST["endereco"]."', bairro = '".$_POST["bairro"]."', cidade = '".$_POST["cidade"]."', estado = '".$_POST["estado"]."', cep = '".$_POST["cep"]."', logo_grande = '$nomeImg'";
				
				@$resultado = mysql_query($query);
				if (!$resultado) {
						echo "ERRO1: $query";
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
				
			} else {
				
				//Movendo a imagem
				move_uploaded_file($_FILES['local']['tmp_name'], $dirImg.$nomeImg);
				list($width, $height) = @getimagesize($dirImg.$nomeImg);
				$new_width = 260;
				@$new_height = 100;
				$image_g = @imagecreatetruecolor($new_width, $new_height);
				$image = @imagecreatefromjpeg($dirImg.$nomeImg);
				@imagecopyresampled($image_g, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
				@imagejpeg($image_g, $dirImg.$nomeImg, 100);
				@imagedestroy($image_g);			
				$nomeImg = "/capa/".$nomeImg;
				
				$senhaNova = md5($_POST['senha']);
					
				// Atualizando os dados.
								$query = "UPDATE $banco SET nome = '".$_POST["nome"]."', slogan = '".$_POST["slogan"]."', telefone1 = '".$_POST["telefone1"]."', telefone2 = '".$_POST["telefone2"]."',email = '".$_POST["email"]."', creci = '".$_POST["creci"]."', endereco = '".$_POST["endereco"]."', bairro = '".$_POST["bairro"]."', cidade = '".$_POST["cidade"]."', estado = '".$_POST["estado"]."', cep = '".$_POST["cep"]."', logo_grande = '$nomeImg'";								
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
			<div class='titulo_pagina'> Dados da Imobiliária</div>    
		</div>";
        
	echo "<form id='formcadastro' name='formcadastro' method='POST' action='cad.php?acao=alt' enctype='multipart/form-data'>";

				
            
     echo "<div class='formulario'>
			<div class='titulo1_formulario'><p>Nome</p></div>
			<div class='item1_formulario'><input type='text' id='nome' name='nome' value='$nome' class='validate[required] item1_formulario'/></div>  
			
			<div class='titulo1_formulario'><p>Slogan</p></div>
			<div class='item1_formulario'><input type='text' id='slogan' name='slogan' value='$slogan' class='validate[required] item1_formulario'/></div> 
			
			<div class='titulo2_formulario'><p>Telefone Principal</p></div>			
			<div class='titulo2_formulario'><p>Telefone 2</p></div>		
			
			<div class='item2_formulario'><input type='text' id='telefone1' name='telefone1' value='$telefone1' class='validate[required] item2_formulario'/></div> 
			<div class='item2_formulario'><input type='text' id='telefone2' name='telefone2' value='$telefone2' class='item2_formulario'/></div>
			
			<div class='titulo1_formulario'><p>E-mail</p></div>
			<div class='item1_formulario'><input type='text' id='email' name='email' value='$email' class='validate[required,custom[email]] item1_formulario'/></div> 
			
			<div class='titulo3_formulario'><p>Creci</p></div>
			<div class='item3_formulario'><input type='text' id='creci' name='creci' value='$creci' class='item3_formulario'/></div> 
			
			<div class='item_select_ajuda'>
				<img src='../images/ajuda.png' onclick=\"$.jGrowl('Este item deve ser preenchido caso o site seja de um corretor', { header: 'Dados', position:'center', life: 100000});\" />
         	</div>
			
			<div class='titulo1_formulario'><p>Endereço</p></div>
			<div class='item1_formulario'><input type='text' id='endereco' name='endereco' value='$endereco' class='validate[required] item1_formulario'/></div> 
			
			<div class='titulo1_formulario'><p>Bairro</p></div>
			<div class='item1_formulario'><input type='text' id='bairro' name='bairro' value='$bairro' class='validate[required] item1_formulario'/></div> 
			
			<div class='titulo1_formulario'><p>Cidade</p></div>
			<div class='item1_formulario'><input type='text' id='cidade' name='cidade' value='$cidade' class='validate[required] item1_formulario'/></div> 
			
			<div class='titulo1_formulario'><p>Estado</p></div>
			<div class='item1_formulario'><input type='text' id='estado' name='estado' value='$estado' class='validate[required] item1_formulario'/></div> 
			
			<div class='titulo1_formulario'><p>Cep</p></div>
			<div class='item1_formulario'><input type='text' id='cep' name='cep' value='$cep' class='item1_formulario'/></div> 			
			
			<div class='titulo1_formulario'><p>Logo</p></div>
			<div class='item3_formulario'><input type='file' id='local' name='local' class='item3_formulario'/></div>    
				
			<div class='item_select_ajuda'>
				<img src='../images/ajuda.png' onclick=\"$.jGrowl('Este item deve ser preenchido com a logo que sera mostrada no site', { header: 'Dados', position:'center', life: 100000});\" />
         	</div>
					 			 
			 
		
			<div class='btn_formulario'>
				<input type='image' src='../images/btn_salvar.png'  value='Enviar' />
         	</div>
			
			
		</div>";
			
	echo "<div class='navegacao'><p></p></div>";	
?>                 
</body> 
</html>