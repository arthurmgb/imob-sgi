<?php
$nome      = $_POST["nome"];
$email  = $_POST["email"];
$nome2      = $_POST["nome2"];
$email2  = $_POST["email2"];
$mensagem  = $_POST["msg"];


global $email; //fun��o para validar a vari�vel $email no script todo


//aqui envia o e-mail para voc�
mail ("$email",                       //email aonde o php vai enviar os dados do form
      "Mensagem de - $nome",
      "Nome: Ol� $nome2,\n esta � uma mensagem enviada por $nome\n\n Mensagem: $mensagem",
      "From: $email2"
     );


echo "<meta http-equiv=refresh content=0;URL=../../contato/indique/>
<SCRIPT LANGUAGE='JavaScript'>window.alert('Sua mensagem foi enviada!');</SCRIPT>";
?>