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

	
// CADASTRAR 
if($_GET['acao'] == "cad"){
					
			$query = "INSERT INTO $banco (id,id_imovel,video ) VALUES ('null','$id_imovel', '".$_POST['video']."');";
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
		        <meta HTTP-EQUIV = "Refresh" CONTENT = "0; URL = vis.php?id_imovel=<? echo $id_imovel ?>">
				<?	
			}
}

// ALTERAR
if($_GET['acao'] == "alt"){
				
			// Atualizando os dados.
			$query = "UPDATE $banco SET id_imovel='$id_imovel', video='".$_POST['video']."' WHERE id='".$_GET['id']."'";
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
			        <meta HTTP-EQUIV = "Refresh" CONTENT = "0; URL = vis.php?id_imovel=<? echo $id_imovel ?>">
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
				<meta HTTP-EQUIV = "Refresh" CONTENT = "0; URL = vis.php?id_imovel=<? echo $id_imovel ?>">
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
	echo "<div class='btn_pagina'>
			<div class='btn_listar'>
				<a href='vis.php?id_imovel=$id_imovel'><p>Listar Video</p></a>
			</div>    
		</div>";

	echo "<div class='topo_pagina'>
			<div class='titulo_pagina'> Cadastro de Videos </div>    
		</div>";
        
			
	 echo "<form id='formcadastro' name='formcadastro' method='POST' action='cad.php?acao=cad&id_imovel=$id_imovel' enctype='multipart/form-data'>";
			
            
     echo "<div class='formulario'>
	 		<div class='titulo_5_formulario'><p>Código do video</p></div>	 	
			<div class='item_5_formulario'>
				<textarea rows='17' name='video' id='video' cols='80' class='validate[required] item_5_formulario'>$video</textarea>
			</div>	
			<div class='item_select_ajuda'>
				<img src='../../images/ajuda.png' onclick=\"$.jGrowl('Preencha este item com o código gerado no youtube.', { header: 'Video', position:'center', life: 100000});\" />
         	</div>		
		
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