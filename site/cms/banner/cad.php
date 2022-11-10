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
	$banco = 'banner';
	$path = dirname(__FILE__);
	
		require_once "../login/seguranca.php";
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
	
?> <link rel="stylesheet" type="text/css" href="../css/pagina_usuario.css"> <?	
	
// Busca no Banco de Dados

if($_GET['acao'] == "alt_"){
	@$sql = "SELECT * FROM $banco WHERE id='".$_GET['id']."'";
	@$resultado = mysql_query($sql)
	or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
	
	$linha=mysql_fetch_array($resultado);
		  $id = $linha["id"];	
		  $nome = $linha["nome"];
		  $imagem = $linha["imagem"];
		  $url = $linha["url"];	
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
            $new_width = 830;
            $new_height = 330;
            $image_g = imagecreatetruecolor($new_width, $new_height);
            $image = imagecreatefromjpeg($dirImg.$nomeImg);
            imagecopyresampled($image_g, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagejpeg($image_g, $dirImg.$nomeImg, 100);
            imagedestroy($image_g);
            
			$nomeImg = "/capa/".$nomeImg;
			// Dados
					
			$query = "INSERT INTO $banco (id,nome,imagem,url) VALUES ('null', '".$_POST['nome']."', '$nomeImg', '".$_POST['url']."');";
			$result = mysql_query($query);
			if (!$result) {
			    echo "ERRO: $query";
			} else {
				$caminhovis = $path_parts['dirname'];
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
			@$sql = "SELECT * FROM $banco WHERE id='".$_GET['id']."'";
			@$resultado = mysql_query($sql)
			or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
			$linha=mysql_fetch_array($resultado);
			$nomeImg = $linha["imagem"];
					
			// Atualizando os dados.
			$query = "UPDATE $banco SET nome='".$_POST['nome']."', imagem='$nomeImg', url='".$_POST['url']."' WHERE id='".$_GET['id']."'";				
			
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
            $new_width = 830;
            @$new_height = 330;
            $image_g = @imagecreatetruecolor($new_width, $new_height);
            $image = @imagecreatefromjpeg($dirImg.$nomeImg);
            @imagecopyresampled($image_g, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            @imagejpeg($image_g, $dirImg.$nomeImg, 100);
            @imagedestroy($image_g);			
			$nomeImg = "/capa/".$nomeImg;
				
			// Atualizando os dados.
			$query = "UPDATE $banco SET nome='".$_POST['nome']."', imagem='$nomeImg', url='".$_POST['url']."' WHERE id='".$_GET['id']."'";				
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
			
			$sql = "SELECT * FROM `$banco` where id = '$id'";
			$resultado = mysql_query($sql);
			while ($registro=mysql_fetch_array($resultado))
			{													
				If ($registro["imagem"] != ''){
					$arquivo = $path . "/" . $registro["imagem"];	
					@unlink($arquivo);				
				}
			}				
			
			$sql = "delete from `$banco` where id = '$id'";
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
<link rel="stylesheet" type="text/css" href="../css/pagina_banner.css">
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
				<a href='vis.php'><p>Listar Banners</p></a>
			</div>    
		</div>";

	echo "<div class='topo_pagina'>
			<div class='titulo_pagina'> Cadastro de Banner </div>    
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
			
			<div class='titulo1_formulario'><p>Imagem</p></div>
			<div class='item1_formulario'><input type='file' id='local' name='local' class='item_normal_formulario'/></div>
			
			<div class='titulo1_formulario'><p>Link</p></div>
			<div class='item2_formulario'><input type='text' id='url' name='url' value='$url' class='validate[required] item_normal_formulario'/></div> 
			 			 
			 <div class='item_ajuda'>
				<img src='../images/ajuda.png' onclick=\"$.jGrowl('Você devera informar o endereço que será mostrado ao clicar no banner (Ex.: http://www.nomedosite.com.br/link.php). <br><br> Caso não tenha nenhum endereço a ser vinculado ao banner preencha este campo com #', { header: 'Link', position:'center', life: 100000});\" />
         	</div>
		
			<div class='btn_formulario'>
				<input type='image' src='../images/btn_salvar.png'  value='Enviar' />
         	</div>
			
			
		</div>";
			
	echo "<div class='navegacao'><p></p></div>";
	

		}else{
		
			echo" <script> window.alert('Você não tem permissão para acessar este item!')</script> 
				<meta HTTP-EQUIV = 'Refresh' CONTENT = '0; URL = ../home.php'>";
				exit();	
		}
?>                         
        
        
         
</body>
</html>