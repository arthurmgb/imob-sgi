<?php
class inquilinosController extends Controller {

    private $dados = array(
        'menu_ativo' => 'inquilinos'
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

            $nome           = addslashes($_POST['nome']); 
            $cpf            = addslashes($_POST['cpf']); 
            $rg             = addslashes($_POST['rg']);
            $nacionalidade  = addslashes($_POST['nacionalidade']);
            $estado_civil   = addslashes($_POST['estado_civil']); 
            $profissao      = addslashes($_POST['profissao']); 
            $telefone       = addslashes($_POST['telefone']); 
            $info           = addslashes($_POST['info']);  

            $id = 0;

            $cadInq = new Inquilinos();
            $id = $cadInq->CadInq($nome, $cpf, $rg, $nacionalidade, $estado_civil, $profissao, $telefone, $info); 

            if($id > 0) {
                $data = array(
                    'type' => 'success',
                    'msg' => 'Inquilino cadastrado com sucesso!'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'inquilinos/adicionar?'.$data);exit;
            } else {
                $data = array(
                    'type' => 'danger',
                    'msg' => 'Ocorreu um erro.'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'inquilinos/adicionar?'.$data);exit;
            }
        }   
        if(!empty($_GET['msg'])) {
            $dados['error']['msg'] = $_GET['msg'];
            $dados['error']['type'] = $_GET['type'] ? 'success' : 'danger';
        }

        $this->loadTemplate('inquilinos/add', $dados);
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

        $iq = new Inquilinos();
        $dados['limitInquilinos'] = $limit;
        $dados['totalInquilinos'] = $iq->getTotalInquilinos();
        $dados['inquilinos'] = $iq -> getlist($offset, $limit);

        $this->loadTemplate('inquilinos/index', $dados);
    }

    public function ver($id) {
        $dados = $this->dados;

        $iq = new Inquilinos();
        $dados['inquilino'] = $iq->inquilino($id);
        
        $this->loadTemplate('inquilinos/view', $dados);
    }

    public function editar($id) {
        $dados = $this->dados;

        if(!empty($_POST['nome'])){
            $nome           = addslashes($_POST['nome']);
            $cpf            = addslashes($_POST['cpf']);
            $rg             = addslashes($_POST['rg']);
            $nacionalidade  = addslashes($_POST['nacionalidade']);
            $estado_civil   = addslashes($_POST['estado_civil']);
            $profissao      = addslashes($_POST['profissao']);
            $telefone       = addslashes($_POST['telefone']);
            $info           = addslashes($_POST['info']);
            $status         = addslashes($_POST['status']);

            $upInq = new Inquilinos();
            $upInq->updateInquilinos(
                $id, $nome, $cpf, $rg, $nacionalidade, $estado_civil, $profissao, $telefone, $info, $status); 

            if($id > 0) {
                $data = array(
                    'type' => 'success',
                    'msg' => 'Inquilino atualizado com sucesso!'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'inquilinos/editar/'.$id.'?'.$data);exit;
            } else {
                $data = array(
                    'type' => 'danger',
                    'msg' => 'Ocorreu um erro.'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'inquilinos/editar/'.$id.'?'.$data);exit;
            } 
        }
        if(!empty($_GET['msg'])) {
            $dados['error']['msg'] = $_GET['msg'];
            $dados['error']['type'] = $_GET['type'] ? 'success' : 'danger';
        }
        
        $inquilino = new Inquilinos();
        $dados['inquilino'] = $inquilino->inquilino($id);

        if (count($dados['inquilino']) == 0) { header('Location: '.BASE_URL.'inquilinos/listar'); exit; }

        $this->loadTemplate('inquilinos/update', $dados);
    }



    public function del($id) {
        if(!empty($id)) {
            $del = new Inquilinos();
            $del->removerInquilinos($id);
            header('Location: '.BASE_URL.'inquilinos');
        }
    }

    public function get_name_inquilino() {
        $m = $_SERVER['REQUEST_METHOD'];
        if($m == 'POST' && !empty($_POST['codigo'])) {
            $codigo = addslashes($_POST['codigo']);

            $inquilinos = new Inquilinos;
            $nome = $inquilinos->getNome($codigo);

            header('Content-Type: application/json');
            echo json_encode(array('nome' => $nome));
        }
    }

    public function getlista() {
        $m = $_SERVER['REQUEST_METHOD'];
        if ($m == 'POST' && !empty($_POST['valor'])) {

            $search = addslashes($_POST['valor']);

            $filtros = array(
                'search' => $search
            );

            $inquilinos = new Inquilinos;
            $data = $inquilinos->getList(0, 5, $filtros);

            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }

}
