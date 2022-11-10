<?php
if(file_exists("login/init.php")){
        require_once "login/init.php";
} else {
        die("Arquivo de init não encontrado");
}

require_once "login/seguranca.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>BRSERVE / SA :: Admin - IMOBILIARIA</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/principal.css">
<link rel="stylesheet" type="text/css" href="css/lavalamp.css" media="screen">


<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.lavalamp.js"></script>
<script type='text/javascript' src="js/jquery.easing.1.1.js"></script>
	<script type="text/javascript" src="js/easySlider1.7.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){	
			$("#slider").easySlider({
				auto: true, 
				continuous: true,
				numeric: true
			});
		});	
	</script>
    <script type="text/javascript">
		jQuery(document).ready(function() {
			$(".lavaLamp").lavaLamp({ fx: "backout", speed: 700 });
		});
	</script>

<!-- Menu -->    
<script type="text/javascript" src="js/menu.js"></script>

</head>
<body>
<div id="bg">
	<div id="cabecalho"><!-- cabecalho -->    		
            <div class="logo"><!-- LOGO --> 
				<img class="img_logo" src="images/logo.png" border="0"/>
    		</div> <!-- LOGO --> 
                                  		
            <div class="menu"><!-- menu -->               	
                    <ul class="lavaLamp">
                    	<li class="item_menu" >            
                            <a href="home.php" onClick="menu('');" target="conteudo_principal"> Principal <img border="0" src="images/seta_menu_vazil.png" /> </a>
                        </li> 
                        <li class="item_menu" >            
                            <a href="javascript: menu('sistema');"> Sistema <img border="0" src="images/seta_menu.png" /> </a>
                        </li>            
                        <li class="item_menu" >            
                            <a href="banner/vis.php" onClick="menu('');" target="conteudo_principal"> Banners <img border="0" src="images/seta_menu_vazil.png" /></a>            
                        </li>
                        <li class="item_menu" >            
                            <a href="javascript: menu('local');"> Locais <img border="0" src="images/seta_menu.png" /></a>            
                        </li>
                        <li class="item_menu ">            
                           <a href="javascript: menu('imovel');"> Imóveis <img border="0" src="images/seta_menu.png" /></a>            
                        </li>            
                        <li class="item_menu " >            
                             <a href="javascript: menu('google');"> Serviços Google <img border="0" src="images/seta_menu.png" /></a>            
                        </li>    
                        <li class="item_menu " >            
                             <a href="javascript: menu('pagina');"> Páginas <img border="0" src="images/seta_menu.png" /></a>            
                        </li> 
                                       						
                    </ul>
        </div><!-- menu -->
            
            <div id="sistema" name="submenu" class="submenu"><!-- submenu -->
            	<a href='usuario/vis.php' class='item_submenu' target='conteudo_principal'> Usuários </a>				
                <a href="config/cad.php" class="item_submenu" target="conteudo_principal"> Configurações </a>
                <a href="dados/cad.php" class="item_submenu" target="conteudo_principal"> Dados da imobiliária </a>
                <a href="redesocial/cad.php" class="item_submenu" target="conteudo_principal"> Redes Sociais </a>
                <a href="chat/cad.php" class="item_submenu" target="conteudo_principal"> Configurar Chat </a>
            </div><!-- submenu -->
                        
            <div id="local" name="submenu" class="submenu"><!-- submenu -->
            	<a href="estado/vis.php" class="item_submenu" target="conteudo_principal">Estados </a>
                <a href="cidade/vis.php" class="item_submenu" target="conteudo_principal">Cidades </a>
                <a href="bairro/vis.php" class="item_submenu" target="conteudo_principal">Bairros </a>
            </div><!-- submenu -->
            
            <div id="imovel" name="submenu" class="submenu"><!-- submenu -->
            	<a href="imovel/vis.php" class="item_submenu" target="conteudo_principal">Genrenciar imóveis </a>
                <a href="tipo_imovel/vis.php" class="item_submenu" target="conteudo_principal">Tipo de imóveis </a>
                <a href="tipo_negocio/vis.php" class="item_submenu" target="conteudo_principal">Tipo de negócio </a>
            </div><!-- submenu -->
            
             <div id="google" name="submenu" class="submenu"><!-- submenu -->
               <a href="google/webmaster/cad.php" class="item_submenu" target="conteudo_principal"> Google para webmasters </a>
               <a href="google/maps/cad.php" class="item_submenu" target="conteudo_principal"> Google maps </a>
               <a href="google/analytics/cad.php" class="item_submenu" target="conteudo_principal"> Google analytics </a>
            </div><!-- submenu -->
            
            <div id="pagina" name="submenu" class="submenu"><!-- submenu -->
               <a href="paginas/sobre/cad.php" class="item_submenu" target="conteudo_principal"> Sobre a empresa </a>
               <a href="paginas/servico/cad.php" class="item_submenu" target="conteudo_principal"> Serviços </a>
            </div><!-- submenu -->
                        
    </div><!-- cabecalho -->
    
	<div id="conteudo">   
    	
         <div class="menu_usuario"><!-- menu usuario -->
       	   <? include('dados_usuario.php'); ?>
                        
         </div><!-- menu usuario --> 
         
         <div class="conteudo_principal">
         	<iframe id="conteudo_principal" name="conteudo_principal" class="frame_principal" src="home.php" frameborder="0" allowtransparency="true">
               Seu navegador não suporta frames.
            </iframe>
         
         <br />
         </div><!-- menu usuario --> 		                  
    </div><!-- Conteudo -->
    <div class="rodape"><!-- RODAPE -->
    		
            <div class="rodape_logo"><!-- LOGO --> 
				<img class="rodape_img_logo" src="images/logo_rodape.png" border="0"/>
    		</div> <!-- LOGO -->   
            <div class="rodape_creditos"><!-- LOGO -->
            Copyright &copy; 2003-2013, <a href="http://cksource.com/.../">CKSource</a> - Frederico. E Descriptado por Tiago Araujo	Maccartney -  <a href="http://www.brserve.com.br" target="_blank">BRSERVE / SA </a></div> 
            <!-- LOGO -->   
				
  </div><!-- Rodape -->
</div><!-- BG -->  
         
</body>
</html>