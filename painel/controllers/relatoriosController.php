<?php
class relatoriosController extends Controller {

 	private $dados = array(
        'menu_ativo' => 'finaceiro'
    );

	public function __construct() {
		parent::__construct();
		$this->user = new Usuarios();
		if(!$this->user->checkLogin()) {
			header("Location: ".BASE_URL."login");
			exit;
		}   
	}

	public function financeiro() {
		$dados = $this->dados;
		
		$config = new Config;
		$caixaHelper = new CaixaHelper;

		$dados['empresa'] = $config->getEmpresa();
		$dados['rows'] = $caixaHelper->relatorio();

 		$this->loadView('relatorios/financeiro', $dados);
	}

	public function imoveis(){
		$dados = $this->dados;
		
		$config = new Config;
		$dados['empresa'] = $config->getEmpresa();

		$imoveis = new Imoveis();
		$dados['imoveis'] = $imoveis->relatorio();
	
		$dados['TotalImoveis'] = $imoveis->getTotalImoveis();
		
		$this->loadView('relatorios/imoveis', $dados);
	}

	public function disponiveis(){
		$dados = $this->dados;
		
		$config = new Config;
		$dados['empresa'] = $config->getEmpresa();

        $imovel = new Imoveis();
        $dados['disponiveis'] = $imovel->disponiveis(500);		
		
		$imoveis = new Imoveis();
		$dados['TotalImoveis'] = $imoveis->qtdImoveisAtivos();

		$this->loadView('relatorios/disponiveis', $dados);
	}

	public function proprietarios(){
		$dados = $this->dados;
		$config = new Config;
		$dados['empresa'] = $config->getEmpresa();

		$proprietarios = new Proprietarios();
		$dados['proprietarios'] = $proprietarios->getList(0, 500);
		$dados['TotalProprietarios'] = $proprietarios->getTotalProprietarios();

		$this->loadView('relatorios/proprietarios', $dados);
	}

	public function inquilinos(){
		$dados = $this->dados;
		$config = new Config;
		$dados['empresa'] = $config->getEmpresa();

		$inquilinos	= new Inquilinos();
		$dados['inquilinos'] = $inquilinos->getList(0, 500);
		$dados['TotalInquilinos'] = $inquilinos->getTotalInquilinos();

		$this->loadView('relatorios/inquilinos', $dados);
	}

	public function iptu(){
		$dados = $this->dados;
		$config = new Config;
		$dados['empresa'] = $config->getEmpresa();

		$inquilinos	= new Inquilinos();
		$dados['inquilinos'] = $inquilinos->getIptu(500);
		//echo ('<pre>'); print_r($inquilinos); 

		$this->loadView('relatorios/iptu', $dados);
	}

}