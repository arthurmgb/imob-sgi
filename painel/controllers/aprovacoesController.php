<?php
class aprovacoesController extends Controller
{

    private $dados = array(
        'menu_ativo' => 'aprovacoes'
    );

    public function __construct()
    {
        parent::__construct();
        $this->user = new Usuarios();
        if (!$this->user->checkLogin()) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
        if ($_SESSION['user']['nivel'] != '1') {
            header("Location: " . BASE_URL . '404');
            exit;
        }
    }

    public function index()
    {
        $dados = $this->dados;

        $contratos = new Contratos();
        $dados['contratos'] = $contratos->getAprovacoes();
        $dados['contratos_excluidos'] = $contratos->getExcluidos();

        $this->loadTemplate('aprovacoes/index', $dados);
    }

    public function aprovar($id)
    {
        $contratos = new Contratos();
        $contratos->aprovarExclusao($id);

        $data = array(
            'type' => 'success',
            'msg' => 'Exclusão do contrato ' . $id . ' aprovada com sucesso!'
        );

        $data = http_build_query($data);

        header('Location: ' . BASE_URL . 'aprovacoes?' . $data);
    }

    public function revogar($id)
    {
        $contratos = new Contratos();
        $contratos->revogarExclusao($id);

        $data = array(
            'type' => 'success',
            'msg' => 'Exclusão do contrato ' . $id . ' revogada com sucesso!'
        );

        $data = http_build_query($data);

        header('Location: ' . BASE_URL . 'aprovacoes?' . $data);
    }
}
