<?php
class searchController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
       $dados = array();

       $this->loadTemplate('search', $dados);
   }

   
}
