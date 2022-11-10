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
				$banco = "imovel_galeria";
				header("Content-Type: text/html; charset=utf-8",true); 
				include "../../config.php";
				$path = "../cad.php";
				$path = dirname($path);	
				
				$id = $_GET["idimg"];
				
			require_once "../../login/seguranca.php";
			$dados = $_SESSION["dados"];
			if ($dados["nivel"] == '1' || $dados["nivel"] == '2'){	
				
						
			$sql = "SELECT * FROM `$banco` where id = '$id'";
			$resultado = mysql_query($sql);
			while ($registro=mysql_fetch_array($resultado))
			{
				$idnotcicia = $registro["id_imovel"];					
				If ($registro["thumb"] != '' || $registro["imagem"] != ''){
					$arquivop = $path . $registro["thumb"];
					$arquivog = $path . $registro["imagem"];	
					unlink($arquivop);	
					unlink($arquivog);				
				}
			}				
			
			$sql = "delete from `$banco` where id = '$id'";
			$resultado = mysql_query($sql)
			or die ("Não foi possível realizar a exclusão dos dados.");
			
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
				<meta HTTP-EQUIV = "Refresh" CONTENT = "0; URL = visimg.php?id=<? echo $idnotcicia ?>">
			<?
			exit();
			
			
			}else{
		
			echo" <script> window.alert('Você não tem permissão para acessar este item!')</script> 
				<meta HTTP-EQUIV = 'Refresh' CONTENT = '0; URL = ../../home.php'>";
				exit();	
		}
?>