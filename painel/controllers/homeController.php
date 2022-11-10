<?php
class homeController extends Controller {
    private $user;

    private $dados = array(
        'menu_ativo' => 'dashboard'
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
       
       $imovel = new Imoveis();
       $dados['disponiveis'] = $imovel->disponiveis(10);  ///quantidade imoveis disponiveis 
       $dados['totalImoveis'] = $imovel->getTotalImoveis(); 

       $proprietarios = new Proprietarios();
       $dados['totalProprietarios'] = $proprietarios->getTotalProprietarios();

       $inquilinos = new Inquilinos();
       $dados['totalInquilinos'] = $inquilinos->qtdInquilinoAtivos();

       $contratos = new Contratos();
       $dados['totalContratos'] = $contratos->getTotalContratos();
       

       $vencidos = new Parcelas();
       $dados['atrasado'] = $vencidos->getPagAtrasado();

      $contrato = new Contratos();
      $dados['contrato'] = $contrato->getContratosAtrasados(0, 15);


       $this->loadTemplate('paginas/home', $dados);

       
   }

   
}
