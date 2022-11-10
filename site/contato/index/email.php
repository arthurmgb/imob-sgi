<?php
include("../../cms/config.php");
include("../../config/index/dados.php");


//pega as variaveis por POST
$nome      = $_POST["nome"];
$empresa     = $_POST["empresa"];
$email   = $_POST["email"];
$fone  = $_POST["telefone"];
$mensagem  = $_POST["msg"];

global $email; //função para validar a variável $email no script todo

$data      = date("d/m/y");                     //função para pegar a data de envio do e-mail
$ip        = $_SERVER['REMOTE_ADDR'];           //função para pegar o ip do usuário
$navegador = $_SERVER['HTTP_USER_AGENT'];       //função para pegar o navegador do visitante
$hora      = date("H:i");                       //para pegar a hora com a função date

//aqui envia o e-mail para você
mail ("$emailempresa",                       //email aonde o php vai enviar os dados do form
      "Mensagem do site - $nomeempresa",
      "Nome: $nome\nData: $data\nIp: $ip\nNavegador: $navegador\nHora: $hora\nEmpresa: $empresa\nE-mail: $email\nTelefone: $fone\n\nMensagem: $mensagem",
      "From: $email"
     );

//aqui envia o e-mail para você
mail ("contato@webdevice.com.br",                       //email aonde o php vai enviar os dados do form
      "HomeDevice",
      "Nome: $nome\nData: $data\nIp: $ip\nNavegador: $navegador\nHora: $hora\nEmpresa: $empresa\nE-mail: $email\nTelefone: $fone\n\nMensagem: $mensagem",
      "From: $email"
     );


//aqui são as configurações para enviar o e-mail para o visitante
$site   = "$emailempresa";                    //o e-mail que aparecerá na caixa postal do visitante
$titulo = "$nomeempresa";                  //titulo da mensagem enviada para o visitante
$msg    = "$nome, obrigado por entrar em contato conosco, em breve responderemos.";

//aqui envia o e-mail de auto-resposta para o visitante
mail("$email",
     "$titulo",
     "$msg",
     "From: $site"
    );
echo "<meta http-equiv=refresh content=0;URL=../../contato/index/>
<SCRIPT LANGUAGE='JavaScript'>window.alert('Em breve responderemos sua mensagem!');</SCRIPT>";
?>