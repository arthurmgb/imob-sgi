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
	$banco = 'usuario';
	$path = dirname(__FILE__);
	
	
	
	//proibe o acesso sozinho
	$ref = getenv("HTTP_REFERER");
	$endarquivo = $_SERVER["SCRIPT_FILENAME"];	
	if (!$ref || $ref == $endarquivo){		
			$server = $_SERVER['SERVER_NAME']; 
			$site = "http://" . $server;
			header("Location: $site");	
	}
	
?> <link rel="stylesheet" type="text/css" href="../css/pagina_usuario.css"> <?	


	// Busca no Banco de Dados
	
	if($_GET['acao'] == "alt_"){
		@$sql = "SELECT * FROM $banco WHERE id_usuario='".$_GET['id']."'";
		@$resultado = mysql_query($sql)
		or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
		
		$linha=mysql_fetch_array($resultado);
			 $id = $linha["id_usuario"];	
			 $nome = $linha["nome"];
			 $login = $linha["login"];
			 $email = $linha["email"];
			 $nivel = $linha["nivel"];
			  
	}

	// CADASTRAR 
	if($_GET['acao'] == "cad"){
					
				//Foto
				$dirImg = dirname(__FILE__)."/capa/";			  
				$data = date('dmy').time('His').time();
				$nomeImg = $_FILES['local']['name']; 
				$nomeImg = $data.$nomeImg;   
				move_uploaded_file($_FILES['local']['tmp_name'], $dirImg.$nomeImg);
				list($width, $height) = getimagesize($dirImg.$nomeImg);
				$new_width = 75;
				$new_height = 100;
				$image_g = imagecreatetruecolor($new_width, $new_height);
				$image = imagecreatefromjpeg($dirImg.$nomeImg);
				imagecopyresampled($image_g, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
				imagejpeg($image_g, $dirImg.$nomeImg, 100);
				imagedestroy($image_g);
				
				$nomeImg = "/capa/".$nomeImg;
				// Dados
				
				$senhaNova = md5($_POST['senha']);
						
				$query = "INSERT INTO $banco (id_usuario,nome,login,imagem, senha, email,nivel) VALUES ('null', '".$_POST['nome']."', '".$_POST['login']."', '$nomeImg', '$senhaNova', '".$_POST['email']."', '".$_POST['nivel']."');";
				$result = mysql_query($query);
				if (!$result) {
					echo "ERRO: $query";
				} else {
					require_once "../login/seguranca.php";
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
					<meta HTTP-EQUIV = "Refresh" CONTENT = "0; URL = vis.php">
					<?	
				}
	}

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
				@$sql = "SELECT * FROM $banco WHERE id_usuario='".$_GET['id']."'";
				@$resultado = mysql_query($sql)
				or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
				$linha=mysql_fetch_array($resultado);
				$nomeImg = $linha["imagem"];
				
				$senhaNova = md5($_POST['senha']);
				
				// Atualizando os dados.
				$query = "UPDATE $banco SET nome='".$_POST['nome']."', login='".$_POST['login']."', imagem='$nomeImg', senha='$senhaNova', email='".$_POST['email']."', nivel='".$_POST['nivel']."' WHERE id_usuario='".$_GET['id']."'";				
				
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
						<meta HTTP-EQUIV = "Refresh" CONTENT = "0; URL = vis.php">
						<?	
					}
				
			} else {
				
				//Movendo a imagem
				move_uploaded_file($_FILES['local']['tmp_name'], $dirImg.$nomeImg);
				list($width, $height) = @getimagesize($dirImg.$nomeImg);
				$new_width = 75;
				@$new_height = 100;
				$image_g = @imagecreatetruecolor($new_width, $new_height);
				$image = @imagecreatefromjpeg($dirImg.$nomeImg);
				@imagecopyresampled($image_g, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
				@imagejpeg($image_g, $dirImg.$nomeImg, 100);
				@imagedestroy($image_g);			
				$nomeImg = "/capa/".$nomeImg;
				
				$senhaNova = md5($_POST['senha']);
					
				// Atualizando os dados.
								$query = "UPDATE $banco SET nome='".$_POST['nome']."', login='".$_POST['login']."', imagem='$nomeImg', senha='$senhaNova', email='".$_POST['email']."', nivel='".$_POST['nivel']."' WHERE id_usuario='".$_GET['id']."'";								
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
						<meta HTTP-EQUIV = "Refresh" CONTENT = "0; URL = vis.php">
						<?	
					}
			}
	}

	// EXCLUIR
	if($_GET['acao'] == "exc_"){	
				
				$sql = "SELECT * FROM `$banco` where id_usuario = '$id'";
				$resultado = mysql_query($sql);
				while ($registro=mysql_fetch_array($resultado))
				{													
					If ($registro["imagem"] != ''){
						$arquivo = $path . "/" . $registro["imagem"];	
						@unlink($arquivo);				
					}
				}				
				
				$sql = "delete from `$banco` where id_usuario = '$id'";
				$resultado = mysql_query($sql)
				or die ("Não foi possível realizar a exclusão dos dados.");
				
				require_once "../login/seguranca.php";
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
					<meta HTTP-EQUIV = "Refresh" CONTENT = "0; URL = vis.php">
				<?
				exit();
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
	echo "<div class='btn_pagina'>
			<div class='btn_listar'>
				<a href='vis.php'><p>Listar Usuários</p></a>
			</div>    
		</div>";

	echo "<div class='topo_pagina'>
			<div class='titulo_pagina'> Cadastro de Usuários </div>    
		</div>";
        
			if ($_GET['acao'] == "cad_" or empty($_GET['acao'])){	
				echo "<form id='formcadastro' name='formcadastro' method='POST' action='cad.php?acao=cad' enctype='multipart/form-data'>";
			}
			if($_GET['acao'] == "alt_" or $_GET['acao'] == "alt"){
				echo "<form id='formcadastro' name='formcadastro' method='POST' action='cad.php?acao=alt&id=".$_GET['id']."' enctype='multipart/form-data'>";
			}
				
            
     echo "<div class='formulario'>
			<div class='titulo1_formulario'><p>Nome</p></div>
			<div class='item1_formulario'><input type='text' id='nome' name='nome' value='$nome' class='validate[required] item_normal_formulario'/></div>  
			
			<div class='titulo1_formulario'><p>Login</p></div>
			<div class='item1_formulario'><input type='text' id='login' name='login' value='$login' class='validate[required] item_normal_formulario'/></div> 
			
			<div class='titulo1_formulario'><p>Senha</p></div>
			<div class='item1_formulario'><input type='password' id='senha' name='senha' value='$senha' class='validate[required] item_normal_formulario'/></div> 
			
			<div class='titulo1_formulario'><p>E-mail</p></div>
			<div class='item1_formulario'><input type='text' id='email' name='email' value='$email' class='validate[required,custom[email]] item_normal_formulario'/></div> 
			
			<div class='titulo1_formulario'><p>Foto</p></div>
			<div class='item1_formulario'><input type='file' id='local' name='local' class='item_normal_formulario'/></div>    
			
			<div class='titulo1_formulario'><p>Nivel</p></div>
			<div class='item_select_formulario'>
				<select name='nivel' id='nivel' class='validate[required] item_normal_formulario'>";
                	if($nivel != ''){
						if($nivel == '1'){
							echo"           
								<option value='1' selected='selected'>Administrador</option>                
								<option value='2'>Sub-Administrador</option>                
								<option value='3'>Usuário</option>                                                      
							";
							}elseif($nivel == '2'){
								echo"               
									<option value='1'>Administrador</option>                
									<option value='2' selected='selected'>Sub-Administrador</option>                
									<option value='3'>Usuário</option>                                                     
								";
							}elseif($nivel == '3'){
								echo"              
									<option value='1'>Administrador</option>                
									<option value='2'>Sub-Administrador</option>                
									<option value='3' selected='selected'>Usuário</option>                                                    
								";
							}
						}else{
							echo"              
								<option value='1' selected='selected'>Administrador</option>                
								<option value='2'>Sub-Administrador</option>                
								<option value='3'>Usuário</option>                                                     
							";								
						} 
					echo "</select>
			 </div>
			 			 
			 <div class='item_select_ajuda'>
				<img src='../images/ajuda.png' onclick=\"$.jGrowl('Administrador - Tem permissão total no sistema. <br><br> Sub-Administrador - Tem permissão total no sistema porem não pode incluir/excluir usuários ou informações relacionadas a configuração do sistema. <br> <br> Usuário - Tem permissão apenas de consultar informações não podendo incluir/excluir nenhuma informação.', { header: 'Niveis de usuários', position:'center', life: 100000});\" />
         	</div>
		
			<div class='btn_formulario'>
				<input type='image' src='../images/btn_salvar.png'  value='Enviar' />
         	</div>
			
			
		</div>";
			
	echo "<div class='navegacao'><p></p></div>";	
?>                 
</body> 
</html>