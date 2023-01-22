<?php
class fiadoresController extends Controller {

    private $dados = array(
        'menu_ativo' => 'fiadores'
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

        if(!empty($_POST['nome'])){

            $cod                = addslashes($_POST['codigo_inquilino']);
            $nome               = addslashes($_POST['nome']); 
            $cpf                = addslashes($_POST['cpf']); 
            $rg                 = addslashes($_POST['rg']);
            $nacionalidade      = addslashes($_POST['nacionalidade']);
            $estado_civil       = addslashes($_POST['estado_civil']); 
            $profissao          = addslashes($_POST['profissao']);
            $endereco           = addslashes($_POST['endereco']);
            $bairro             = addslashes($_POST['bairro']);
            $cidade             = addslashes($_POST['cidade']);
            $uf                 = addslashes($_POST['uf']); 
            $cep                = addslashes($_POST['cep']);
            $telefone           = addslashes($_POST['telefone']); 

            $id = 0;

            $cadFiadores = new Fiadores();
            $id = $cadFiadores->CadFiadores($cod, $nome, $cpf, $rg, $nacionalidade, $estado_civil, $profissao, $endereco, $bairro, $cidade, $uf, $cep, $telefone); 

            if($id > 0) {
                $data = array(
                    'type' => 'success',
                    'msg' => 'Fiador cadastrado com sucesso!'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'fiadores/adicionar?'.$data);exit;
            } else {
                $data = array(
                    'type' => 'danger',
                    'msg' => 'Ocorreu um erro.'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'fiadores/adicionar?'.$data);exit;
            }
        }

        if(!empty($_GET['msg'])) {
            $dados['error']['msg'] = addslashes($_GET['msg']);
            $dados['error']['type'] = addslashes($_GET['type']);
        }

        $this->loadTemplate('fiadores/add', $dados);
    }

    public function editar($id) {
        $dados = $this->dados;

        if(!empty($_POST['nome'])){
            $nome               = addslashes($_POST['nome']);
            $cpf                = addslashes($_POST['cpf']); 
            $rg                 = addslashes($_POST['rg']); 
            $nacionalidade      = addslashes($_POST['nacionalidade']);
            $estado_civil       = addslashes($_POST['estado_civil']); 
            $profissao          = addslashes($_POST['profissao']); 
            $endereco           = addslashes($_POST['endereco']); 
            $bairro             = addslashes($_POST['bairro']); 
            $cidade             = addslashes($_POST['cidade']); 
            $uf                 = addslashes($_POST['uf']); 
            $cep                = addslashes($_POST['cep']); 
            $telefone           = addslashes($_POST['telefone']);

            $upFiadores = new Fiadores();
            $upFiadores->updateFiadores(
                $id, $nome, $cpf, $rg, $nacionalidade, $estado_civil, $profissao, $endereco, $bairro, $cidade, $uf, $cep, $telefone); 
            if($id > 0) {
                $data = array(
                    'type' => 'success',
                    'msg' => 'Fiador atualizado com sucesso!'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'fiadores/editar/'.$id.'?'.$data);exit;
            } else {
                $data = array(
                    'type' => 'danger',
                    'msg' => 'Ocorreu um erro.'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'fiadores/editar/'.$id.'?'.$data);exit;
            } 
        }
        if(!empty($_GET['msg'])) {
            $dados['error']['msg'] = $_GET['msg'];
            $dados['error']['type'] = $_GET['type'] ? 'success' : 'danger';
        }
        
        $fiadores = new Fiadores();
        $dados['fiador'] = $fiadores->fiador($id);

        if (count($dados['fiador']) == 0) { header('Location: '.BASE_URL.'fiadores/listar'); exit; }


        $this->loadTemplate('fiadores/update', $dados);
    }

    public function del($id) {
        if(!empty($id)) {
            $del = new Fiadores();
            $del->removerFiadores($id);
            header('Location: '.BASE_URL.'fiadores');
        }
    }

    public function index() {
        $dados = $this->dados;

        $offset = 0;
        $limit = 12;

        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $p = addslashes($_GET['p']);
            $p = abs($p);
            $offset = ($limit * $p) - $limit;
        }    

        $iq = new Fiadores();
        $dados['limitFiadores'] = $limit;
        $dados['totalFiadores'] = $iq->getTotalFiadores();
        $dados['fiadores'] = $iq->getlist($offset, $limit);

        $this->loadTemplate('fiadores/index', $dados);
    }

    public function ver($id) {
        $dados = $this->dados;

        $fiadores = new Fiadores;
        $dados['fiador'] = $fiadores->fiador($id);

        if (count($dados['fiador']) == 0) { header('Location: '.BASE_URL.'fiadores/listar'); exit; }

        $this->loadTemplate('fiadores/view', $dados);
    }

    public function getlista() {
        $m = $_SERVER['REQUEST_METHOD'];
        if ($m == 'POST' && !empty($_POST['valor'])) {

            $search = addslashes($_POST['valor']);

            $filtros = array(
                'search' => $search
                );

            $fiadores = new Fiadores;
            $data = $fiadores->getList(0, 99999, $filtros);

            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }

    public function peganomesfiadores() {
        $m = $_SERVER['REQUEST_METHOD'];

        if ($m == 'POST' && !empty($_POST['valor'])) {
            $response = [
                'inquilino' => '',
                'fiadores' => []
            ];

            $valor = addslashes($_POST['valor']);

            $fiadores = new Fiadores;
            $inquilino = new Inquilinos;
            $response['inquilino'] = $inquilino->getNome($valor);
            $response['fiadores'] = $fiadores->getFiadoresByCodInquilino($valor);

            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }


}