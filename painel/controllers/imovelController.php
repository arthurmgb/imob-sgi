<?php
class imovelController extends Controller {

    private $dados = array(
        'menu_ativo' => 'imoveis',
        'imoveis' => array(),
        'id_proprietario' => array()
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
        $limit = 10;
        $offset = 0;

        $p = new Proprietarios();
        $dados['proprietarios'] = $p->getList($offset, $limit);

        if(!empty($_POST['codigo_proprietario'])) {  

            $codigo_proprietario = addslashes($_POST['codigo_proprietario']);
            $endereco   = addslashes($_POST['endereco']);
            $cemig      = addslashes($_POST['cemig']);
            $bairro     = addslashes($_POST['bairro']);
            $cidade     = addslashes($_POST['cidade']);
            $uf         = addslashes($_POST['uf']);
            $cep        = addslashes($_POST['cep']);  
            $tipo       = addslashes($_POST['tipo']);
            $finalidade = addslashes($_POST['finalidade']);
            $valor      = addslashes($_POST['valor']);
            $iptu       = addslashes($_POST['iptu']);
            $reajuste   = addslashes($_POST['reajuste']);
            $comissao   = addslashes($_POST['comissao']);
            $dormitorios= addslashes($_POST['dormitorios']);
            $suites     = addslashes($_POST['suites']);
            $banheiros  = addslashes($_POST['banheiros']);
            $garagem    = addslashes($_POST['garagem']);
            $tamanho    = addslashes($_POST['tamanho']); 
            $outros     = addslashes($_POST['outros']);
            $site       = addslashes($_POST['site']);
            $id_user    = addslashes(filter_input(INPUT_POST, 'id_user', FILTER_VALIDATE_INT));

            $valor      = explode(',', $valor);
            $valor      = $valor[0];
            $valor      = str_replace([',', '.'], '', $valor);

            $id = 0;

            $i = new Imoveis();
            $id = $i->cadImoveis($codigo_proprietario, $endereco, $cemig, $bairro, $cidade, $uf, $cep, $tipo, $finalidade, $valor, $iptu, $reajuste, $comissao, $dormitorios, $suites, $banheiros, $garagem, $tamanho, $outros, $site, $id_user);

            if($id > 0) {
                $data = array(
                    'type' => 'success',
                    'msg' => 'Imóvel cadastrado com sucesso!'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'imovel/adicionar?'.$data);exit;
            } else {
                $data = array(
                    'type' => 'danger',
                    'msg' => 'Ocorreu um erro. Tente novamente mais tarde.'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'imovel/adicionar?'.$data);exit;
            }

            header('Location: '.BASE_URL.'imovel/adicionar?'.$data);exit;

        }
        if(!empty($_GET['msg'])) {
            $dados['error']['msg'] = $_GET['msg'];
            $dados['error']['type'] = $_GET['type'] ? 'success' : 'danger';
        }

        $this->loadTemplate('imoveis/add', $dados);
    }

