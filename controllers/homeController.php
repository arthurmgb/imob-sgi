<?php
class homeController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
       $dados = array();

       $imovel = new Imoveis();
       $dados['imovel']	= $imovel->getImoveis(0, 100);

       $this->loadTemplate('home', $dados);
           
   }

   
}
