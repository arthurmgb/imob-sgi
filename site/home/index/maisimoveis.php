<?

	$banco = 'imoveis';	
	$bancotipo_imovel = 'tipo_imovel';	
	$bancotipo_negocio = 'tipo_negocio';	
	
	$sql = "SELECT * FROM $banco ORDER BY RAND() LIMIT 0,12";
	$resultado = mysql_query($sql);
					
	while ($linha=mysql_fetch_array($resultado)) {
																		
		$foto = $linha["foto"];
		$codigo = $linha["cod_imob"];
		$nome  = $linha["nome"];
		$id = $linha["id"];
		$id_tipo_imovel = $linha["id_tipo_imovel"];
		$id_tipo_negocio = $linha["id_tipo_negocio"];
		$estagio_obra = $linha["estagio_obra"];
		
		$sql2 = "SELECT * FROM $bancotipo_imovel WHERE id ='$id_tipo_imovel'";
		$resultado2 = mysql_query($sql2);
					
		while ($linha2=mysql_fetch_array($resultado2)) {										
			$nome_tipo_imovel  = $linha2["nome"];
		}
		
		$sql3 = "SELECT * FROM $bancotipo_negocio WHERE id ='$id_tipo_negocio'";
		$resultado3 = mysql_query($sql3);
					
		while ($linha3=mysql_fetch_array($resultado3)) {										
			$nome_tipo_negocio  = $linha3["nome"];
		}
		
		if($estagio_obra == '3'){$imglancamento = "<div class='faixa'></div>";}else{$imglancamento = '';}
		if($foto == ''){$foto = '../../cms/images/sem_imagem.jpg';}else { $foto = '../../cms/imovel/'.$foto; }													
		echo"
			<div class='item_maisimoveis'>
				$imglancamento
				<a href='../../imovel/index/descricao.php?id=$id'>
					<img src='$foto' /><br><br>
					<b>$nome_tipo_imovel</b> - <b>$nome_tipo_negocio</b>  <br>
					$codigo - $nome <br>
					
				</a>
			</div>";
	}
   ?>
   	</ul>
    
    