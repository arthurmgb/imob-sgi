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
$dados = $_SESSION["dados"];
$login = $dados["nome"];

		include "config.php"; 
		$banco = 'usuario';	

		@$sql = "SELECT * FROM $banco WHERE login='$login'";
		@$resultado = mysql_query($sql)
		or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
		
		$linha=mysql_fetch_array($resultado);	
			 $nome = $linha["nome"];
			 $login = $linha["login"];
			 $email = $linha["email"];
			 $foto = $linha["imagem"];
			 $nivel = $linha["nivel"];
			 
			 if($foto == ''){$foto = 'images/sem_imagem.jpg';}else { $foto = 'usuario/'.$foto; }
			 
			 if($nivel == '1'){ $nomenivel = 'Administrador';}
			 if($nivel == '2'){ $nomenivel = 'Sub-Administrador';}
			 if($nivel == '3'){ $nomenivel = 'Usuário';}
			 
		
	
echo"
<div class='dados_usuario'>
	<div class='foto_usuario'> <img src='$foto'> </div>
    <div class='dados_usuario'>Nome: $nome </div>
    <div class='dados_usuario'>E-mail: $email </div>
	<div class='dados_usuario'>Nivel: $nomenivel </div>
</div>

<div class='relatorios_usuario'>
	<div class='titulo_acoes_usuario'>Relatórios</div>
	<div class='acoes_usuario'><a href='relatorio/vis.php?id=id' target='conteudo_principal'><p>Minhas ações</p> </a></div>";
	
		require_once "login/seguranca.php";
		$dados = $_SESSION["dados"];
		if ($dados["nivel"] == '1'){
			echo"		
				<div class='acoes_usuario'><a href='relatorio/vis.php' target='conteudo_principal'><p>Ações dos usuários</p> </a> </div>
			";
		}
echo"
</div>

<div class='sair'>
	<a href='login/sair.php'> 
    	<div class='sair_texto'>Sair </div>
        <div class='sair_imagem'><img src='images/sair.png'> </div>
    </a>
</div>
";
?>

