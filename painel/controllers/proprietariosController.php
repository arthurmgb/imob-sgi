<?php
class proprietariosController extends Controller {

    private $dados = array(
        'menu_ativo' => 'proprietarios'
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
            $banco          = addslashes($_POST['banco']);
            $tipo_conta     = addslashes($_POST['tipo_conta']);
            $agencia        = addslashes($_POST['agencia']);
            $conta          = addslashes($_POST['conta']);
            $operacao       = addslashes($_POST['operacao']);
            $pix            = addslashes($_POST['pix']);
            $nacionalidade  = addslashes($_POST['nacionalidade']);
            $estado_civil   = addslashes($_POST['estado_civil']);
            $profissao      = addslashes($_POST['profissao']);
            $endereco       = addslashes($_POST['endereco']);
            $bairro         = addslashes($_POST['bairro']);
            $cidade         = addslashes($_POST['cidade']);
            $uf             = addslashes($_POST['uf']);
            $cep            = addslashes($_POST['cep']);
            $telefone       = addslashes($_POST['telefone']);
            $info           = addslashes($_POST['info']);
            $pagamento      = addslashes($_POST['pagamento']);

            $id = 0;
            $cadProp = new Proprietarios();
            $id = $cadProp->cadProprietario($nome, $cpf, $rg, $banco, $tipo_conta, $agencia, $conta, $operacao, $pix, $nacionalidade, $estado_civil, $profissao, $endereco, $bairro, $cidade, $uf, $cep, $telefone, $info, $pagamento);

            if($id > 0) {
                $data = array(
                    'type' => 'success',
                    'msg' => 'Proprietario cadastrado com sucesso!'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'proprietarios/adicionar?'.$data);exit;
            } else {
                $data = array(
                    'type' => 'danger',
                    'msg' => 'Ocorreu um erro.'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'proprietarios/adicionar?'.$data);exit;
            }
        }
        if(!empty($_GET['msg'])) {
            $dados['error']['msg'] = $_GET['msg'];
            $dados['error']['type'] = $_GET['type'] ? 'success' : 'danger';
        }

        $this->loadTemplate('proprietarios/add', $dados);
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

        $p = new Proprietarios();
        $dados['limitProprietarios'] = $limit; 
        $dados['totalProprietarios'] = $p->getTotalProprietarios();
        $dados['proprietario'] = $p->getList($offset, $limit);
        
        
        $this->loadTemplate('proprietarios/index', $dados);
    }

    public function ver($id) {
        $dados = $this->dados;

        $proprietario = new Proprietarios();
        $dados['proprietario'] = $proprietario->proprietario($id);
        $dados['getImoveis'] = $proprietario->getListImoveis($id);
        $dados['getInqs'] = $proprietario->getListInqs($id);

        $this->loadTemplate('proprietarios/view', $dados);
    }

    public function editar($id) {
        $dados = $this->dados;

        if(!empty($_POST['nome'])){

            $nome           = addslashes($_POST['nome']);
            $cpf            = addslashes($_POST['cpf']);
            $rg             = addslashes($_POST['rg']);
            $banco          = addslashes($_POST['banco']);
            $tipo_conta     = addslashes($_POST['tipo_conta']);
            $agencia        = addslashes($_POST['agencia']);
            $conta          = addslashes($_POST['conta']);
            $operacao       = addslashes($_POST['operacao']);
            $pix            = addslashes($_POST['pix']);
            $nacionalidade  = addslashes($_POST['nacionalidade']);
            $estado_civil   = addslashes($_POST['estado_civil']);
            $profissao      = addslashes($_POST['profissao']);
            $endereco       = addslashes($_POST['endereco']);
            $bairro         = addslashes($_POST['bairro']);
            $cidade         = addslashes($_POST['cidade']);
            $uf             = addslashes($_POST['uf']);
            $cep            = addslashes($_POST['cep']);
            $telefone       = addslashes($_POST['telefone']);
            $info           = addslashes($_POST['info']);
            $status         = addslashes($_POST['status']);
            $pagamento      = addslashes($_POST['pagamento']);

            $upPro = new Proprietarios();
            $upPro->upProprietario($id, $nome, $cpf, $rg, $banco, $tipo_conta, $agencia, $conta, $operacao, $pix, $nacionalidade, $estado_civil, $profissao, $endereco, $bairro, $cidade, $uf, $cep, $telefone, $info, $status, $pagamento);

            if($id > 0) {
                $data = array(
                    'type' => 'success',
                    'msg' => 'Proprietario atualizado com sucesso!'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'proprietarios/editar/'.$id.'?'.$data);exit;
            } else {
                $data = array(
                    'type' => 'danger',
                    'msg' => 'Ocorreu um erro.'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'proprietarios/editar/'.$id.'?'.$data);exit;
            } 

        }

        if(!empty($_GET['msg'])) {
            $dados['error']['msg'] = $_GET['msg'];
            $dados['error']['type'] = $_GET['type'] ? 'success' : 'danger';
        }
       

        $proprietario = new Proprietarios();
        $dados['proprietario'] = $proprietario->proprietario($id);

        $this->loadTemplate('proprietarios/update', $dados);
    }

    public function del($id){
        if(!empty($id)) {
            $del = new Proprietarios();
            $del->removerProprietario($id);
            header('Location: '.BASE_URL.'proprietarios');
        }

    }
    
    public function getlista() {
        $m = $_SERVER['REQUEST_METHOD'];
        if ($m == 'POST' && !empty($_POST['valor'])) {

            $search = addslashes($_POST['valor']);

            $filtros = array(
                'search' => $search
            );

            $proprietarios = new Proprietarios;
            $data = $proprietarios->getList(0, 99999, $filtros);

            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }


}