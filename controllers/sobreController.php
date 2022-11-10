<?php
class sobreController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
       $dados = array();
       $empresa = new Sobre();
       $dados['empresa'] = $empresa->getInfo();
      $this->loadTemplate('sobre', $dados);
   }
}
?>