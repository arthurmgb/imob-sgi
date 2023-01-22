<?php
class contratosController extends Controller {

  private $dados = array(
    'menu_ativo' => 'contratos'
  );

	public function __construct() {
		parent::__construct();
		$this->user = new Usuarios();
		if(!$this->user->checkLogin()) {
			header("Location: ".BASE_URL."login");
			exit;
		}   
	}

	public function adicionar() {
		$dados = $this->dados;

    	if(!empty($_POST['periodo'])) {

    		$info = addslashes($_POST['info']);
    		$cod_proprietario = addslashes($_POST['cod_proprietario']);
    		$cod_imovel = addslashes(($_POST['cod_imovel']));
    		$cod_inquilino = addslashes($_POST['cod_inquilino']);
    		$fiador1 = addslashes($_POST['fiador1']);
        $fiador2 = addslashes($_POST['fiador2']);
        $data_inicio = addslashes($_POST['data_inicio']);
    		$periodo = addslashes($_POST['periodo']);
        $valor = addslashes($_POST['valor']);

    		$data_inicio = strtotime($data_inicio);
    		$data_final = strtotime('+ '.$periodo.' months', $data_inicio);

    		$contratos = new Contratos;
    		$id = $contratos->adicionar(
				$cod_imovel, $cod_inquilino,
				$cod_proprietario, $fiador1,
        $fiador2, $data_inicio,
				$data_final, $periodo, $info,
        $valor);
    	
  			if($id > 0) {
                $data = array(
                    'type' => 'success',
                    'msg' => 'Contrato cadastrado com sucesso!'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'contratos/adicionar?'.$data);exit;
            } else {
                $data = array(
                    'type' => 'danger',
                    'msg' => 'Ocorreu um erro.'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'contratos/adicionar?'.$data);exit;
            }
        }

        if(!empty($_GET['msg'])) {
            $dados['error']['msg'] = addslashes($_GET['msg']);
            $dados['error']['type'] = addslashes($_GET['type']);
        }

        if (!empty($_GET['imovel'])) {
            $imoveis = new Imoveis;
            $id = addslashes($_GET['imovel']);
            $dados['imovel'] = $imoveis->getInfoImovelValido($id);
        }

		$this->loadTemplate('contratos/add', $dados);
	}

	public function index() {
		$dados = $this->dados;

        $offset = 0;
        $limit = 12;

        $filtros = array();

        if(!empty($_GET['status'])) {
            $filtros['status'] = addslashes(filter_input(INPUT_GET, 'status', FILTER_VALIDATE_INT));
        }

        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $p = addslashes($_GET['p']);
            $p = abs($p);
            $offset = ($limit * $p) - $limit;
        }   

		$contrato = new Contratos();
        $dados['limitContratos'] = $limit;
		$dados['totalContratos'] = $contrato->getTotalContratos($filtros);
        $dados['contrato'] = $contrato->getContratos($offset, $limit, $filtros);
		$dados['filtros'] = $filtros;

		$this->loadTemplate('contratos/index', $dados);
	}

    public function ver($id) {
        $dados = $this->dados;

        $contratos = new Contratos;
        $dados['contrato'] = $contratos->contrato($id);

        $this->loadTemplate('contratos/view', $dados);
    } 

	public function getInfoContrato() {
		$m = $_SERVER['REQUEST_METHOD'];

		if ($m == 'POST') {
			$valor = addslashes($_POST['parametro']);

			if(!empty($valor)) {
				$search = new Contratos();
				$response = $search->busca($valor);

				header('Content-Type: application/json');
				echo json_encode($response);
			}

		}
		
	}

	public function del($id) {
		$contratos = new Contratos;
		$contratos->del($id);
		header('Location: '.BASE_URL.'contratos');
	}

	public function getlista() {
        $m = $_SERVER['REQUEST_METHOD'];
        if ($m == 'POST' && !empty($_POST['valor'])) {

            $search = addslashes($_POST['valor']);

            $filtros = array(
                'search' => $search
            );

            $contratos = new Contratos;
            $data = $contratos->getlist(0, 99999, $filtros);

            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }

    
    
     public function buscar(){
        $dados = $this->dados;
         $offset = 0;
        $limit = 16;


        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $p = addslashes($_GET['p']);
            $p = abs($p);
            $offset = ($limit * $p) - $limit;
        }   

        $contrato = new Contratos();
        $dados['limitContratos'] = $limit;
        $dados['totalContratos'] = $contrato->getTotalContratos();
        $dados['contrato'] = $contrato->searchContratos($offset, $limit);
        $this->loadTemplate('contratos/buscar', $dados);
    }   
    
    public function renovar($id){
        $dados = $this->dados;

        $contratos = new Contratos;
        $dados['contrato'] = $contratos->contrato($id);

        if(!empty($_POST['periodo'])) {

        $referencia_imovel = addslashes($_POST['referencia_imovel']);    
        $n_valor = addslashes($_POST['n_valor']);   
        $reajuste = addslashes($_POST['reajuste']); 
        $iptu  =    addslashes($_POST['iptu']);    
        $data_inicio = addslashes($_POST['data_inicio']); 
        $periodo = addslashes($_POST['periodo']);
        $id_contrato =  addslashes($_POST['id_contrato']);

        $id_user = $_SESSION['user']['id'];
        $data_inicio = strtotime($data_inicio);
        $data_final = strtotime('+ '.$periodo.' months', $data_inicio);
            
        $renovar = $contratos->update($id_contrato, $referencia_imovel, $reajuste, $iptu, $n_valor, $periodo, $data_inicio, $data_final, $id_user);
        


            if($renovar > 0) {
                $data = array(
                    'type' => 'danger',
                    'msg' => 'Ocorreu um erro.'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'contratos/renovar/'.$id.'?'.$data);exit;
            } else {
                $data = array(
                    'type' => 'success',
                    'msg' => 'Sucesso! Contrato renovado para mais 1 ano.'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'contratos/renovar/'.$id.'?'.$data);exit;
            }
        }

        if(!empty($_GET['msg'])) {
            $dados['error']['msg'] = addslashes($_GET['msg']);
            $dados['error']['type'] = addslashes($_GET['type']);
        }

        if (!empty($_GET['imovel'])) {
            $imoveis = new Imoveis;
            $id = addslashes($_GET['imovel']);
            $dados['imovel'] = $imoveis->getInfoImovelValido($id);
        }
        

        $this->loadTemplate('contratos/update', $dados);
    }


}
