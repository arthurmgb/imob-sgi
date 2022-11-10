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

	$banco = 'imoveis';

	$bancogaleria = 'imoveisgaleria';

	$bancovideo = 'imoveisvideo';

	$bancoplantas = 'imoveisplantas';

	$bancoacompanhe = 'imoveisacompanhe';

	$bancotipoimovel = 'tipo_imovel';

	$bancoestado = 'estados';

	$bancocidade = 'cidades';

	$bancobairro = 'bairros';

	$bancotiponegocio = 'tipo_negocio';

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

	

?> <link rel="stylesheet" type="text/css" href="../css/pagina_imovel.css"> <?



// Busca no Banco de Dados

if($_GET['acao'] == "alt_"){

	@$sql = "SELECT * FROM $banco WHERE id='".$_GET['id']."'";

	@$resultado = mysql_query($sql)

	or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");

	

	$linha=mysql_fetch_array($resultado);

		  $id = $linha["id"];	

		  $id_estado = $linha["id_estado"];

		  $id_cidade = $linha["id_cidade"];

		  $id_bairro = $linha["id_bairro"];

		  $id_tipo_imovel = $linha["id_tipo_imovel"];

		  $id_tipo_negocio = $linha["id_tipo_negocio"];

		  $nome = $linha["nome"];

		  $area_total = $linha["area_total"];

		  $estagio_obra = $linha["estagio_obra"];

		  $area_construida = $linha["area_construida"];

		  $area_lazer = $linha["area_lazer"];

		  $quartos = $linha["quartos"];

		  $salas = $linha["salas"];

		  $vagas_garagem = $linha["vagas_garagem"];

		  $elevadores = $linha["elevadores"];

		  $andares = $linha["andares"];

		  $unidades_por_andar = $linha["unidades_por_andar"];

		  $banheiro = $linha["banheiro"];

		  $endereco = $linha["endereco"];

		  $numero = $linha["numero"];

		  $complemento = $linha["complemento"];

		  $cep = $linha["cep"];

		  $descricao_resum = $linha["descricao_resum"];

		  $descricao = $linha["descricao"];

		  $foto = $linha["foto"];

		  $cod_imob = $linha["cod_imob"];

		  $status = $linha["status"];

		  $destaque = $linha["destaque"];	

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

            $new_width = 120;

            $new_height = 120;

            $image_g = imagecreatetruecolor($new_width, $new_height);

            $image = imagecreatefromjpeg($dirImg.$nomeImg);

            imagecopyresampled($image_g, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

            imagejpeg($image_g, $dirImg.$nomeImg, 100);

            imagedestroy($image_g);

            

			$nomeImg = "/capa/".$nomeImg;

			// Dados

					

			$query = "INSERT INTO $banco (id,id_estado,id_cidade,id_bairro,id_tipo_imovel, id_tipo_negocio, nome, estagio_obra, area_total, area_construida, area_lazer, quartos, salas, vagas_garagem, elevadores, andares, unidades_por_andar,  banheiro, endereco, numero, complemento, cep, descricao_resum, descricao, foto, cod_imob, status, destaque ) VALUES ('null','".$_POST['id_estado']."', '".$_POST['id_cidade']."', '".$_POST['id_bairro']."', '".$_POST['id_tipo_imovel']."', '".$_POST['id_tipo_negocio']."', '".$_POST['nome']."', '".$_POST['estagio_obra']."', '".$_POST['area_total']."', '".$_POST['area_construida']."', '".$_POST['area_lazer']."', '".$_POST['quartos']."', '".$_POST['salas']."', '".$_POST['vagas_garagem']."', '".$_POST['elevadores']."', '".$_POST['andares']."', '".$_POST['unidades_por_andar']."', '".$_POST['banheiro']."', '".$_POST['endereco']."', '".$_POST['numero']."', '".$_POST['complemento']."', '".$_POST['cep']."', '".$_POST['descricao_resum']."', '".$_POST['descricao']."', '$nomeImg', '".$_POST['cod_imob']."', '".$_POST['status']."','".$_POST['destaque']."');";

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

			@$sql = "SELECT * FROM $banco WHERE id='".$_GET['id']."'";

			@$resultado = mysql_query($sql)

			or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");

			$linha=mysql_fetch_array($resultado);

			$nomeImg = $linha["foto"];

					

			// Atualizando os dados.

			$query = "UPDATE $banco SET id_estado='".$_POST['id_estado']."', id_cidade='".$_POST['id_cidade']."', id_bairro='".$_POST['id_bairro']."', id_tipo_imovel='".$_POST['id_tipo_imovel']."' ,id_tipo_negocio='".$_POST['id_tipo_negocio']."', nome='".$_POST['nome']."', estagio_obra='".$_POST['estagio_obra']."', area_total='".$_POST['area_total']."', area_construida='".$_POST['area_construida']."', area_lazer='".$_POST['area_lazer']."', quartos='".$_POST['quartos']."', salas='".$_POST['salas']."', vagas_garagem='".$_POST['vagas_garagem']."', elevadores='".$_POST['elevadores']."', andares='".$_POST['andares']."', unidades_por_andar='".$_POST['unidades_por_andar']."', banheiro='".$_POST['banheiro']."', endereco='".$_POST['endereco']."', numero='".$_POST['numero']."', complemento='".$_POST['complemento']."', cep='".$_POST['cep']."', descricao_resum='".$_POST['descricao_resum']."', descricao='".$_POST['descricao']."', foto='$nomeImg', cod_imob='".$_POST['cod_imob']."', status='".$_POST['status']."', destaque='".$_POST['destaque']."' WHERE id='".$_GET['id']."'";

				

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

            $new_width = 120;

            @$new_height = 120;

            $image_g = @imagecreatetruecolor($new_width, $new_height);

            $image = @imagecreatefromjpeg($dirImg.$nomeImg);

            @imagecopyresampled($image_g, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

            @imagejpeg($image_g, $dirImg.$nomeImg, 100);

            @imagedestroy($image_g);			

			$nomeImg = "/capa/".$nomeImg;

				

			// Atualizando os dados.

			$query = "UPDATE $banco SET id_estado='".$_POST['id_estado']."', id_cidade='".$_POST['id_cidade']."', id_bairro='".$_POST['id_bairro']."', id_tipo_imovel='".$_POST['id_tipo_imovel']."', id_tipo_negocio='".$_POST['id_tipo_negocio']."', nome='".$_POST['nome']."', estagio_obra='".$_POST['estagio_obra']."', area_total='".$_POST['area_total']."', area_construida='".$_POST['area_construida']."', area_lazer='".$_POST['area_lazer']."', quartos='".$_POST['quartos']."', salas='".$_POST['salas']."', vagas_garagem='".$_POST['vagas_garagem']."', elevadores='".$_POST['elevadores']."', andares='".$_POST['andares']."', unidades_por_andar='".$_POST['unidades_por_andar']."', banheiro='".$_POST['banheiro']."', endereco='".$_POST['endereco']."', numero='".$_POST['numero']."', complemento='".$_POST['complemento']."', cep='".$_POST['cep']."', descricao_resum='".$_POST['descricao_resum']."', descricao='".$_POST['descricao']."', foto='$nomeImg', cod_imob='".$_POST['cod_imob']."', status='".$_POST['status']."', destaque='".$_POST['destaque']."' WHERE id='".$_GET['id']."'";

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

				

			$sql = "SELECT * FROM `$bancogaleria` where id_imovel = '$id'";

			if($resultado = mysql_query($sql)){

				while ($registro=mysql_fetch_array($resultado))

				{

														

					If ($registro["thumb"] != ''){

						$arquivop = $path ."/". $registro["thumb"];

						$arquivog = $path ."/". $registro["imagem"];	

						@unlink($arquivop);	

						@unlink($arquivog);				

					}

				}	

			}

			

			$sql = "SELECT * FROM `$bancoplantas` where id_imovel = '$id'";

			if($resultado = mysql_query($sql)){

				while ($registro=mysql_fetch_array($resultado))

				{													

					If ($registro["thumb"] != ''){

						$arquivop = $path ."/". $registro["thumb"];

						$arquivog = $path ."/". $registro["imagem"];	

						@unlink($arquivop);	

						@unlink($arquivog);				

					}

				}

			}

			

			$sql = "SELECT * FROM `$bancoacompanhe` where id_imovel = '$id'";

			if($resultado = mysql_query($sql)){

				while ($registro=mysql_fetch_array($resultado))

				{													

					If ($registro["thumb"] != ''){

						$arquivop = $path ."/". $registro["thumb"];

						$arquivog = $path ."/". $registro["imagem"];	

						@unlink($arquivop);	

						@unlink($arquivog);				

					}

				}

			}

			$sql = "delete from `$bancogaleria` where id_imovel = '$id'";

			$resultado = mysql_query($sql);

			

			$sql = "delete from `$bancoplantas` where id_imovel = '$id'";

			$resultado = mysql_query($sql);

			

			$sql = "delete from `$bancoacompanhe` where id_imovel = '$id'";

			$resultado = mysql_query($sql);

			

			

			$sql = "SELECT * FROM `$banco` where id = '$id'";

			$resultado = mysql_query($sql);

			while ($registro=mysql_fetch_array($resultado))

			{													

				If ($registro["foto"] != ''){

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



<script type="text/javascript">

		$(function(){

			$('#id_estado').change(function(){

				if( $(this).val() ) {

					$('#id_cidade').hide();

					$('.carregando').show();

					$.getJSON('cidades.ajax.php?search=',{id_estado: $(this).val(), ajax: 'true'}, function(j){

						var options = '<option value=""></option>';	

						for (var i = 0; i < j.length; i++) {

							options += '<option value="' + j[i].id + '">' + j[i].nome + '</option>';

						}	

						$('#id_cidade').html(options).show();

						$('.carregando').hide();

					});

				} else {

					$('#id_cidade').html('<option value="">– Escolha um estado –</option>');

				}

			});

		});

		</script>

        

<script type="text/javascript">

		$(function(){

			$('#id_cidade').change(function(){

				if( $(this).val() ) {

					$('#id_bairro').hide();

					$('.carregando2').show();

					$.getJSON('bairros.ajax.php?search=',{id_cidade: $(this).val(), ajax: 'true'}, function(j){

						var options = '<option value=""></option>';	

						for (var i = 0; i < j.length; i++) {

							options += '<option value="' + j[i].id + '">' + j[i].nome + '</option>';

						}	

						$('#id_bairro').html(options).show();

						$('.carregando2').hide();

					});

				} else {

					$('#id_bairro').html('<option value="">– Escolha uma cidade –</option>');

				}

			});

		});

		</script>

        

        

<!-- Ajuda -->

	<script src="../js/jquery.jgrowl.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/jquery.jgrowl.css"/>

<!-- Ajuda -->



<script type="text/javascript" src="../editor/tiny_mce.js"></script>

<script type="text/javascript">

tinyMCE.init({

        // General options

        mode : "textareas",

        theme : "advanced",

        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template, imagemanager",



        // Theme options

        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontsizeselect,|, cut,copy,paste,pastetext,pasteword, bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,",

        theme_advanced_buttons2 : "",

        theme_advanced_buttons3 : "",

        theme_advanced_toolbar_location : "top",

        theme_advanced_toolbar_align : "left",

        theme_advanced_statusbar_location : "bottom",

        theme_advanced_resizing : false,



        // Skin options

        skin : "o2k7",

        skin_variant : "silver",



        // Replace values for the template plugin

        template_replace_values : {

                username : "Some User",

                staffid : "991234"

        }

});

</script>

    

	</head>

    <body style="overflow-x:hidden;">

<?

	echo "<div class='btn_pagina'>

			<div class='btn_listar'>

				<a href='vis.php'><p>Listar Imóveis</p></a>

			</div>    

		</div>";



	echo "<div class='topo_pagina'>

			<div class='titulo_pagina'> Cadastro de Imóveis </div>    

		</div>";

        

			if ($_GET['acao'] == "cad_" or empty($_GET['acao'])){	

				echo "<form id='formcadastro' name='formcadastro' method='POST' action='cad.php?acao=cad' enctype='multipart/form-data'>";

			}

			if($_GET['acao'] == "alt_" or $_GET['acao'] == "alt"){

				echo "<form id='formcadastro' name='formcadastro' method='POST' action='cad.php?acao=alt&id=".$_GET['id']."' enctype='multipart/form-data'>";

			}

				

 	

  echo "<div class='formulario'>

  		<p class='titulo_principal_formulario'> Dados do imóvel</p>

	 		<div class='titulo_8_formulario'><p>Cod. do imóvel</p></div>	 

			<div class='titulo_2_formulario'><p>Nome</p></div>

			<div class='titulo_2_formulario'><p>Imagem Principal</p></div>

			

			<div class='item_1_formulario'><input type='text' id='cod_imob' name='cod_imob' value='$cod_imob' class='validate[required] item_1_formulario'/></div>

			<div class='item_2_formulario'><input type='text' id='nome' name='nome' value='$nome' class='validate[required] item_2_formulario'/></div>

			<div class='item_2_formulario'><input type='file' id='local' name='local' class='validate[required] item_2_formulario'/></div>   		

			

	</div>

	<br />	

	<div class='formulario'>	

			<div class='titulo_6_formulario'><p>Tipo de Negócio</p></div>	

			<div class='titulo_6_formulario'><p>Tipo de Imóvel</p></div>

			<div class='titulo_6_formulario'><p>Situação do Imóvel</p></div>

			

			

			<div class='item_1_select_formulario'>

				<select name='id_tipo_negocio' id='id_tipo_negocio' class='validate[required] item_2_select_formulario'>

                	<option value=''>  </option>";

                            	 

                    $sql = "SELECT * FROM $bancotiponegocio ORDER BY nome";

                    $res = mysql_query( $sql );

                    	while ( $row = mysql_fetch_assoc( $res ) ) {

							if ($id_tipo_negocio != $row['id']){

								echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';

							}else{

								echo '<option selected="selected" value="'.$row['id'].'" >'.$row['nome'].'</option>';

							}

                        }    	

                           		

					echo "</option></select>

			 </div>

			

			

			<div class='item_1_select_formulario'>

				<select name='id_tipo_imovel' id='id_tipo_imovel' class='validate[required] item_2_select_formulario'>

                	<option value=''>  </option>";

                            	 

                    $sql = "SELECT * FROM $bancotipoimovel ORDER BY nome";

                    $res = mysql_query( $sql );

                    	while ( $row = mysql_fetch_assoc( $res ) ) {

							if ($id_tipo_imovel != $row['id']){

								echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';

							}else{

								echo '<option selected="selected" value="'.$row['id'].'" >'.$row['nome'].'</option>';

							}

                        }    	

                           		

					echo "</option></select>

			 </div>

			 

			<div class='item_1_select_formulario'>

				<select name='estagio_obra' id='estagio_obra' class='item_2_select_formulario'>";

                	if($estagio_obra != ''){

									

							echo" 

								  <option value=''> </option>                

								  <option value='1'"; if($estagio_obra == '1'){ echo"selected='selected'";} echo">Em Construçao</option>                               

								  <option value='3'"; if($estagio_obra == '3'){ echo"selected='selected'";} echo">Lançamento</option>                

								  <option value='4'"; if($estagio_obra == '4'){ echo"selected='selected'";} echo">Pré-Lançamento</option> 

								  <option value='2'"; if($estagio_obra == '2'){ echo"selected='selected'";} echo">Novo</option> 

								  <option value='5'"; if($estagio_obra == '5'){ echo"selected='selected'";} echo">Usado</option>                                      

							";

							

					}else{

						echo"

							  <option value='' selected=''> </option>                

							  <option value='1'>Em Construção</option>                               

							  <option value='3'>Lançamento</option>                

							  <option value='4'>Pré-Lançamento</option>

							  <option value='2'>Novo</option>

							  <option value='2'>Usado</option>                                       

						";								

					} 

					echo "</select>

		 </div>

		 

		  <div class='item_select_ajuda'>

				<img src='../images/ajuda.png' onclick=\"$.jGrowl('Para que seja mostrada a marcação lançamento na página principal você deve selecionar a situação do imóvel como lançamento.', { header: 'Estágio da Obra', position:'center', life: 100000});\" />

         	</div>

			

	 </div>	 

		 

	 <div class='formulario'>

	 	<p class='titulo_principal_formulario'> Características do imóvel</p>

	 		<div class='titulo_1_formulario'><p>Área Total</p></div>	 

			<div class='titulo_1_formulario'><p>Área Construída</p></div>

			<div class='titulo_4_formulario'><p>Área de Laser</p></div>

			<div class='titulo_4_formulario'><p>Nº. de Dormitórios</p></div>

			

			<div class='item_1_formulario'><input type='text' id='area_total' name='area_total' value='$area_total' class='item_1_formulario'/></div>

			<div class='item_select_ajuda'>

				<img src='../images/ajuda.png' onclick=\"$.jGrowl('Neste item deve constar a área total do terreno.', { header: 'Área Total', position:'center', life: 100000});\" />

         	</div>

			

			

			<div class='item_1_formulario'><input type='text' id='area_construida' name='area_construida' value='$area_construida' class='item_2_formulario'/></div>	

			<div class='item_select_ajuda'></div>

			

			<div class='item_1_select_formulario'>

				<select name='area_lazer' id='area_lazer' class='item_2_select_formulario'>";   

                    if($area_lazer != ''){					  

							echo"

								<option value=''>  </option>

								<option value='1'"; if($area_lazer == '1'){ echo"selected='selected'";} echo">Sim</option> 

			                    <option value='2'"; if($area_lazer == '2'){ echo"selected='selected'";} echo">Não</option>                                      

							";

					

					}else{

						echo"

							<option value='' selected='selected'>  </option>

							<option value='1'>Sim</option> 

			                <option value='2'>Não</option>                                      

						";								

					} 

                echo"</select>

			</div>

			

			<div class='item_select_ajuda'>

				<img src='../images/ajuda.png' onclick=\"$.jGrowl('Neste item deve ser seleciona caso o imóvel possua área de laser.', { header: 'Área de Laser', position:'center', life: 100000});\" />

         	</div>

			

				

			<div class='item_1_select_formulario'>

				<select name='quartos' id='quartos' class='item_1_select_formulario'>";

					if($quartos != ''){

							echo" 

								<option value='' ></option>

								<option value='1'"; if($quartos == '1'){ echo"selected='selected'";} echo">1 Dormitório Simple</option> 

								<option value='2'"; if($quartos == '2'){ echo"selected='selected'";} echo">1 Dormitório com Suíte</option>               

								<option value='3'"; if($quartos == '3'){ echo"selected='selected'";} echo">2 Dormitórios Simples</option>                

								<option value='4'"; if($quartos == '4'){ echo"selected='selected'";} echo">2 Dormitórios 1 com Suíte</option>                

								<option value='5'"; if($quartos == '5'){ echo"selected='selected'";} echo">3 Dormitórios Simples</option>                

								<option value='6'"; if($quartos == '6'){ echo"selected='selected'";} echo">3 Dormitórios 1 com Suíte</option>                

								<option value='7'"; if($quartos == '7'){ echo"selected='selected'";} echo">4 Dormitórios Simples</option>                

								<option value='8'"; if($quartos == '8'){ echo"selected='selected'";} echo">4 Dormitórios 1 com Suíte</option>                                      

							";

					}else{

							echo"

								<option value='' selected=''>  </option>                

								<option value='1'>1 Dormitório Simple</option> 

								<option value='2'>1 Dormitório com Suíte</option>               

								<option value='3'>2 Dormitórios Simples</option>                

								<option value='4'>2 Dormitórios 1 com Suíte</option>                

								<option value='5'>3 Dormitórios Simples</option>                

								<option value='6'>3 Dormitórios 1 com Suíte</option>                

								<option value='7'>4 Dormitórios Simples</option>                

								<option value='8'>4 Dormitórios 1 com Suíte</option>                                     

							";								

								}

				

				echo"</select>

			</div>			

	</div>	

	

	

	<div class='formulario'>

	 		<div class='titulo_6_formulario'><p>Nº. de salas</p></div>	 

			<div class='titulo_6_formulario'><p>Vagas na Garagem</p></div>

			<div class='titulo_6_formulario'><p>Nº. de Elevadores</p></div>

				

			<div class='item_1_select_formulario'>

				<select name='salas' id='salas' class='item_2_select_formulario'>";

					if($salas != ''){

							echo" 

								<option value='' ></option>

								<option value='1'"; if($salas == '1'){ echo"selected='selected'";} echo">1 </option> 

								<option value='2'"; if($salas == '2'){ echo"selected='selected'";} echo">2</option>               

								<option value='3'"; if($salas == '3'){ echo"selected='selected'";} echo">3</option>                

								<option value='4'"; if($salas == '4'){ echo"selected='selected'";} echo">4</option>                

								<option value='5'"; if($salas == '5'){ echo"selected='selected'";} echo">5</option>                                                      

							";

					}else{

							echo"

								<option value='' selected=''>  </option>                

								<option value='1'>1</option> 

								<option value='2'>2</option>               

								<option value='3'>3</option>                

								<option value='4'>4</option>                

								<option value='5'>5</option>                                                

							";								

								}

				

				echo"</select>

			</div>	

			

			<div class='item_1_select_formulario'>

				<select name='vagas_garagem' id='vagas_garagem' class='item_2_select_formulario'>";

					if($vagas_garagem != ''){

							echo" 

								<option value='' ></option>

								<option value='1'"; if($vagas_garagem == '1'){ echo"selected='selected'";} echo">1 </option> 

								<option value='2'"; if($vagas_garagem == '2'){ echo"selected='selected'";} echo">2</option>               

								<option value='3'"; if($vagas_garagem == '3'){ echo"selected='selected'";} echo">3</option>                

								<option value='4'"; if($vagas_garagem == '4'){ echo"selected='selected'";} echo">4</option>                

								<option value='5'"; if($vagas_garagem == '5'){ echo"selected='selected'";} echo">5</option>                                                      

							";

					}else{

							echo"

								<option value='' selected=''>  </option>                

								<option value='1'>1</option> 

								<option value='2'>2</option>               

								<option value='3'>3</option>                

								<option value='4'>4</option>                

								<option value='5'>5</option>                                                

							";								

								}

				

				echo"</select>

			</div>		

			

			<div class='item_1_select_formulario'>

				<select name='elevadores' id='elevadores' class='item_2_select_formulario'>";

					if($elevadores != ''){

							echo" 

								<option value='' ></option>

								<option value='1'"; if($elevadores == '1'){ echo"selected='selected'";} echo">1 </option> 

								<option value='2'"; if($elevadores == '2'){ echo"selected='selected'";} echo">2</option>               

								<option value='3'"; if($elevadores == '3'){ echo"selected='selected'";} echo">3</option>                

								<option value='4'"; if($elevadores == '4'){ echo"selected='selected'";} echo">4</option>                

								<option value='5'"; if($elevadores == '5'){ echo"selected='selected'";} echo">5</option>                                                      

							";

					}else{

							echo"

								<option value='' selected=''>  </option>                

								<option value='1'>1</option> 

								<option value='2'>2</option>               

								<option value='3'>3</option>                

								<option value='4'>4</option>                

								<option value='5'>5</option>                                                

							";								

								}

				

				echo"</select>

			</div>	

		</div>	

			

		<div class='formulario'>

	 		<div class='titulo_6_formulario'><p>Nº. de andares</p></div>	 

			<div class='titulo_6_formulario'><p>Unidades por andar</p></div>

			<div class='titulo_6_formulario'><p>Nº. de Banheiros</p></div>

				

			<div class='item_1_select_formulario'>

				<select name='andares' id='andares' class='item_2_select_formulario'>";

					if($andares != ''){

							echo" 

								<option value='' ></option>

								<option value='1'"; if($andares == '1'){ echo"selected='selected'";} echo">1 </option> 

								<option value='2'"; if($andares == '2'){ echo"selected='selected'";} echo">2</option>               

								<option value='3'"; if($andares == '3'){ echo"selected='selected'";} echo">3</option>                

								<option value='4'"; if($andares == '4'){ echo"selected='selected'";} echo">4</option>                

								<option value='5'"; if($andares == '5'){ echo"selected='selected'";} echo">5</option>  

								<option value='1'"; if($andares == '6'){ echo"selected='selected'";} echo">6 </option> 

								<option value='2'"; if($andares == '7'){ echo"selected='selected'";} echo">7</option>               

								<option value='3'"; if($andares == '8'){ echo"selected='selected'";} echo">8</option>                

								<option value='4'"; if($andares == '9'){ echo"selected='selected'";} echo">9</option>                

								<option value='5'"; if($andares == '10'){ echo"selected='selected'";} echo">10</option>  

								<option value='1'"; if($andares == '11'){ echo"selected='selected'";} echo">11</option> 

								<option value='2'"; if($andares == '12'){ echo"selected='selected'";} echo">12</option>               

								<option value='3'"; if($andares == '13'){ echo"selected='selected'";} echo">13</option>                

								<option value='4'"; if($andares == '14'){ echo"selected='selected'";} echo">14</option>                

								<option value='5'"; if($andares == '15'){ echo"selected='selected'";} echo">15</option>  

								<option value='1'"; if($andares == '16'){ echo"selected='selected'";} echo">16</option> 

								<option value='2'"; if($andares == '17'){ echo"selected='selected'";} echo">17</option>               

								<option value='3'"; if($andares == '18'){ echo"selected='selected'";} echo">18</option>                

								<option value='4'"; if($andares == '19'){ echo"selected='selected'";} echo">19</option>                

								<option value='5'"; if($andares == '20'){ echo"selected='selected'";} echo">20</option>  

								<option value='1'"; if($andares == '21'){ echo"selected='selected'";} echo">21</option> 

								<option value='2'"; if($andares == '22'){ echo"selected='selected'";} echo">22</option>               

								<option value='3'"; if($andares == '23'){ echo"selected='selected'";} echo">23</option>                

								<option value='4'"; if($andares == '24'){ echo"selected='selected'";} echo">24</option>                

								<option value='5'"; if($andares == '25'){ echo"selected='selected'";} echo">25</option>  

								<option value='1'"; if($andares == '26'){ echo"selected='selected'";} echo">26</option> 

								<option value='2'"; if($andares == '27'){ echo"selected='selected'";} echo">27</option>               

								<option value='3'"; if($andares == '28'){ echo"selected='selected'";} echo">28</option>                

								<option value='4'"; if($andares == '29'){ echo"selected='selected'";} echo">29</option>                

								<option value='5'"; if($andares == '30'){ echo"selected='selected'";} echo">30</option>                                                       

							";

					}else{

							echo"

								<option value='' selected=''>  </option>                

								<option value='1'>1 </option> 

								<option value='2'>2</option>               

								<option value='3'>3</option>                

								<option value='4'>4</option>                

								<option value='5'>5</option>                

								<option value='6'>6</option>                

								<option value='7'>7</option>                

								<option value='8'>8</option>

								<option value='9'>9</option>                

								<option value='10'>10</option>                

								<option value='11'>11</option>                

								<option value='12'>12</option>                

								<option value='13'>13</option>  

								<option value='14'>14</option>                

								<option value='15'>15</option> 

								<option value='16'>16</option> 

								<option value='17'>17</option>               

								<option value='18'>18</option>                

								<option value='19'>19</option>                

								<option value='20'>20</option>  

								<option value='21'>21</option>                

								<option value='22'>22</option>                

								<option value='23'>23</option>  

								<option value='24'>24</option>                

								<option value='25'>25</option> 

								<option value='26'>26</option> 

								<option value='27'>27</option>               

								<option value='28'>28</option>                

								<option value='29'>29</option>                

								<option value='30'>30</option>                                              

							";								

								}

				

				echo"</select>

			</div>

			

			<div class='item_1_select_formulario'>

				<select name='unidades_por_andar' id='unidades_por_andar' class='item_2_select_formulario'>";

					if($unidades_por_andar != ''){

							echo" 

								<option value='' ></option>

								<option value='1'"; if($unidades_por_andar == '1'){ echo"selected='selected'";} echo">1 </option> 

								<option value='2'"; if($unidades_por_andar == '2'){ echo"selected='selected'";} echo">2</option>               

								<option value='3'"; if($unidades_por_andar == '3'){ echo"selected='selected'";} echo">3</option>                

								<option value='4'"; if($unidades_por_andar == '4'){ echo"selected='selected'";} echo">4</option>                

								<option value='5'"; if($unidades_por_andar == '5'){ echo"selected='selected'";} echo">5</option>                                                      

							";

					}else{

							echo"

								<option value='' selected=''>  </option>                

								<option value='1'>1</option> 

								<option value='2'>2</option>               

								<option value='3'>3</option>                

								<option value='4'>4</option>                

								<option value='5'>5</option>                                                

							";								

								}

				

				echo"</select>

			</div>	

			

			<div class='item_1_select_formulario'>

				<select name='banheiro' id='banheiro' class='item_2_select_formulario'>";

					if($banheiro != ''){

							echo" 

								<option value='' ></option>

								<option value='1'"; if($banheiro == '1'){ echo"selected='selected'";} echo">1 </option> 

								<option value='2'"; if($banheiro == '2'){ echo"selected='selected'";} echo">2 sendo 1 Suíte</option>               

								<option value='3'"; if($banheiro == '3'){ echo"selected='selected'";} echo">2</option>                

								<option value='4'"; if($banheiro == '4'){ echo"selected='selected'";} echo">3 sendo 1 Suíte</option>                

								<option value='5'"; if($banheiro == '5'){ echo"selected='selected'";} echo">3</option> 

								<option value='6'"; if($banheiro == '6'){ echo"selected='selected'";} echo">4 sendo 1 Suíte</option>

								<option value='7'"; if($banheiro == '7'){ echo"selected='selected'";} echo">5</option>

								<option value='8'"; if($banheiro == '8'){ echo"selected='selected'";} echo">5 sendo 1 Suíte</option>

								<option value='9'"; if($banheiro == '9'){ echo"selected='selected'";} echo">1 Suíte</option>

								<option value='10'"; if($banheiro == '10'){ echo"selected='selected'";} echo">2 sendo 2 Suítes</option>

								<option value='11'"; if($banheiro == '11'){ echo"selected='selected'";} echo">3 sendo 2 Suítes</option>

								<option value='12'"; if($banheiro == '12'){ echo"selected='selected'";} echo">4 sendo 2 Suítes</option>

								<option value='13'"; if($banheiro == '13'){ echo"selected='selected'";} echo">5 sendo 2 Suítes</option>

								<option value='14'"; if($banheiro == '14'){ echo"selected='selected'";} echo">3 sendo 3 Suítes</option>

								<option value='15'"; if($banheiro == '15'){ echo"selected='selected'";} echo">4 sendo 3 Suítes</option>

								<option value='16'"; if($banheiro == '16'){ echo"selected='selected'";} echo">5 sendo 3 Suítes</option>

								<option value='17'"; if($banheiro == '17'){ echo"selected='selected'";} echo">4 sendo 4 Suítes</option>

								<option value='18'"; if($banheiro == '18'){ echo"selected='selected'";} echo">5 sendo 4 Suítes</option>

								<option value='19'"; if($banheiro == '19'){ echo"selected='selected'";} echo">5 sendo 5 Suítes</option>

							";

					}else{

							echo"

								<option value='' selected=''>  </option>                

								<option value='1'>1 </option> 

								<option value='2'>2 sendo 1 Suíte</option>               

								<option value='3'>2</option>                

								<option value='4'>3 sendo 1 Suíte</option>                

								<option value='5'>3</option> 

								<option value='6'>4 sendo 1 Suíte</option>

								<option value='7'>5</option>

								<option value='8'>5 sendo 1 Suíte</option>

								<option value='9'>1 Suíte</option>

								<option value='10'>2 sendo 2 Suítes</option>

								<option value='11'>3 sendo 2 Suítes</option>

								<option value='12'>4 sendo 2 Suítes</option>

								<option value='13'>5 sendo 2 Suítes</option>

								<option value='14'>3 sendo 3 Suítes</option>

								<option value='15'>4 sendo 3 Suítes</option>

								<option value='16'>5 sendo 3 Suítes</option>

								<option value='17'>4 sendo 4 Suítes</option>

								<option value='18'>5 sendo 4 Suítes</option>

								<option value='19'>5 sendo 5 Suítes</option>              

							";								

								}

				

				echo"</select>

			</div>

			

	</div>	

			

		<div class='formulario'>

			<p class='titulo_principal_formulario'> Endereço do imóvel</p>

	 		<div class='titulo_6_formulario'><p>Estado</p></div>	 

			<div class='titulo_6_formulario'><p>Cidade</p></div>

			<div class='titulo_6_formulario'><p>Bairro</p></div>

				

			<div class='item_1_select_formulario'>

				<select name='id_estado' id='id_estado' class='validate[required] item_2_select_formulario'>

	                <option value=''>  </option>";	

                        $sql = "SELECT * FROM $bancoestado ORDER BY nome";

                        $res = mysql_query( $sql );

                        while ( $row = mysql_fetch_assoc( $res ) ) {

							if ($id_estado != $row['id']){

								echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';

							}else{

								echo '<option selected="selected" value="'.$row['id'].'" >'.$row['nome'].'</option>';

							}

						}

                         

                    echo "</option></select>                                      

            </select>						

		</div>

		

		<div class='item_1_select_formulario'>";	

                    if($id_cidade != ''){

						echo"<select name='id_cidade' id='id_cidade' class='validate[required] item_2_select_formulario']'>

								<option value=''>-- Escolha um estado --</option>";

                        		$sql = "SELECT * FROM cidades where id_estado = $id_estado ORDER BY nome";

                                $res = mysql_query( $sql );

                                	while ( $row = mysql_fetch_assoc( $res ) ) {

										if ($id_cidade != $row['id']){

											echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';

										}else{

											echo '<option selected="selected" value="'.$row['id'].'" >'.$row['nome'].'</option>';

										}

                                    }

									echo "</option></select></select>";

					}else{

						echo"

							<span class='carregando' style='display:none'>Aguarde, carregando...</span>

							<select name='id_cidade' id='id_cidade' class='validate[required] item_1_select_formulario'>

								<option value=''>-- Escolha um estado --</option>                                      

							</select>

						";

					}

					   				

		echo "</div>

		

		<div class='item_1_select_formulario'>";

			if($id_bairro != ''){

				echo"<select name='id_bairro' id='id_bairro' class='validate[required] item_2_select_formulario'>

					 	<option value=''>-- Escolha uma cidade --</option>";

                        $sql = "SELECT * FROM bairros where id_cidade = $id_cidade ORDER BY nome";

                        $res = mysql_query( $sql );

                        while ( $row = mysql_fetch_assoc( $res ) ) {

							if ($id_bairro != $row['id']){

								echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';

							}else{

								echo '<option selected="selected" value="'.$row['id'].'" >'.$row['nome'].'</option>';

							}

                        }

						echo "</option></select></select>";

			}else{

				echo"

					<span class='carregando' style='display:none'>Aguarde, carregando...</span>

					<select name='id_bairro' id='id_bairro' class='validate[required] item_1_select_formulario'>

					<option value=''>-- Escolha uma cidade --</option>                                      

					</select>

				";

			}							

		echo"</div>

	</div>

	<div class='formulario'>

	 		<div class='titulo_2_formulario'><p>Endereço</p></div>	 

			<div class='titulo_1_formulario'><p>Numero</p></div>

			<div class='titulo_2_formulario'><p>Complemento</p></div>

			

			<div class='item_2_formulario'><input type='text' id='endereco' name='endereco' value='$endereco' class='validate[required] item_2_formulario'/></div>

			<div class='item_1_formulario'><input type='text' id='numero' name='numero' value='$numero' class='validate[required] item_1_formulario'/></div> 

			<div class='item_2_formulario'><input type='text' id='complemento' name='complemento' value='$complemento' class='item_2_formulario'/></div>  

			

	</div> 

	

	<div class='formulario'>

	 		<div class='titulo_5_formulario'><p>Descrição Completa</p></div>	 	

			<div class='item_5_formulario'>

				<textarea rows='17' name='descricao' id='descricao' cols='80' class='validate[required,maxSize[2000]] item_5_formulario'>$descricao</textarea>

			</div>	

			<div class='item_select_ajuda'>

				<img src='../images/ajuda.png' onclick=\"$.jGrowl('Preencha este item com uma descrição completa do imóvel informado itens que não estão no formulário.', { header: 'Descrição Completa', position:'center', life: 100000});\" />

         	</div>		

	</div> 

	

	<div class='formulario'>

		<p class='titulo_principal_formulario'> Configurações do anúncio</p>

			<div class='titulo_3_formulario'><p>Status do anúncio</p></div>	 

			<div class='titulo_3_formulario'><p>Anúncio em destaque</p></div>

			

			<div class='item_2_select_formulario'>

				<select name='status' id='status' class='validate[required] item_2_select_formulario'>";

                	if($estagio_obra != ''){

						echo"

							<option value='1'"; if($status == '1'){ echo"selected='selected'";} echo">Ativo </option> 

							<option value='2'"; if($status == '2'){ echo"selected='selected'";} echo">Inativo</option>                                      

						";

					}else{

						echo"               

						  	<option value='1'>Sim</option>                

							<option value='2'>Não</option>                                                   

						";								

					} 

					echo "</select>

			</div>

			

			<div class='item_2_select_formulario'>

				<select name='destaque' id='destaque' class='validate[required] item_2_select_formulario'>";

                	if($estagio_obra != ''){

						echo"

							<option value='1'"; if($destaque == '1'){ echo"selected='selected'";} echo">Sim </option> 

							<option value='2'"; if($destaque == '2'){ echo"selected='selected'";} echo">Não</option>                                      

						";

					}else{

						echo"               

						  	<option value='1'>Sim</option>                

							<option value='2'>Não</option>                                                   

						";								

					} 

					echo "</select>

			</div>

	

	</div>

		

	<div class='formulario'>

		<div class='btn_formulario'>

				<input type='image' src='../images/btn_salvar.png'  value='Enviar' />

        </div>		

	</div>";

			

	echo "<div class='navegacao'><p></p></div>";

		}	

		include "galeria/photo.class.php";

?>   

</body>

</html>