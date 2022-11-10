<?php
// Acentuação
header("Content-Type: text/html; charset=ISO-8859-2",true);

$campo = $_GET['campo'];
$valor = $_GET['valor'];

// Verificando o campo Titulo
if ($campo == "titulo") {	
	if ($valor == "") {
		echo "Campo Obrigatório";
	} 
}

// Verificando o campo Fonte
if ($campo == "fonte") {	
	if ($valor == "") {
		echo "Campo Obrigatório";
	} 
}

// Verificando o campo Imagem
if ($campo == "local") {	
	if ($valor == "") {
		echo "Campo Obrigatório";
	} 
}

// Verificando o campo Texto
if ($campo == "texto") {	
	if ($valor == "") {
		echo "Campo Obrigatório";
	} 
}


?>