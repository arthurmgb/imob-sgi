<!doctype html>
<html lang="pt-br">
<body>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="IMOB- Sistema de Gerenciamento Imobiliario<">
    <meta name="author" content="Lucas Silva | Arthur Oliveira">
    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?>assets/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/plugins/lightbox/css/lightbox.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <title>Imobiliaria Sol & Lua</title>
    <script src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
  </head>

  <nav class="navbar fixed-top navbar-expand-lg" style="background-color: #212529 !important; min-height: 135px">
    <div class="container">
      <a class="navbar-brand" href="<?php echo BASE_URL;?>" alt="">
        <img src="<?php echo BASE_URL;?>assets/images/solelua.png" width="205" >
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL;?>" >Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL;?>imoveis/alugar">Alugar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL;?>imoveis/comprar">Comprar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL;?>empresa">Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL;?>contato">Contato</a>
          </li>
        </ul>
        <div class="input-group my-2 my-md-0 col-md-4">
          <input type="search" class="form-control" placeholder="Pesquise pelo cod:" aria-label="Search term" aria-describedby="basic-addon">
          <div class="input-group-append">
            <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <?php
  $this->loadViewInTemplate($viewName, $viewData);
  ?>	

  <footer>
    <div class="container">
     <div class="row text-center text-xs-center text-sm-left text-md-left">
      <div class="col-xs-12 col-sm-4 col-md-4">
       <h5>Sobre</h5>
       <ul class="list-unstyled quick-links">
        <li><a href="<?php echo BASE_URL;?>"><i class="fa fa-angle-double-right"></i>Home</a></li>
        <li><a href="<?php echo BASE_URL;?>empresa"><i class="fa fa-angle-double-right"></i>Empresa</a></li>
        <li><a href="<?php echo BASE_URL;?>contato"><i class="fa fa-angle-double-right"></i>Contato</a></li>
      </ul>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4">
     <h5>Imoveis</h5>
     <ul class="list-unstyled quick-links">
      <li><a href="<?php echo BASE_URL;?>imoveis/alugar"><i class="fa fa-angle-double-right"></i>Alugar</a></li>
      <li><a href="<?php echo BASE_URL;?>imoveis/comprar"><i class="fa fa-angle-double-right"></i>Comprar</a></li>
      <li><a href="<?php echo BASE_URL;?>imoveis/contato"><i class="fa fa-angle-double-right"></i>Anuncie seu Imóvel</a></li>
    </ul>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4">
   <h5>Contato</h5>
   <ul class="list-unstyled quick-links">
    <li><a href="<?php echo BASE_URL;?>"><i class="fa fa-map-marker"></i> Rua Pinto Dias,263 Centro - Patrocinio/MG</a></li>
    <li><a href="<?php echo BASE_URL;?>"><i class="fa fa-phone"></i> (34) 3831-3636</a></li>
    <li><a href="<?php echo BASE_URL;?>"><i class="fa fa-envelope"></i> Soleluaimobiliaria@hotmail.com</a></li>
  </ul>
</div>
</div>
<div class="row">
 <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
  <p>&copy Todos os direitos reservados para Imobiliaria Sol & Lua. </p>
  <p>Desenvolvido por: <a class="ml-2" style="color: #FFF !important;" href="https://www.facebook.com/id.webdesinger/" target="_blank">IDWEB</a></p>
</div>
</div>
</hr>
</div>  
</div>
</footer>

<script src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
<script src="<?php echo BASE_URL; ?>assets/plugins/lightbox/js/lightbox.js"></script>
</body>		
</html>