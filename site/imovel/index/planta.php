<ul id='mycarousel_plantas' class='jcarousel-skin-tango-descricao'>
<?
	$sql2 = "SELECT * FROM $bancogaleria_plantas where id_imovel = $id_imovel";
	$resultado2 = mysql_query($sql2);
							
    while ($linha2=mysql_fetch_array($resultado2)) {
																
		$thumb = $linha2["thumb"];
		$imagem2 = $linha2["imagem"];
		$id = $linha2["id"];
		
		if($thumb == ''){$thumb = '../../cms/images/sem_imagem.jpg';}else { $thumb = '../../cms/imovel'.$thumb; }		
		if($imagem2 == ''){$imagem2 = '../../cms/images/sem_imagem.jpg';}else { $imagem2 = '../../cms/imovel'.$imagem2; }
																						
		echo"
			<li>
				<a href='$imagem2' rel='sexylightbox[group1]'>
					<img src='$thumb' />
				</a>
			</li>";
	}
   ?>
   	</ul>