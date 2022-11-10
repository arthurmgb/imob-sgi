<?php
class financeiroController extends Controller {

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

	public function index() {
		$dados = $this->dados;
		$dados['parcelas'] = array(); 
		
		$filtros = array();

		if (!empty($_GET['contrato'])) {
			$filtros['contrato'] = abs(addslashes($_GET['contrato']));

			$parcelas = new Parcelas();
			$dados['parcelas'] = $parcelas->getLista($filtros);
			$dados['searchText'] = $filtros['contrato'];
		}
 
		$this->loadTemplate('financeiro/index', $dados);
	}

	public function pagar($id_contrato, $id_parcela) {
		if (!empty($id_contrato) && !empty($id_parcela)) {
			$parcelas = new Parcelas;
			$parcelas->pagar($id_contrato, $id_parcela);
			header('Location: '.BASE_URL.'financeiro?contrato='.$id_contrato);
			exit;
		}
		header('Location: '.BASE_URL.'financeiro');
	}

	public function recb(){
		$dados = $this->dados;

		$empresa = new Config();
		$dados['empresa'] = $empresa->getEmpresa();

		$this->loadTemplate('financeiro/recibo-branco', $dados);
	}

	public function recibo($id_contrato, $id_parcela) {
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
		header('Location: '.BASE_URL.'financeiro');
	}

	public function caixa() {
		$dados = $this->dados;

		$caixaHelper = new CaixaHelper;
		
		if ($caixaHelper->caixaFechado() == 0) {
			$this->loadTemplate('financeiro/caixafechado', $dados);
			exit;
		}

		$dados['caixa'] = $caixaHelper->getValores();
		$this->loadTemplate('financeiro/caixa', $dados);
	}

	public function repasse($id_contrato = 0, $n_parcela = 0) {

		if (!empty($id_contrato) && !empty($n_parcela)) {

			$proprietarios = new Proprietarios;
			$proprietarios->repasse($id_contrato, $n_parcela);

			header('Location: '.BASE_URL.'financeiro/repasse?contrato='.$id_contrato);
			exit;
		}


		$dados = $this->dados;
		$dados['parcelas'] = array(); 
		
		$filtros = array();

		if (!empty($_GET['contrato'])) {
			$filtros['contrato'] = abs(addslashes($_GET['contrato']));

			$parcelas = new Parcelas();
			$dados['parcelas'] = $parcelas->getLista($filtros);
			$dados['searchText'] = $filtros['contrato'];
		}
 
		$this->loadTemplate('financeiro/proprietarios', $dados);
	}

	public function lancamentos($id_lancamento=null, $process=null) {
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

			header('Location: '.BASE_URL.'financeiro/lancamentos');
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

	public function fecharcaixa() {
		$caixaHelper = new CaixaHelper;
		$caixaHelper->fechar();
		header('Location: '.BASE_URL.'financeiro/caixa');
	}

	public function reabrircaixa() {
		$caixaHelper = new CaixaHelper;
		$caixaHelper->reabrir();
		header('Location: '.BASE_URL.'financeiro/caixa');
	}
}

?>