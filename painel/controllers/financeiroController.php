<?php
class financeiroController extends Controller
{

	private $dados = array(
		'menu_ativo' => 'financeiro'
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

	public function index()
	{
		$dados = $this->dados;
		$dados['parcelas'] = array();

		$filtros = array();

		if (!empty($_GET['contrato']) && ctype_digit($_GET['contrato']) && (int)$_GET['contrato'] > 0) {
			$filtros['contrato'] = abs(addslashes($_GET['contrato']));
			$filtros['pagas'] = isset($_GET['pagas']) ? $_GET['pagas'] : 'true';
			$parcelas = new Parcelas();
			$dados['parcelas'] = $parcelas->getLista($filtros);
			$dados['searchText'] = $filtros['contrato'];
		}

		$this->loadTemplate('financeiro/index', $dados);
	}

	public function populareditar()
	{
		$n_parcela = $_POST['n'] ?? null;
		$id_contrato = $_POST['id'] ?? null;

		if (!$n_parcela || !$id_contrato) {
			echo json_encode(['status' => 'erro', 'msg' => 'Dados ausentes']);
			return;
		}

		$parcelas = new Parcelas;
		$data = $parcelas->populate($n_parcela, $id_contrato);

		echo json_encode([
			'status' => 'ok',
			'data' => $data
		]);
	}

	public function editar()
	{
		$get_input_data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		$id_contrato = $get_input_data['id_contrato'] ?? null;
		$n_parcela = $get_input_data['n_parcela'] ?? null;
		$valor = $get_input_data['valor'] ?? null;
		$data_inicio = $get_input_data['data_inicio'] ?? null;
		$data_fim = $get_input_data['data_fim'] ?? null;
		$data_pag = isset($get_input_data['data_pag']) && $get_input_data['data_pag'] !== ''
			? $get_input_data['data_pag']
			: null;
		$data_rep = isset($get_input_data['data_rep']) && $get_input_data['data_rep'] !== ''
			? $get_input_data['data_rep']
			: null;


		$valor_teste = $valor;
		$valor_teste = str_replace('.', '', $valor_teste); // remove ponto
		$valor_teste = str_replace(',', '.', $valor_teste); // substitui
		$valor_teste = (float)$valor_teste; // converte para float
		// Se valor_teste for zero da erro
		if ($valor_teste <= 1) {
			$data = array(
				'status' => 'errozero',
			);
			$data = http_build_query($data);
			header('Location: ' . BASE_URL . 'financeiro?contrato=' . $id_contrato . '&' . $data);
			exit;
		}

		$parcelas = new Parcelas;
		$parcelas->editar(
			$n_parcela,
			$id_contrato,
			$data_inicio,
			$data_fim,
			$valor,
			$data_pag,
			$data_rep
		);
		$data = array(
			'status' => 'editado',
		);
		$data = http_build_query($data);
		header('Location: ' . BASE_URL . 'financeiro?contrato=' . $id_contrato . '&' . $data);
	}


	public function pagar($id_contrato, $id_parcela, $origem)
	{
		if (!empty($id_contrato) && !empty($id_parcela)) {
			$parcelas = new Parcelas;
			$parcelas->pagar($id_contrato, $id_parcela, $origem);
			$data = array(
				'status' => 'ok',
			);
			$data = http_build_query($data);
			header('Location: ' . BASE_URL . 'financeiro?contrato=' . $id_contrato . '&' . $data);
			exit;
		}
		header('Location: ' . BASE_URL . 'financeiro');
	}

	public function estornarpagamento($id_contrato, $id_parcela)
	{
		if (!empty($id_contrato) && !empty($id_parcela)) {
			$parcelas = new Parcelas;
			$parcelas->estornarPagamento($id_contrato, $id_parcela);
			$data = array(
				'status' => 'pagoestornado',
			);
			$data = http_build_query($data);
			header('Location: ' . BASE_URL . 'financeiro?contrato=' . $id_contrato . '&' . $data);
			exit;
		}
		header('Location: ' . BASE_URL . 'financeiro');
	}

	public function recb()
	{
		$dados = $this->dados;

		$empresa = new Config();
		$dados['empresa'] = $empresa->getEmpresa();

		$this->loadTemplate('financeiro/recibo-branco', $dados);
	}

	public function recibo($id_contrato, $id_parcela)
	{
		$dados = $this->dados;
		if (!empty($id_contrato) && !empty($id_parcela)) {

			$contratos = new Contratos;
			$parcela = new Parcelas;

			$dados['parcela'] = $parcela->getInfo($id_parcela, $id_contrato);

			/*if (count($dados['parcela']) == 0) { header('Location: '.BASE_URL.'financeiro');exit; }*/
			$dados['contrato'] = $contratos->contrato($id_contrato);

			$this->loadTemplate('financeiro/recibo', $dados);
			exit;
		}
		header('Location: ' . BASE_URL . 'financeiro');
	}

	public function gerarecibo()
	{

		$dados = $this->dados;

		//ARRAY DE DADOS DOS INPUTS
		$get_input_data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		//CHECAGEM SE O BOTÃO BUSCAR FOI CLICADO
		if (!empty($get_input_data['button-generate'])) {

			$dados['get_input_data'] = $get_input_data;

			$parcelas = new Parcelas;
			$dados['recibos'] = $parcelas->getRecibosByDate($dados['get_input_data']);

			$empresa = new Config;
			$dados['empresa'] = $empresa->getEmpresa();
		}

		$this->loadTemplate('financeiro/gerarecibo', $dados);
	}

	public function caixa()
	{
		$dados = $this->dados;

		$caixaHelper = new CaixaHelper;

		if ($caixaHelper->caixaFechado() == 0) {
			$this->loadTemplate('financeiro/caixafechado', $dados);
			exit;
		}

		$dados['caixa'] = $caixaHelper->getValores();
		$this->loadTemplate('financeiro/caixa', $dados);
	}

	public function repasse($id_contrato = 0, $n_parcela = 0)
	{

		if (!empty($id_contrato) && !empty($n_parcela)) {

			$proprietarios = new Proprietarios;
			$proprietarios->repasse($id_contrato, $n_parcela);
			$data = array(
				'status' => 'ok',
			);
			$data = http_build_query($data);

			header('Location: ' . BASE_URL . 'financeiro/repasse?contrato=' . $id_contrato . '&' . $data);
			exit;
		}


		$dados = $this->dados;
		$dados['parcelas'] = array();

		$filtros = array();

		if (!empty($_GET['contrato'])) {
			$filtros['contrato'] = abs(addslashes($_GET['contrato']));
			$filtros['repassadas'] = isset($_GET['rep']) ? $_GET['rep'] : 'true';
			$parcelas = new Parcelas();
			$dados['parcelas'] = $parcelas->getLista($filtros);
			$dados['searchText'] = $filtros['contrato'];
		}

		$this->loadTemplate('financeiro/proprietarios', $dados);
	}

	public function lancamentos($id_lancamento = null, $process = null)
	{
		$dados = $this->dados;
		$lancamentos = new Lancamentos;

		if ($process != null) {

			if ($id_lancamento != null && $process == 'del') {
				$lancamentos->del($id_lancamento);
			}

			if (empty($id_lancamento) && $process == 'add' && count($_POST) > 0) {

				/*$valor = addslashes($_POST['valor']);
				$valor = explode(',', $valor);
				$valor = str_replace([',', '.'], '', $valor[1]);
				*/

				$valor = addslashes($_POST['valor']);
				$valor = str_replace('.', '', $valor);
				$valor = str_replace(',', '.', $valor);


				$dados = array(
					'valor' => $valor,
					'data' => date('Y-m-d'),
					'tipo' => addslashes($_POST['tipo']),
					'info' => addslashes($_POST['info']),
					'id_user' => addslashes($_POST['id_user'])
				);

				/*  echo "<pre>";    
		                print_r($dados); 
		            exit;
				 */
				$lancamentos->add($dados);
			}

			header('Location: ' . BASE_URL . 'financeiro/lancamentos');
			exit;
		}

		$offset = 0;
		$limit = 12;

		if (!empty($_GET['p'])) {
			$p = abs(addslashes($_GET['p']));
			$offset = ($p * $limit) - $limit;
		}

		$dados['lancamentos'] = $lancamentos->getLista($offset, $limit);
		$dados['totalLancamentos'] = $lancamentos->getTotal();
		$dados['limitLancamentos'] = $limit;

		$this->loadTemplate('financeiro/lancamentos', $dados);
	}

	public function fecharcaixa()
	{
		$caixaHelper = new CaixaHelper;
		$caixaHelper->fechar();
		header('Location: ' . BASE_URL . 'financeiro/caixa');
	}

	public function reabrircaixa()
	{
		$caixaHelper = new CaixaHelper;
		$caixaHelper->reabrir();
		header('Location: ' . BASE_URL . 'financeiro/caixa');
	}
}
