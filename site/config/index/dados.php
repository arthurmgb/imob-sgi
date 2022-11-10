<?
   $bancoconfig = 'config';
   $bancodados = 'dados_imobiliaria';
   $bancogoogleanalytics = 'google_analytics';
   $bancogooglemaps = 'google_maps';
   $bancogooglewebmaster = 'google_webmaster';
   $bancoredesocial = 'redessociais';   
   $bancochat = 'chat';
	
  $sql = "SELECT * FROM $bancodados";
  $resultado = mysql_query($sql)
  	or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
		
		$linha=mysql_fetch_array($resultado);
			$nomeempresa = $linha["nome"];	
			$slogan = $linha["slogan"];
			$telefone1 = $linha["telefone1"];
			$telefone2 = $linha["telefone2"];
			$emailempresa = $linha["email"];
			$creci = $linha["creci"];
			$endereco = $linha["endereco"];
			$bairro = $linha["bairro"];
			$cidade = $linha["cidade"];
			$estado = $linha["estado"];
			$cep = $linha["cep"];
			$logo_grande = $linha["logo_grande"];
	
	
  $sql = "SELECT * FROM $bancoconfig";
  $resultado = mysql_query($sql)
  	or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
		
		$linha=mysql_fetch_array($resultado);
			$tema = $linha["tema"];		
			$palavrachave = $linha["palavrachave"];	
			
  $sql = "SELECT * FROM $bancogoogleanalytics";
  $resultado = mysql_query($sql)
  	or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
		
		$linha=mysql_fetch_array($resultado);
			$codigoanalytics = $linha["codigoanalytics"];	
			
  $sql = "SELECT * FROM $bancogooglemaps";
  $resultado = mysql_query($sql)
  	or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
		
		$linha=mysql_fetch_array($resultado);
			$codigomaps = $linha["codigomaps"];
			
  $sql = "SELECT * FROM $bancogooglewebmaster";
  $resultado = mysql_query($sql)
  	or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
		
		$linha=mysql_fetch_array($resultado);
			$metatag = $linha["metatag"];
			
  $sql = "SELECT * FROM $bancoredesocial";
  $resultado = mysql_query($sql)
  	or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
		
		$linha=mysql_fetch_array($resultado);
			$youtube = $linha["youtube"];
			$orkut = $linha["orkut"];
			$twitter = $linha["twitter"];
			$facebook = $linha["facebook"];
			$msn = $linha["msn"];
			
 $sql = "SELECT * FROM $bancochat";
  $resultado = mysql_query($sql)
  	or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
		
		$linha=mysql_fetch_array($resultado);
			$codigochat = $linha["codigochat"];
			
?>