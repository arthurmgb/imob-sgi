	<div id="slider">
       <ul>
	<?

	$ref = getenv("HTTP_REFERER");
	$endarquivo = $_SERVER["SCRIPT_FILENAME"];	
	if (!$ref || $ref == $endarquivo){		
			$server = $_SERVER['SERVER_NAME']; 
			$site = "http://" . $server;
			@header("Location: $site");	
	} 


	$banco = 'banner';
	
	// CONECTAR DB
	$conexao = mysql_connect($dbserver, $dbuser, $dbpass);
	$db = mysql_select_db("$dbname");
	
	$sql = "SELECT * FROM $banco ORDER BY id DESC LIMIT 10";
	$resultado = mysql_query($sql);
	
	//validador do menu
	$i = 1;

	while ($linha=mysql_fetch_array($resultado)) {
		  $imagem = $linha["imagem"];
		  $url = $linha["url"];
                
             echo" <li><a href='$url'><img src='../../cms/banner/$imagem' alt='' /></a></li>";
	}
	?>
       </ul>
	</div>  