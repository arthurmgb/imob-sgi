<?php
class relatoriosController extends Controller
{

	private $dados = array(
		'menu_ativo' => 'relatorios'
	);

	public function __construct()
	{
		parent::__construct();
		$this->user = new Usuarios();
		if (!$this->user->checkLogin()) {
			header("Location: " . BASE_URL . "login");
			exit;
		}
	}

	public function parcelasClientes()
	{
		$dados = $this->dados;
		$this->loadTemplate('relatorios/parcelasClientes', $dados);
	}

	public function clientes()
	{

		$dados = $this->dados;

		//BUSCAR INQUILINOS PARA O SELECT
		$get_all_inquilinos = new Parcelas;
		$get_all_inquilinos = $get_all_inquilinos->getInquilinosRelatorio();
		$dados['get_all_inquilinos'] = $get_all_inquilinos;

		//ARRAY DE DADOS DOS INPUTS
		$get_input_data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		//CHECAGEM SE O BOTÃO BUSCAR FOI CLICADO
		if (!empty($get_input_data['button-search'])) {

			$dados['get_input_data'] = $get_input_data;

			$parcelas = new Parcelas;
			$parcelas = $parcelas->getParcelasFromInput($dados['get_input_data']);
			$dados['parcelas'] = $parcelas;

			$valores = array_column($dados['parcelas'], 'valor');

			$valores = array_map(function ($valor) {
				return round(floatval($valor), 0);
			}, $valores);

			$valor_total = array_sum($valores);

			$dados['valor_total'] = number_format($valor_total, 2, ',', '.');
		}

		$this->loadTemplate('relatorios/clientes', $dados);
	}

	public function clientesDataPag()
	{
		$dados = $this->dados;

		//BUSCAR INQUILINOS PARA O SELECT
		$get_all_inquilinos = new Parcelas;
		$get_all_inquilinos = $get_all_inquilinos->getInquilinosRelatorio();
		$dados['get_all_inquilinos'] = $get_all_inquilinos;

		//ARRAY DE DADOS DOS INPUTS
		$get_input_data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		//CHECAGEM SE O BOTÃO BUSCAR FOI CLICADO
		if (!empty($get_input_data['button-search'])) {

			$dados['get_input_data'] = $get_input_data;

			$parcelas = new Parcelas;
			$parcelas = $parcelas->getParcelasFromInputDp($dados['get_input_data']);
			$dados['parcelas'] = $parcelas;

			$valores = array_column($dados['parcelas'], 'valor');

			$valores = array_map(function ($valor) {
				return round(floatval($valor), 0);
			}, $valores);

			$valor_total = array_sum($valores);

			$dados['valor_total'] = number_format($valor_total, 2, ',', '.');
		}

		$this->loadTemplate('relatorios/clientesDataPag', $dados);
	}

	public function financeiro()
	{
		$dados = $this->dados;

		$config = new Config;
		$caixaHelper = new CaixaHelper;

		$dados['empresa'] = $config->getEmpresa();
		$dados['rows'] = $caixaHelper->relatorio();

		$this->loadView('relatorios/financeiro', $dados);
	}

	public function imoveis()
	{
		$dados = $this->dados;

		$config = new Config;
		$dados['empresa'] = $config->getEmpresa();

		$imoveis = new Imoveis();
		$dados['imoveis'] = $imoveis->relatorio();

		$dados['TotalImoveis'] = $imoveis->count_total_imoveis();

		$this->loadView('relatorios/imoveis', $dados);
	}

	public function disponiveis()
	{
		$dados = $this->dados;

		$config = new Config;
		$dados['empresa'] = $config->getEmpresa();

		$imovel = new Imoveis();
		$dados['disponiveis'] = $imovel->disponiveis(500);

		$imoveis = new Imoveis();
		$dados['TotalImoveis'] = $imoveis->qtdImoveisAtivos();

		$this->loadView('relatorios/disponiveis', $dados);
	}

	public function blocosDisponiveis()
	{

		$dados = $this->dados;

		$imoveis = new Imoveis;

		$dados['imoveis'] = $imoveis->blocosDisponiveis();

		$this->loadView('relatorios/blocosDisponiveis', $dados);
	}

	public function banco()
	{

		$dados = $this->dados;

		$config = new Config;
		$dados['empresa'] = $config->getEmpresa();

		$proprietarios = new Proprietarios();
		$dados['proprietarios'] = $proprietarios->getProprietariosBanco();
		$dados['nobank'] = $proprietarios->getProprietariosSemBanco();

		$this->loadView('relatorios/banco', $dados);
	}

	public function proprietarios()
	{
		$dados = $this->dados;
		$config = new Config;
		$dados['empresa'] = $config->getEmpresa();

		$proprietarios = new Proprietarios();
		$dados['proprietarios'] = $proprietarios->getList(0, 500);
		$dados['TotalProprietarios'] = $proprietarios->getTotalProprietarios();

		$this->loadView('relatorios/proprietarios', $dados);
	}

	public function inquilinos()
	{
		$dados = $this->dados;
		$config = new Config;
		$dados['empresa'] = $config->getEmpresa();

		$inquilinos	= new Inquilinos();
		$dados['inquilinos'] = $inquilinos->getList(0, 500);
		$dados['TotalInquilinos'] = $inquilinos->getTotalInquilinos();

		$this->loadView('relatorios/inquilinos', $dados);
	}

	public function iptu()
	{
		$dados = $this->dados;
		$config = new Config;
		$dados['empresa'] = $config->getEmpresa();

		$inquilinos	= new Inquilinos();
		$dados['inquilinos'] = $inquilinos->getIptu(999);

		$this->loadView('relatorios/iptu', $dados);
	}

	public function contratos()
	{

		$dados = $this->dados;

		$config = new Config;
		$dados['empresa'] = $config->getEmpresa();

		$contratos = new Contratos;
		$dados['contratos'] = $contratos->getContratosForRelatorio();

		$this->loadView('relatorios/contratos', $dados);
	}
}
