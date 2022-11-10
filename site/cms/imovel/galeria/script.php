<?php
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
	
	$id = $_GET["id"];
	
$conn = mysql_pconnect($dbserver, $dbuser, $dbpass) or trigger_error(mysql_error(),E_USER_ERROR); 

include('JSON.php');
include('funcoes_red.php');
$result = array();

if (isset($_FILES['photoupload']) )
{	$file = $_FILES['photoupload']['tmp_name'];
	$error = false;
	$size = false;
	if (!is_uploaded_file($file) || ($_FILES['photoupload']['size'] > 2 * 1024 * 1024) )
	{
		$error = 'Fa&ccedil;a upload de arquivos menores que 2Mb!!! ';
	}
	elseif (!$error && !($size = @getimagesize($file) ) )
	{
		$error = 'Fa&ccedil;a o upload apenas de imagens, outros arquivos n&atilde;o s&atilde;o suportados.';
	}
	elseif (!$error && ($size[0] < 25) || ($size[1] < 25))
	{
		$error = 'Fa&ccedil;a o upload de uma imagem maior que 25px.';
	}
	else {

		/* move_uploaded_file($_FILES['photoupload']['tmp_name'], 'upload/'.$_FILES['photoupload']['name']);
		chmod('upload/'.$_FILES['photoupload']['name'], 0777); */

		$tmp_name = $_FILES['photoupload']['tmp_name'];
		$aux_tipo_imagem = $size['mime'];
			//// Definicao de Diretorios / 
            $diretorio = "../fotos/";
            $diretorio_g = "../fotos/g/";
            $diretorio_p = "../fotos/p/";
            ///// certifique que seu diretório tenha permissao para escrita (chmod 0777)
			if(!file_exists($diretorio)) {
                mkdir($diretorio);
            }
            if(!file_exists($diretorio_g)) {
                mkdir($diretorio_g);
            }
            if(!file_exists($diretorio_p)) {
                mkdir($diretorio_p);
            }
            
				// declarar as variaveis para as fotos
				// foto grande
					$ft_nome = "imagem_".date('dmY').time('His').md5(time())."";
					$larg_ft = 740 ;
					$altu_ft = 580;
					sleep(1);
				// foto minuatura
					$tb_nome = "thumb_".date('dmY').time('His').md5(time())."";		
					$larg_tb = 120;
					$altu_tb = 90;
					sleep(1);
				
            if ($aux_tipo_imagem == "image/jpeg") {				
				$nome_foto  = "$ft_nome.jpg";
				$nome_thumb = "$tb_nome.jpg";
                reduz_imagem_jpg($tmp_name, $larg_ft , $altu_ft , $diretorio_g.$nome_foto);
                reduz_imagem_jpg($tmp_name, $larg_tb , $altu_tb , $diretorio_p.$nome_thumb);
            }         
            if ($aux_tipo_imagem == "image/gif") {
                $nome_foto  = "$ft_nome.gif";
                $nome_thumb = "$tb_nome.gif";
                reduz_imagem_gif($tmp_name, $larg_ft , $altu_ft , $diretorio_g.$nome_foto);
                reduz_imagem_gif($tmp_name, $larg_tb , $altu_tb , $diretorio_p.$nome_thumb);
            }
            if ($aux_tipo_imagem == "image/png") {
                $nome_foto  = "$ft_nome.png";
                $nome_thumb = "$tb_nome.png";
                reduz_imagem_png($tmp_name, $larg_ft , $altu_ft , $diretorio_g.$nome_foto);
                reduz_imagem_png($tmp_name, $larg_tb , $altu_tb , $diretorio_p.$nome_thumb);
            }
			// fim do redimensionamento e criacao das miniaturas ... 
	}
	$addr = gethostbyaddr($_SERVER['REMOTE_ADDR']);
 
	$log = fopen('script.log', 'a');
	fputs($log, ($error ? 'FAILED' : 'SUCCESS') . ' - ' . preg_replace('/^[^.]+/', '***', $addr) . ": {$_FILES['photoupload']['name']} - {$_FILES['photoupload']['size']} byte\n" );
	fclose($log);
 
	if ($error) {
		$result['result'] = 'failed';
		$result['error'] = utf8_encode($error);
	}
	
	else
	{
		$result['result'] = 'success';
		$result['size'] = "Imagem Grande ({$nome_foto}) <br> Imagem pequena ({$nome_thumb}). <br> Upload Com Sucesso !!!!";
		// Grava informações no banco
mysql_query("use $dbname");
mysql_query("INSERT INTO $banco (id,id_imovel,imagem,thumb) VALUES ('null', '$id', '/fotos/g/$nome_foto', '/fotos/p/$nome_thumb')");
	}
	
				require_once "../../login/seguranca.php";
				$idusuario_historico = $_SESSION["dados"];
				$dadossql = "INSERT INTO historico ( id ,id_usuario ,acao)VALUES (NULL ,  '".$idusuario_historico["id_usuario"]."', 'cadastrou na tabela $banco')";
				$resultadosql = mysql_query($dadossql);
				if (!$resultadosql) {
					echo "ERRO: $dadossql";
				}
 
}
else
{
	$result['result'] = 'error';
	$result['error'] = 'Arquivo ausente ou erro interno!';
}


			
if (!headers_sent() )
{
	header('Content-type: application/json');
}
 
echo json_encode($result);

?>