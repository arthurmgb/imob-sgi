<?
	include "../../config/index/Gmaps.php";
	
	$id_imovel = $_GET["id"];
	$banco = 'imoveis';
	$bancogaleria = 'imovel_galeria';	
	$bancovideo = 'imovel_video';
	$bancogaleria_plantas = 'imovel_plantas';
	$bancogaleria_acompanhe = 'imovel_acompanhe_galeria';
	$bancobarra = 'imovel_cronograma';

	
	// CONECTAR DB
	$sql = "SELECT * FROM $banco where status = '1' and id = $id_imovel ORDER BY id DESC LIMIT 1";
	$resultado = mysql_query($sql);
	
	//validador do menu
	$i = 1;

	while ($linha=mysql_fetch_array($resultado)) {
		  
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
		  
		  if($foto == ''){$foto = '../../cms/images/sem_imagem.jpg';}else { $foto = '../../cms/imovel/'.$foto; }
		  
		  
		  $sql1 = "SELECT * FROM tipo_negocio where id = $id_tipo_negocio ORDER BY id DESC LIMIT 1";
		  $resultado1 = mysql_query($sql1);
		  	while ($linha1=mysql_fetch_array($resultado1)) {
				$nometiponegocio = $linha1["nome"];
			}
		  
		  $sql2 = "SELECT * FROM estados where id = $id_estado ORDER BY id DESC LIMIT 1";
		  $resultado2 = mysql_query($sql2);
		  	while ($linha2=mysql_fetch_array($resultado2)) {
				$nomeestado = $linha2["nome"];
			}
			
		  $sql3 = "SELECT * FROM cidades where id = $id_cidade ORDER BY id DESC LIMIT 1";
		  $resultado3 = mysql_query($sql3);
		  	while ($linha3=mysql_fetch_array($resultado3)) {
				$nomecidade = $linha3["nome"];
			}
			
		  $sql4 = "SELECT * FROM bairros where id = $id_bairro ORDER BY id DESC LIMIT 1";
		  $resultado4 = mysql_query($sql4);
		  	while ($linha4=mysql_fetch_array($resultado4)) {
				$nomebairro = $linha4["nome"];
			}
			
		  $sql5 = "SELECT * FROM tipo_imovel where id = $id_tipo_imovel ORDER BY id DESC LIMIT 1";
		  $resultado5 = mysql_query($sql5);
		  	while ($linha5=mysql_fetch_array($resultado5)) {
				$nometipoimovel = $linha5["nome"];
			}
			
			//quartos
			if($quartos == '1'){
				$nomedormitorios = '1 Dormitório Simple';
			}elseif($quartos == '2'){
				$nomedormitorios = '1 Dormitório com Suíte';
			}elseif($quartos == '3'){
				$nomedormitorios = '2 Dormitórios Simples';
			}elseif($quartos == '4'){
				$nomedormitorios = '2 Dormitórios 1 com Suíte';
			}elseif($quartos == '5'){
				$nomedormitorios = '3 Dormitórios Simples';
			}elseif($quartos == '6'){
				$nomedormitorios = '3 Dormitórios 1 com Suíte';
			}elseif($quartos == '7'){
				$nomedormitorios = '4 Dormitórios Simples';
			}elseif($quartos == '8'){
				$nomedormitorios = '4 Dormitórios 1 com Suíte';
			}
			
			
			//estagio da obra
			if($estagio_obra == '1'){
				$nomeestagio_obra = 'Em Construçao';
			}elseif($estagio_obra == '2'){
				$nomeestagio_obra = 'Novo';
			}elseif($estagio_obra == '3'){
				$nomeestagio_obra = 'Lançamento';
			}elseif($estagio_obra == '4'){
				$nomeestagio_obra = 'Pré-Lançamento';
			}elseif($estagio_obra == '5'){
				$nomeestagio_obra = 'Usado';
			}
			
			
			//laser
			if($area_lazer == '1'){
				$nomearealaser = 'Sim';
			}elseif($area_lazer == '2'){
				$nomearealaser = 'Não';
			}
			
			
			
			//Banheiros
			if($banheiro == '1'){
				$nomebanheiro = '1';
			}elseif($banheiro == '2'){
				$nomebanheiro = '2 sendo 1 Suíte';
			}elseif($banheiro == '3'){
				$nomebanheiro = '2';
			}elseif($banheiro == '4'){
				$nomebanheiro = '3 sendo 1 Suíte';
			}elseif($banheiro == '5'){
				$nomebanheiro = '3';
			}elseif($banheiro == '6'){
				$nomebanheiro = '4 sendo 1 Suíte';
			}elseif($banheiro == '7'){
				$nomebanheiro = '5';
			}elseif($banheiro == '8'){
				$nomebanheiro = '5 sendo 1 Suíte';
			}elseif($banheiro == '9'){
				$nomebanheiro = '1 Suíte';
			}elseif($banheiro == '10'){
				$nomebanheiro = '2 sendo 2 Suítes';
			}elseif($banheiro == '11'){
				$nomebanheiro = '3 sendo 2 Suítes';
			}elseif($banheiro == '12'){
				$nomebanheiro = '4 sendo 2 Suítes';
			}elseif($banheiro == '13'){
				$nomebanheiro = '5 sendo 2 Suítes';
			}elseif($banheiro == '14'){
				$nomebanheiro = '3 sendo 3 Suítes';
			}elseif($banheiro == '15'){
				$nomebanheiro = '4 sendo 3 Suítes';
			}elseif($banheiro == '16'){
				$nomebanheiro = '5 sendo 3 Suítes';
			}elseif($banheiro == '17'){
				$nomebanheiro = '4 sendo 4 Suítes';
			}elseif($banheiro == '18'){
				$nomebanheiro = '5 sendo 4 Suítes';
			}elseif($banheiro == '19'){
				$nomebanheiro = '5 sendo 5 Suítes';
			}		
			
			// mapa
			// Instancia a classe
			$gmaps = new gMaps($codigomaps);
			$enderecocompleto = $endereco.",".$numero.",".$nomebairro.",".$nomecidade.",".$nomeestado;
			// Pega os dados (latitude, longitude e zoom) do endereço:
			$dadosmapa = $gmaps->geolocal($enderecocompleto);
			$latitude = $dadosmapa['lat'];
			$longitude = $dadosmapa['lon'];
			$zoom = $dadosmapa['zoom'];
		  
		?>


 		<!------------------------lançamento ------------------------------->
              <div class="descricao_imovel">
				 <div class="titulo_imovel_descricao"> <? echo $cod_imob. ' - ' .$nome ?></div>
				 <div class="foto_imovel_descricao"> <img src="<? echo $foto ?>"/> </div>
                 <div class="texto_imovel_descricao"> <? echo $descricao ?></div>
 				
                
					<? 
                    $query = "SELECT * FROM $bancovideo where id_imovel = $id_imovel";
                    $resultadoquery = mysql_query ($query) or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
                    $total = mysql_affected_rows();	
                     while ($linha=mysql_fetch_array($resultadoquery)) {
                        $videoimovel = $linha["video"];
                     }
                    if($total != 0){
                        echo"
							<div class='esquerda_imovel_descricao'> 
								<div class='subtitulo_imovel_descricao4'>Vídeo</div>               
								<div class='item_imovel_video'>
									$videoimovel 
								</div>
							</div>";
                    }
                    ?>
               
                
               <div class="direita_imovel_descricao">  
                    <div class="subtitulo_imovel_descricao4">Características</div>
                    
                    <?
                     if( $nometiponegocio != ''){echo"<div class='item_imovel_descricao'>Tipo de negócio: $nometiponegocio </div>";}
                     if( $nometipoimovel != ''){echo"<div class='item_imovel_descricao'>Tipo de imóvel: $nometipoimovel </div>";}
                     if( $area_construida != ''){echo"<div class='item_imovel_descricao'>Área construida: $area_construida m²</div>";}
                     if( $area_total != ''){echo"<div class='item_imovel_descricao'>Área total: $area_total  m²</div>";}
                     if( $nomearealaser != ''){echo" <div class='item_imovel_descricao'>Área de Lazer: $nomearealaser</div>";}
                     if( $nomedormitorios != ''){echo"<div class='item_imovel_descricao'>Dormitórios: $nomedormitorios </div>";}
                     if( $vagas_garagem != ''){echo"<div class='item_imovel_descricao'>Vagas na garagem: $vagas_garagem </div>";}
                     if( $andares > '0'){echo"<div class='item_imovel_descricao'>Andares: $andares </div>";}
                     if( $elevadores > '0'){echo"<div class='item_imovel_descricao'>Elevadores: $elevadores </div>";}
                     if( $unidades_por_andar > '0'){echo"<div class='item_imovel_descricao'>Unidades por andar: $unidades_por_andar </div> ";}
                     if( $nomeestagio_obra != ''){echo" <div class='item_imovel_descricao'>Situação do imóvel: $nomeestagio_obra </div>";} 
                     if( $nomebanheiro != ''){echo"<div class='item_imovel_descricao'>Banheiros: $nomebanheiro </div>";}
                     if( $salas != ''){echo"<div class='item_imovel_descricao'>Salas: $salas </div>";}
    
                    ?>
              </div>
                
				 <div class="subtitulo_imovel_descricao2">Localização</div>
				 <div class="texto_imovel_endereco"> Endereço: <? echo $endereco. " Número: " .$numero. " Bairro: ".$nomebairro. " Cidade: " .$nomecidade ?></div>
          
                    <div id="googleMap" class="mapagoogle"></div>
                     <script type="text/javascript">
                        if (GBrowserIsCompatible()) {
                            var map = new GMap2(document.getElementById("googleMap"));
                            var lat = <? echo $latitude; ?>; // Latitude do marcador
                            var lon = <? echo $longitude; ?>; // Longitude do marcador
                            var zoom = 16; // Zoom	
                            map.setCenter(new GLatLng(lat, lon), zoom);
                                                                
                            var marker<? echo $i ?> = new GMarker(new GLatLng(lat,lon));
                                                                                                                                                                                                                                                                                        
                            map.addOverlay(marker<? echo $i ?>);
                            //map.setCenter(point, zoom);
                            }
                        </script>           
               
               	<?											
				$query = "SELECT * FROM $bancogaleria where id_imovel = $id_imovel";
				mysql_query ($query) or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
				$total = mysql_affected_rows();	
				if($total != 0){
					echo"
               			<div class='subtitulo_imovel_descricao3'>Fotos</div>               
               			<div class='fotos_imovel_descricao'>";
							include("../../imovel/index/perspectivas.php"); 
					echo"</div>";
			   	}
				
				$query = "SELECT * FROM $bancogaleria_plantas where id_imovel = $id_imovel";
				mysql_query ($query) or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
				$total = mysql_affected_rows();	
				if($total != 0){
					echo"
               			<div class='subtitulo_imovel_descricao3'>Plantas</div>               
               			<div class='fotos_imovel_descricao'>";
							include("../../imovel/index/planta.php"); 
					echo"</div>";
			   	}
				
				
				$query = "SELECT * FROM $bancogaleria_acompanhe where id_imovel = $id_imovel";
				mysql_query ($query) or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
				$total = mysql_affected_rows();	
				if($total != 0){
					echo"
               			<div class='subtitulo_imovel_descricao3'>Acompanhe sua obra</div>               
               			<div class='fotos_imovel_descricao'>";
							include("../../imovel/index/acompanhe.php"); 
					echo"</div>
					<div class='subtitulo_imovel_descricao3'>Cronograma</div>               
               			<div class='fotos_imovel_descricao'>";
							include("../../imovel/index/cronograma.php"); 
					echo"</div>";
			   	}
				
				
				?>               
        </div>
            <!------------------------lançamento ------------------------------->  
            <?
				$i ++;
			}
?>