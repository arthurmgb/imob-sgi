<?
	$ref = getenv("HTTP_REFERER");
	$endarquivo = $_SERVER["SCRIPT_FILENAME"];	
	if (!$ref || $ref == $endarquivo){		
			$server = $_SERVER['SERVER_NAME']; 
			$site = "http://" . $server;
			@header("Location: $site");	
	} 
	
	$id_estado_busca = $_POST["id_estado"];
	$id_cidade_busca = $_POST["id_cidade"];
	$id_bairro_busca = $_POST["id_bairro"];
	$estagio_busca = $_POST["estagio"];
	$dormitorios_busca = $_POST["dormitorios"];
	$id_tipo_imovel_busca = $_POST["id_tipo_imovel"];
	
	include "../../painel/config.php"; 
	include "../../mapa/index/Gmaps.php";
	$banco = 'imoveis';
	$path = dirname("../../painel/imovel/vis.php");
	
	// CONECTAR DB
	$conexao = mysql_connect($dbserver, $dbuser, $dbpass);
	$db = mysql_select_db("$dbname");
	
	if($id_bairro_busca == '' && $estagio_busca == '' && $dormitorios_busca == '' && $id_tipo_imovel_busca == '') {
		$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca ORDER BY id DESC LIMIT 3";	
	}elseif($id_bairro_busca != '' && $estagio_busca != '' && $dormitorios_busca != '' && $id_tipo_imovel_busca != '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_bairro = $id_bairro_busca and estagio_obra = $estagio_busca and quartos = $dormitorios_busca and id_tipo_imovel = $id_tipo_imovel_busca ORDER BY id DESC LIMIT 3";	
	}elseif($id_bairro_busca == '' && $estagio_busca != '' && $dormitorios_busca != '' && $id_tipo_imovel_busca != '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			estagio_obra = $estagio_busca and quartos = $dormitorios_busca and id_tipo_imovel = $id_tipo_imovel_busca ORDER BY id DESC LIMIT 3";	
	}elseif($id_bairro_busca != '' && $estagio_busca == '' && $dormitorios_busca != '' && $id_tipo_imovel_busca != '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_bairro = $id_bairro_busca and quartos = $dormitorios_busca and id_tipo_imovel = $id_tipo_imovel_busca ORDER BY id DESC LIMIT 3";	
	}elseif($id_bairro_busca != '' && $estagio_busca != '' && $dormitorios_busca == '' && $id_tipo_imovel_busca != '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_bairro = $id_bairro_busca and estagio_obra = $estagio_busca and id_tipo_imovel = $id_tipo_imovel_busca ORDER BY id DESC LIMIT 3";	
	}elseif($id_bairro_busca != '' && $estagio_busca != '' && $dormitorios_busca != '' && $id_tipo_imovel_busca == '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_bairro = $id_bairro_busca and estagio_obra = $estagio_busca and quartos = $dormitorios_busca ORDER BY id DESC LIMIT 3";	
	}elseif($id_bairro_busca == '' && $estagio_busca == '' && $dormitorios_busca != '' && $id_tipo_imovel_busca != '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			quartos = $dormitorios_busca and id_tipo_imovel = $id_tipo_imovel_busca ORDER BY id DESC LIMIT 3";	
	}elseif($id_bairro_busca == '' && $estagio_busca != '' && $dormitorios_busca == '' && $id_tipo_imovel_busca != '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			estagio_obra = $estagio_busca and id_tipo_imovel = $id_tipo_imovel_busca ORDER BY id DESC LIMIT 3";	
	}elseif($id_bairro_busca == '' && $estagio_busca != '' && $dormitorios_busca != '' && $id_tipo_imovel_busca == '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			estagio_obra = $estagio_busca and quartos = $dormitorios_busca ORDER BY id DESC LIMIT 3";	
	}elseif($id_bairro_busca != '' && $estagio_busca == '' && $dormitorios_busca == '' && $id_tipo_imovel_busca != '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_bairro = $id_bairro_busca and id_tipo_imovel = $id_tipo_imovel_busca ORDER BY id DESC LIMIT 3";	
	}elseif($id_bairro_busca != '' && $estagio_busca == '' && $dormitorios_busca != '' && $id_tipo_imovel_busca == '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_bairro = $id_bairro_busca and quartos = $dormitorios_busca ORDER BY id DESC LIMIT 3";	
	}elseif($id_bairro_busca != '' && $estagio_busca != '' && $dormitorios_busca == '' && $id_tipo_imovel_busca == '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_bairro = $id_bairro_busca and estagio_obra = $estagio_busca ORDER BY id DESC LIMIT 3";	
	}elseif($id_bairro_busca != '' && $estagio_busca == '' && $dormitorios_busca == '' && $id_tipo_imovel_busca == '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_bairro = $id_bairro_busca ORDER BY id DESC LIMIT 3";	
	}elseif($id_bairro_busca == '' && $estagio_busca != '' && $dormitorios_busca == '' && $id_tipo_imovel_busca == '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			estagio_obra = $estagio_buscaORDER BY id DESC LIMIT 3";	
	}elseif($id_bairro_busca == '' && $estagio_busca == '' && $dormitorios_busca != '' && $id_tipo_imovel_busca == '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			quartos = $dormitorios_busca ORDER BY id DESC LIMIT 3";
	}elseif($id_bairro_busca == '' && $estagio_busca == '' && $dormitorios_busca == '' && $id_tipo_imovel_busca != '') {
			$sql = "SELECT * FROM $banco where status = '1' and id_estado = $id_estado_busca and id_cidade = $id_cidade_busca and
			id_tipo_imovel = $id_tipo_imovel_busca ORDER BY id DESC LIMIT 3";
	}
	
	@$resultado = mysql_query($sql);
	
	@$total_de_registros_da_pagina = mysql_num_rows($resultado);
	if ($total_de_registros_da_pagina == 0)
	{
		echo '<center>Nenhum resultado encontrado</center>';
	}else{
	//validador do menu
	$i = 1;

	while ($linha=mysql_fetch_array($resultado)) {
		  
		  $id = $linha["id"];	
		  $id_estado = $linha["id_estado"];
		  $id_cidade = $linha["id_cidade"];
		  $id_bairro = $linha["id_bairro"];
		  $id_tipo_imovel = $linha["id_tipo_imovel"];
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
				$nomeestagio_obra = 'Em Andamento';
			}elseif($estagio_obra == '2'){
				$nomeestagio_obra = 'Entregue';
			}elseif($estagio_obra == '3'){
				$nomeestagio_obra = 'Lançamento';
			}elseif($estagio_obra == '4'){
				$nomeestagio_obra = 'Pré-Lançamento';
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
				$nomebanheiro = '3 Dormitórios 1 com Suíte';
			}elseif($banheiro == '7'){
				$nomebanheiro = '4 sendo 1 Suíte';
			}elseif($banheiro == '8'){
				$nomebanheiro = '5 sendo 1 Suíte';
			}			
			
			// mapa
			// Instancia a classe
			$gmaps = new gMaps('ABQIAAAA6f2TXwGeOdswoV5r1sgt2xTuLnqbd9ZLtEL_XYkRFcOP2rezoxSbCTg3ryE2vXZbhiR3EblHXJs8vw');
			$enderecocompleto = $endereco.",".$numero.",".$nomebairro.",".$nomecidade.",".$nomeestado;
			// Pega os dados (latitude, longitude e zoom) do endereço:
			$dadosmapa = $gmaps->geolocal($enderecocompleto);
			$latitude = $dadosmapa['lat'];
			$longitude = $dadosmapa['lon'];
			$zoom = $dadosmapa['zoom'];	
			
			//letramapa
			
			//laser
			if($i == '1'){
				$letramapa = 'a';
			}elseif($i == '2'){
				$letramapa = 'b';
			}elseif($i == '3'){
				$letramapa = 'c';
			}	  
		  
		?>

 		<!------------------------lançamento ------------------------------->
                    <div class="lancamento">
                            <div class="coda-slider-wrapper">
                                <div class="coda-slider preload" id="coda-slider-<? echo $i ?>">
                                    <div class="panel">
                                        <div class="panel-wrapper">
                                            <h2 class="title" style="display:none">Apresentação</h2>
                                            <p> 
                                           		 <div id="apresentacao" style="width:650px; height:195px; float:left">
                                                    <h2><? echo $nome ?></h2>
                                                    <img src="<? echo $path.$foto ?>" width="160" height="160" align="left" style="margin-right:5px"/> 
                                                    <? echo $descricao_resum ?>
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="panel">
                                      <div class="panel-wrapper">
                                            <h2 class="title" style="display:none">Ficha Técnica</h2>
                                            <p>
                                            	<div id="tec01" style="width:310px; height:195px; float:left">
                                                    Tipo de empreendimento: <? echo $nometipoimovel ?><br />
                                                    Área construida: <? echo $area_construida ?><br />
                                                    Dormitórios: <? echo $nomedormitorios ?><br />
                                                    Vagas na garagem: <? echo $vagas_garagem ?><br />
                                                    Andares: <? echo $andares ?><br />
                                                    Elevadores: <? echo $elevadores ?><br />
                                                    Unidades por andar: <? echo $unidades_por_andar ?><br /> 
                                                </div>    
                                                <div id="tec02" style="width:310px; height:195px; float:right">
                                                    Estágio da obra: <? echo $nomeestagio_obra ?><br />
                                                    Área total: <? echo $area_total ?><br />
                                                    Área de Laser: <? echo $nomearealaser ?><br />
                                                    Banheiros: <? echo $nomebanheiro ?><br />
                                                    Salas: <? echo $salas ?><br />
                                                </div>                                           
                                          </p>
                                        </div>
                                    </div>
                                    <div class="panel">
                                        <div class="panel-wrapper">
                                            <h2 class="title" style="display:none">Localização</h2>
                                            <p>
                                            	<div id="endereco" style="width:300px; height:195px; float:left">
                                            		Endereço: <? echo $endereco. " Número: " .$numero. " Bairro: ".$nomebairro. " Cidade: " .$nomecidade ?><br />
                                                </div>
												
                                                <div id="googleMap<? echo $letramapa ?>" style="width:325px; height:195px; float:right"></div>
                                                <script type="text/javascript">
													if (GBrowserIsCompatible()) {
														var map = new GMap2(document.getElementById("googleMap<? echo $letramapa ?>"));
														var lat = <? echo $latitude; ?>; // Latitude do marcador
														var lon = <? echo $longitude; ?>; // Longitude do marcador
														var zoom = 14; // Zoom	
														var lat2 = lat + 0.009000
														var lon2 = lon - 0.010000
														map.setCenter(new GLatLng(lat2, lon2), zoom);
													
														var marker<? echo $i ?> = new GMarker(new GLatLng(lat,lon));
																																																																			
														map.addOverlay(marker<? echo $i ?>);
														//map.setCenter(point, zoom);
													}
												</script> 
                                            </p>
                                        </div>
                                    </div>
                                    
                                </div><!-- .coda-slider -->
                            </div><!-- .coda-slider-wrapper -->
                            <a class="lancamento_saibamais" href="../../empreendimento/index/index.php?id=<? echo $id ?>"><img src="../../images/btn_saibamais.png" /></a>
						</div>
            <!------------------------lançamento ------------------------------->  
            <?
				$i ++;
			}
	}//if nenhum resultado
?>