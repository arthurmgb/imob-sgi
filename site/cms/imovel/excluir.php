<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>excluir</title>

</head>



<?php



	include "../config.php"; 

$database_sql = "homedevice";





if (!function_exists("GetSQLValueString")) {

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 

{

  if (PHP_VERSION < 6) {

    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  }



  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);



  switch ($theType) {

    case "text":

      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";

      break;    

    case "long":

    case "int":

      $theValue = ($theValue != "") ? intval($theValue) : "NULL";

      break;

    case "double":

      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";

      break;

    case "date":

      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";

      break;

    case "defined":

      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;

      break;

  }

  return $theValue;

}

}



if ((isset($_GET['id'])) && ($_GET['id'] != "")) {

  $deleteSQL = sprintf("DELETE FROM imoveis WHERE id=%s",

                       GetSQLValueString($_GET['id'], "int"));



  mysql_select_db($database_sql);

  $Result1 = mysql_query($deleteSQL) or die(mysql_error());

  

  

}

?>

<script>

				   window.alert("Informação excluida com sucesso!");

				</script>

				<meta HTTP-EQUIV = "Refresh" CONTENT = "0; URL = vis.php?id_imovel=<? echo $id_imovel ?>">

			Aguarde vc será redirecionado - - - - -

<?

$colname_deletar = "-1";

if (isset($_GET['id'])) {

  $colname_deletar = $_GET['id'];

}

mysql_select_db($database_sql);

$query_deletar = sprintf("SELECT * FROM imoveis WHERE id = %s", GetSQLValueString($colname_deletar, "int"));

$deletar = mysql_query($query_deletar) or die(mysql_error());

$row_deletar = mysql_fetch_assoc($deletar);

$totalRows_deletar = mysql_num_rows($deletar);



mysql_free_result($deletar);

?>

