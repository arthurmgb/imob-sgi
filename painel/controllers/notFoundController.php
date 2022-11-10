<?php
class notFoundController extends Controller {
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
        $this->loadTemplate('404', $dados);
    }

}