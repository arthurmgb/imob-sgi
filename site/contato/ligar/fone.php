<?php
include("../../cms/config.php");
include("../../config/index/dados.php");


//pega as variaveis por POST
$nome      = $_POST["nome"];
$fone  = $_POST["telefone"];
$mensagem  = $_POST["msg"];


global $email; //fun��o para validar a vari�vel $email no script todo

$data      = date("d/m/y");                     //fun��o para pegar a data de envio do e-mail
$ip        = $_SERVER['REMOTE_ADDR'];           //fun��o para pegar o ip do usu�rio
$navegador = $_SERVER['HTTP_USER_AGENT'];       //fun��o para pegar o navegador do visitante
$hora      = date("H:i");                       //para pegar a hora com a fun��o date

//aqui envia o e-mail para voc�
mail ("$emailempresa",                       //email aonde o php vai enviar os dados do form
      "Mensagem do site - $nomeempresa",
      "Nome: $nome\nData: $data\nIp: $ip\nNavegador: $navegador\nHora: $hora\nTelefone: $fone\n\n $imovel\n\n Mensagem: $mensagem",
      "From: $email"
     );

//aqui envia o e-mail para voc�
mail ("contato@webdevice.com.br",                       //email aonde o php vai enviar os dados do form
      "HomeDevice",
      "Nome: $nome\nData: $data\nIp: $ip\nNavegador: $navegador\nHora: $hora\nTelefone: $fone\n\n $imovel\n\nMensagem: $mensagem",
      "From: $email"
     );
echo "<meta http-equiv=refresh content=0;URL=../../contato/venda/>
<SCRIPT LANGUAGE='JavaScript'>window.alert('Em breve responderemos sua mensagem!');</SCRIPT>";
?>