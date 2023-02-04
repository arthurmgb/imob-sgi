<?php
class homeController extends Controller
{
    private $user;

    private $dados = array(
        'menu_ativo' => 'dashboard'
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

        //IMÓVEIS
        $imovel = new Imoveis();
        $dados['totalImoveis'] = $imovel->getTotalImoveis();
        $dados['disponiveis'] = $imovel->disponiveis(10);
        $dados['ocupados'] = $imovel->ocupados();

        //INQUILINOS
        $inquilinos = new Inquilinos();
        $dados['totalInquilinos'] = $inquilinos->getTotalInquilinos();
        $dados['totalInquilinosAtivos'] = $inquilinos->qtdInquilinoAtivos();
        $dados['totalInquilinosInativos'] = $inquilinos->qtdInquilinoInativos();

        //PROPRIETÁRIOS
        $proprietarios = new Proprietarios();
        $dados['totalProprietarios'] = $proprietarios->getTotalProprietarios();
        $dados['totalProprietariosAtivos'] = $proprietarios->qtdProprietariosAtivos();
        $dados['totalProprietariosInativos'] = $proprietarios->qtdProprietariosInativos();

        //CONTRATOS
        $contratos = new Contratos();
        $dados['totalContratos'] = $contratos->getTotalContratos();

        //TABELAS
        $vencidos = new Parcelas();
        $dados['atrasado'] = $vencidos->getPagAtrasado();

        $contrato = new Contratos();
        $dados['contrato'] = $contrato->getContratosAtrasados(0, 15);

        $this->loadTemplate('paginas/home', $dados);
    }
}
