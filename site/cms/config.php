<?php
/*
* imob outheme  v1.0
* é um Software proprietário, não livre, cuja cópia, 
* redistribuição ou modificação são em alguma medida restritos 
* pelo seu criador ou distribuidor.

* www.outheme.com
*/
$dbserver="localhost";
$dbuser="imobsolelua_admin";
$dbpass="P@ssw0rd90";
$dbname="imobsolelua_web";

// CONECTAR DB
$conexao = mysql_connect($dbserver, $dbuser, $dbpass);
$db = mysql_select_db("$dbname");

?>
