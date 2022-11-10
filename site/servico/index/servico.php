<?
   $bancosobre = 'pagina_servico';
   			
  $sql = "SELECT * FROM $bancosobre";
  $resultado = mysql_query($sql)
  	or die ("<B>Não foi possível realizar a consulta ao banco de dados</B>");
		
		$linha=mysql_fetch_array($resultado);
			$texto = $linha["texto"];
			
?>