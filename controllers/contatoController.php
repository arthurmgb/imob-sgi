<?php
class contatoController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$dados = array();
		if(isset($_POST['nome']) && !empty($_POST['nome'])){
			$nome = addslashes($_POST['nome']);
			$telefone = addslashes($_POST['telefone']);
			$assunto = addslashes($_POST['assunto']);
			$mensagem = addslashes($_POST['mensagem']);
			
        $msg = "Nome: ".$nome."\n Telefone: ".$telefone." \n".$mensagem."\n>E-mail via formualrio de contato do site ".BASE_URL." ";
		$email_remetente = "contato@imobiliariasolelua.com.br";
        $headers = "MIME-Version: 1.1\n";
        $headers = "Content-type: text/plain; charset=iso-8859-1\n";
        $headers = "From: $email_remetente\n"; // remetente
        $headers = "Return-Path: $email_remetente\n"; // Return-Path
        $headers = "Reply-To: $email_usuario\n"; // Endereço (devidamente validado) que o seu usuário informou no contato
        $envia = mail("contato@imobiliariasolelua.com.br", "$assunto", "$msg", $headers, "-f$email_remetente");  

      if($envia == true){
      	echo "enviado com sucesso!";
      header('Location: '.BASE_URL.'contato');
      }else{
      	echo "Aconteceu algum erro! Tente novamente.";
      }
      exit;
		}

		$this->loadTemplate('contato', $dados);
	}

}
