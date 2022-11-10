<?php
class loginController extends Controller {

    private $user;

    public function __construct() {
        parent::__construct();
        $this->user = new Usuarios();
        if($this->user->checkLogin()) {
            // header("Location: ".BASE_URL."login");
            echo '<script>window.location.href="'.BASE_URL.'";</script>';
            exit;
        }
    }

    public function index() {
        $dados = array(
        	'msg' => ''
        );

        if(!empty($_POST['login'])){
        	$login = addslashes($_POST['login']);
        	$senha = $_POST['senha'];

        	$user = new Usuarios();
        	
        	if($user->verifyuser($login, $senha)){
        		$token = $user->createToken($login);
				$_SESSION['token'] = $token;
                //echo 'logou';
        		echo '<script>window.location.href="'.BASE_URL.'";</script>';
        		exit;
        	}else{
        		$dados['msg'] = 'Você informou o Login ou Senha errados, tente novamente!';
        	}
        }

        $this->loadView('login', $dados);
    }
}