    public function editar($id) {

        $dados = $this->dados;
        $i = new Imoveis();
        
        if(!empty($_POST['codigo_proprietario'])) {

            $codigo_proprietario = addslashes($_POST['codigo_proprietario']);
            $endereco        = addslashes($_POST['endereco']);
            $cemig           = addslashes($_POST['cemig']);
            $bairro          = addslashes($_POST['bairro']);
            $cidade          = addslashes($_POST['cidade']);
            $uf              = addslashes($_POST['uf']);
            $cep             = addslashes($_POST['cep']);  
            $tipo            = addslashes($_POST['tipo']);
            $finalidade      = addslashes($_POST['finalidade']);
            $valor           = addslashes($_POST['valor']);
            $iptu            = addslashes($_POST['iptu']);
            $reajuste        = addslashes($_POST['reajuste']);
            $comissao        = addslashes($_POST['comissao']);
            $status          = addslashes($_POST['status']);
            $dormitorios     = addslashes($_POST['dormitorios']);
            $suites          = addslashes($_POST['suites']);
            $banheiros       = addslashes($_POST['banheiros']);
            $garagem         = addslashes($_POST['garagem']);
            $tamanho         = addslashes($_POST['tamanho']); 
            $outros          = addslashes($_POST['outros']);
            $site            = addslashes($_POST['site']);

            $tamanho = str_replace(',', '.', $tamanho);

            if(isset($_FILES['fotos'])) {
                $fotos = $_FILES['fotos'];
            } else {
                $fotos = array();
            }

            $id = addslashes($id);

            $atualizou = $i->updateImovel($codigo_proprietario, $endereco, $cemig, $bairro, $cidade, $uf, $cep, $tipo, $finalidade, $valor, $iptu, $reajuste, $comissao, $status, $dormitorios, $suites, $banheiros, $garagem, $tamanho, $outros, $site, $fotos, $id);

            if($atualizou) {
                $data = array(
                    'type' => 'success',
                    'msg' => 'Imóvel atualizado com sucesso!'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'imovel/editar/'.$id.'?'.$data);exit;
            } else {
                $data = array(
                    'type' => 'danger',
                    'msg' => 'Ocorreu um erro. Tente novamente mais tarde.'
                    );
                $data = http_build_query($data);
                header('Location: '.BASE_URL.'imovel/editar/'.$id.'?'.$data);exit;
            }

            header('Location: '.BASE_URL.'imovel/editar/'.$id.'?'.$data);exit;

        }

        $dados['imoveis'] = $i->imovel($id);

        if(!empty($_GET['msg'])) {
            $dados['error']['msg'] = $_GET['msg'];
            $dados['error']['type'] = $_GET['type'] == 'success' ? 'success' : 'danger';
        }

        $proprietarios = new Proprietarios;
        $dados['nome_proprietario'] = $proprietarios->getNome($dados['imoveis']['cod_proprietario']);

       

        $this->loadTemplate('imoveis/update', $dados);
    }


    public function ver($id) {

        $dados = $this->dados;

        $limit = 0;
        $offset = 0;
        $p = new Proprietarios();
        $dados['proprietarios'] = $p->getList($offset, $limit);

        $i = new Imoveis();
        $dados['imoveis'] = $i->imovel($id);

        $this->loadTemplate('imoveis/view', $dados);
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

        $imob = new Imoveis();
        $dados['limitImoveis'] = $limit;
        $dados['totalImoveis'] = $imob->getTotalImoveis();
        $dados['imob'] = $imob->getList($offset, $limit);

        $tipos_imoveis = array(
            1 => 'Casa',
            2 => 'Apartamento',
            3 => 'Comercial'
        );       

        foreach ($dados['imob'] as $key => $im) {
            $tipo = $im['tipo'];
            $dados['imob'][$key]['tipo'] = $tipos_imoveis[$tipo];
        }

        $this->loadTemplate('imoveis/index', $dados);
    }


    public function del($id) {
        if(!empty($id)) {

            $del = new Imoveis();
            $del->removerImovel($id);
            header('Location: '.BASE_URL.'imovel');
        }
    }



    public function get_name_proprietario() {
        if(!empty($_GET['codigo'])) 
        {
            $codigo = addslashes($_GET['codigo']);

            $proprietarios = new Proprietarios;
            $name = $proprietarios->getNome($codigo);

            echo json_encode(array('name' => $name));
        }
    }

    public function apagar_foto() {
        $m = $_SERVER['REQUEST_METHOD'];

        if ($m == 'POST' && !empty($_POST['foto']) && $_POST['foto'] > 0) {
            $foto = addslashes(filter_input(INPUT_POST, 'foto', FILTER_VALIDATE_INT));
            $galeria = new Galeria;
            $r = $galeria->apagarFoto($foto);

            header('Content-Type: application/json');
            echo json_encode(array('proccess' => $r));
            exit;
        }
    }

    public function getlista() {
        $m = $_SERVER['REQUEST_METHOD'];
        if ($m == 'POST' && !empty($_POST['valor'])) {

            $search = addslashes($_POST['valor']);

            $filtros = array(
                'search' => $search
            );

            $imoveis = new Imoveis;
            $data = $imoveis->getList(0, 5, $filtros);

            $tipos_imoveis = array(
                1 => 'Casa',
                2 => 'Apartamento',
                3 => 'Comercial'
            );       

            foreach ($data as $key => $im) {
                $tipo = $im['tipo'];
                $data[$key]['tipo'] = $tipos_imoveis[$tipo];
            }

            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }

    



}

