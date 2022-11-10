<?php
class imoveisController extends Controller {

    public function index() {
       $dados = array();
       
       $this->loadTemplate('imoveis', $dados);
    }

    public function alugar(){
        $dados = array();
        $aluga = new Imoveis();
        $dados['aluga'] = $aluga->getImoveisAluguel(0,100);
       $this->loadTemplate('alugar', $dados);
    }

    public function comprar(){
        $dados = array();
        $comprar = new Imoveis();
        $dados['comprar'] = $comprar->getImoveisComprar(0,100);
       $this->loadTemplate('comprar', $dados);
    }

    public function ver($id) {
        $dados = array();
        $imob = new Imoveis();
        $dados['imovel'] = $imob->imovel($id);
        $this->loadTemplate('ver', $dados);


    }

}

