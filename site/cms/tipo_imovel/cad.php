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
	$banco = 'tipo_imovel';
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
	
?> <link rel="stylesheet" type="text/css" href="../css/pagina_tipoimovel.css"> <?	



// Busca no Banco de Dados

if($_GET['acao'] == "alt_"){
	@$sql = "SELECT * FROM $banco WHERE id='".$_GET['id']."'";
	@$resultado = mysql_query($sql)
	or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
	
	$linha=mysql_fetch_array($resultado);
		  $id = $linha["id"];	
		  $nome = $linha["nome"];
}

// CADASTRAR 
if($_GET['acao'] == "cad"){
					
			$query = "INSERT INTO $banco (id,nome ) VALUES ('null','".$_POST['nome']."');";
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
				
			// Atualizando os dados.
			$query = "UPDATE $banco SET nome='".$_POST['nome']."' WHERE id='".$_GET['id']."'";
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

// EXCLUIR
if($_GET['acao'] == "exc_"){	
				
			$sql = "delete from `$banco` where id = '".$_GET['id']."'";
			$resultado = mysql_query($sql)
			or die ("Não foi possível realizar a exclusão dos dados.".$sql);
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
				<a href='vis.php'><p>Listar Tipos</p></a>
			</div>    
		</div>";

	echo "<div class='topo_pagina'>
			<div class='titulo_pagina'> Cadastro de Tipos </div>    
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