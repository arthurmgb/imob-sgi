<?php
class configuracoesController extends Controller {

	private $dados = array(
		'menu_ativo' => 'configuracoes'
		);

	public function __construct() {
		parent::__construct();
		$this->user = new Usuarios();
		if(!$this->user->checkLogin()) {
			header("Location: ".BASE_URL."login");
			exit;
		}   
	}

	public function index() {
		$dados = $this->dados;
		$config = new Config();
		$dados['config'] = $config->getEmpresa(); 

		$this->loadTemplate('paginas/configuracoes', $dados);
	}

	public function empresa() {
		$dados = $this->dados;

		if(!empty($_POST['razao_social'])){

			$razao_social		= addslashes($_POST['razao_social']);
			$cnpj 					= addslashes($_POST['cnpj']);
			$insc						= addslashes($_POST['insc']);
			$creci					= addslashes($_POST['creci']);
			$telefone 			= addslashes($_POST['telefone']);
			$email 					= addslashes($_POST['email']);
			$endereco				= addslashes($_POST['endereco']);
			$bairro					= addslashes($_POST['bairro']);
			$cidade					= addslashes($_POST['cidade']);
			$cep						= addslashes($_POST['cep']);
			$uf 						= addslashes($_POST['uf']);
			$id 						= 1;	

				
				$empresa = new Config;
				$empresa->upEmpresa($id, $razao_social, $cnpj, $insc, $creci, $telefone, $email, $endereco, $bairro, $cidade, $uf, $cep);

				if($id = 1) {
				$data = array(
					'type' => 'success',
					'msg' => 'Empresa atualizado com sucesso!'
					);
				$data = http_build_query($data);
				header('Location: '.BASE_URL.'configuracoes/empresa?'.$data);exit;
			} else {
				$data = array(
					'type' => 'danger',
					'msg' => 'Ocorreu um erro.'
					);
				$data = http_build_query($data);
				header('Location: '.BASE_URL.'configuracoes/empresa?'.$data);exit;
			}
			if(!empty($_GET['msg'])) {
			$dados['error']['msg'] = $_GET['msg'];
			$dados['error']['type'] = $_GET['type'] ? 'success' : 'danger';

		} 
			}

			$config = new Config();
			$dados['config'] = $config->getEmpresa(); 
			$this->loadTemplate('paginas/empresa', $dados);
		}


		public function backup(){
			$dados = array();

			$this->loadTemplate('backup', $dados);
		}





	}
	?>