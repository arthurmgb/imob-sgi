	 <ul id='mycarousel' class='jcarousel-skin-tango'>
<?

	$banco = 'imoveis';	
	$bancotipo_imovel = 'tipo_imovel';	
	$bancotipo_negocio = 'tipo_negocio';	
	
	$sql = "SELECT * FROM $banco WHERE destaque='1' Order By id DESC";
	$resultado = mysql_query($sql);
					
	while ($linha=mysql_fetch_array($resultado)) {
																		
		$foto = $linha["foto"];
		$codigo = $linha["cod_imob"];
		$nome  = $linha["nome"];
		$id = $linha["id"];
		$id_tipo_imovel = $linha["id_tipo_imovel"];
		$estagio_obra = $linha["estagio_obra"];
		
		
		
		$sql2 = "SELECT * FROM $bancotipo_imovel WHERE id ='$id_tipo_imovel'";
		$resultado2 = mysql_query($sql2);
					
		while ($linha2=mysql_fetch_array($resultado2)) {										
			$nome_tipo_imovel  = $linha2["nome"];
		}
		
		if($estagio_obra == '3'){$imglancamento = "<div class='faixa'></div>";}else{$imglancamento = '';}
		if($foto == ''){$foto = '../../cms/images/sem_imagem.jpg';}else { $foto = '../../cms/imovel/'.$foto; }													
		echo"
			<li>
				<div class='item_destaque'>
					$imglancamento	
					<a href='../../imovel/index/descricao.php?id=$id'>
						<img src='$foto' /><br><br>
						<b>$nome_tipo_imovel</b>  <br>
						$codigo - $nome <br>
					</a>
				</div>
			</li>";
	}
   ?>
   	</ul>