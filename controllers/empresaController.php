<?php
class empresaController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
       $dados = array();
     
       $this->loadTemplate('empresa', $dados);
   }

   
}
