<?
include("../../cms/config.php"); 
include("../../config/index/dados.php");

?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<? echo $metatag; ?>

<meta name="description" content="Quer comprar ou vender imóveis? Encontre agora mesmo ofertas imperdíveis de casas e apartamentos." />

<meta name="keywords" content="<? echo $palavrachave ; ?>" />

<title><? echo $nomeempresa .' - '. $slogan; ?></title>

<link rel="stylesheet" type="text/css" href="../../temas/<? echo $tema; ?>/css/principal.css" media="screen">


<script type="text/javascript" src="../../js/jquery-1.4.2.js"></script>
<script type='text/javascript' src="../../js/jquery.lavalamp.js"></script>
<script type='text/javascript' src="../../js/jquery.easing.1.1.js"></script>
	<script type="text/javascript" src="../../js/easySlider1.7.js"></script>
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

<!--Mapa do site-->
<script type="text/javascript">
	function mapasite(obj){ 
		var el = document.getElementById(obj); 
		if(el.style.display != "block"){ 
			el.style.display = "block";
			window.scrollTo(0,1500)
		} else{
			el.style.display = "none";
			window.scrollTo(0,1500)
		}
	} 
</script>
<!--Mapa do site-->

<!-- Validator	-->
<link rel="stylesheet" href="../../css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="../../js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="../../js/jquery.validationEngine-pt.js" type="text/javascript"></script>
<script src="../../js/jquery.validationEngine.js" type="text/javascript"></script>		
				
    <script>	
		$(document).ready(function() {	
			$("#buscaimovel").validationEngine()
		
		});
		
		// JUST AN EXAMPLE OF CUSTOM VALIDATI0N FUNCTIONS : funcCall[validate2fields]
		function validate2fields(){
			if($("#firstname").val() =="" ||  $("#lastname").val() == ""){
				return false;
			}else{
				return true;
			}
		}
	</script>    
    <script>	
		$(document).ready(function() {	
			$("#contatofone").validationEngine()
		
		});
		
		// JUST AN EXAMPLE OF CUSTOM VALIDATI0N FUNCTIONS : funcCall[validate2fields]
		function validate2fields(){
			if($("#firstname").val() =="" ||  $("#lastname").val() == ""){
				return false;
			}else{
				return true;
			}
		}
	</script>
<!-- Validator	-->

<!-- Cidade -->
<script type="text/javascript">
		$(function(){
			$('#id_estado').change(function(){
				if( $(this).val() ) {
					$('#id_cidade').hide();
					$('.carregando').show();
					$.getJSON('../../busca/cidades.ajax.php?search=',{id_estado: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value=""></option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].nome + '</option>';
						}	
						$('#id_cidade').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#id_cidade').html('<option value="">– Escolha um estado –</option>');
				}
			});
		});
		</script>
        
<script type="text/javascript">
		$(function(){
			$('#id_cidade').change(function(){
				if( $(this).val() ) {
					$('#id_bairro').hide();
					$('.carregando2').show();
					$.getJSON('../../busca/bairros.ajax.php?search=',{id_cidade: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value=""></option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].nome + '</option>';
						}	
						$('#id_bairro').html(options).show();
						$('.carregando2').hide();
					});
				} else {
					$('#id_bairro').html('<option value="">– Escolha uma cidade –</option>');
				}
			});
		});
</script>
<!--cidade -->

<!--Lançamentos-->	

<script type="text/javascript" src="../../js/jquery-easing-1.3.pack.js"></script>
<script type="text/javascript" src="../../js/jquery-easing-compatibility.1.2.pack.js"></script>
<script type="text/javascript" src="../../js/jquery.jcarousel.min.js"></script>

<script type="text/javascript">

function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        auto: 0,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });
});

jQuery(document).ready(function() {
    jQuery('#mycarousel2').jcarousel({
        auto: 0,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });
});

jQuery(document).ready(function() {
    jQuery('#mycarousel3').jcarousel({
        auto: 0,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });
});

</script>
<!--Lançamentos-->

</head>
<body>
<div id="bg_empresa">
	<div id="geral">
    	<div class="topo">
    		<div class="logo">
				<a href="../../home/index">
					<img src="../../cms/dados/<? echo $logo_grande; ?>" border="0"/>
                </a>
    		</div> <!-- LOGO -->
            
            <div class="central_atendimento">
            	<div class="central_atendimento_titulo">
                	Central de atendimento
                </div>
                <div class="central_atendimento_subtitulo">
                	Fone:
                </div>
                <div class="central_atendimento_telefone">
                	<? echo $telefone1 ?>
                </div>
                
                <div class="central_atendimento_chat">
                	<a href="../../contato/chat/"> <img src="../../temas/<? echo $tema; ?>/images/atendimento_online.png" /></a>
                </div>
                <div class="central_atendimento_email">
                	<a href="../../contato/index/"> <img src="../../temas/<? echo $tema; ?>/images/atendimento_email.png" /></a>
                </div>
                <div class="central_atendimento_fone">
                	<a href="../../contato/ligar/"> <img src="../../temas/<? echo $tema; ?>/images/atendimento_fone.png" /></a>
                </div>

    		</div> <!-- Central de atendimento -->
    		
            <div class="menu_ul">
    			<ul class="lavaLamp">
                	<li class="menu_clas" >            
                    	<a href="../../home/index/">Home</a>            
                    </li>
                    <li class="menu_clas ">            
                        <a href="../../empresa/index/">Quem Somos</a>            
                    </li>
                    <li class="menu_clas ">            
                        <a href="../../servico/index/">Serviços</a>            
                    </li>
                    <li class="menu_clas " >            
	                    <a href="../../imovel/index/?negocio=comprar">Comprar</a>            
                    </li>      
                    <li class="menu_clas " >            
                    	<a href="../../imovel/index/?negocio=alugar">Alugar</a>            
                    </li>  
                    <li class="menu_clas " >            
                    	<a href="../../imovel/index/">Todos os Imóveis</a>            
                    </li> 
                    <li class="menu_clas " >            
                    	<a href="../../contato/venda/">Venda seu imóvel</a>            
                    </li> 
                    <li class="menu_clas current" >            
                    	<a href="../../contato/index/">Contato</a>            
                    </li>      
                </ul>
    		</div> <!-- MENU -->                 
        </div><!-- TOPO -->
    
    <div id="conteudo_empresa">            
             <div class="busca_empresa">
             	<div class="busca_titulo">Busque seu imóvel</div>
                <div class="form_busca_imovel">                  
                    	<form id="buscaimovel" action="../../busca/index/index.php" method="post" class="validacao">
                        <div class="item_form1">
                        	<label class="texto_imput_pesquisar">Estado</label><br />
                            	<select name="id_estado" id="id_estado" class="validate[required] form_select_pesquisa1">
                                   <option value="">  </option>
                                      <? 
                                	    $sql = "SELECT * FROM estados ORDER BY nome";
                                        $res = mysql_query( $sql );
                                        while ( $row = mysql_fetch_assoc( $res ) ) {
	                                	    echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
                                        }
                                       ?>
                                    </option></select>                                      
                                 </select>
                          </div> 
                          <div class="item_form1">             
                                 <label class="texto_imput_pesquisar">Cidade</label><br />
                                 <span class='carregando' style='display:none'>Carregando...</span>
								 <select name='id_cidade' id='id_cidade' class='validate[required] form_select_pesquisa1'>
									<option value=''>-- Escolha um estado --</option>                                      
								 </select>
                           </div> 
                          <div class="item_form2">     
                                 <label class="texto_imput_pesquisar">Bairro</label><br />
                                 <span class='carregando' style='display:none'>Carregando...</span>
								 <select name='id_bairro' id='id_bairro' class='form_select_pesquisa2'>
								 	<option value=''>-- Escolha uma cidade --</option>                                      
								 </select>
                           </div> 
                          <div class="item_form3"> 
                                  <label class="texto_imput_pesquisar">Dormitórios</label><br />
                                     <select name="dormitorios" id="dormitorios" class="form_select_pesquisa3">
                                  	    <option value='' ></option>
										<option value='1'>1 Dormitório Simple</option> 
										<option value='2'>1 Dormitório com Suíte</option>               
										<option value='3'>2 Dormitórios Simples</option>                
										<option value='4'>2 Dormitórios 1 com Suíte</option>                
										<option value='5'>3 Dormitórios Simples</option>                
										<option value='6'>3 Dormitórios 1 com Suíte</option>                
										<option value='7'>4 Dormitórios Simples</option>                
										<option value='8'>4 Dormitórios 1 com Suíte</option>                         
                                     </select>
                            </div> 
                          <div class="item_form1">    
                                  <label class="texto_imput_pesquisar">Tipo</label><br />
                                  	 <select name="id_tipo_imovel" id="id_tipo_imovel" class="form_select_pesquisa1">
                                     	<option value="">  </option>
                                        <? 
                                        $sql = "SELECT * FROM tipo_imovel ORDER BY nome";
                                        $res = mysql_query( $sql );
                                        while ( $row = mysql_fetch_assoc( $res ) ) {
                                        	echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>'; 
                                        }
                                        ?>
                                        </option></select>
                         	</div>  
                            
                            <div class="item_form1">    
                                  <label class="texto_imput_pesquisar">Negociação</label><br />
                                  	 <select name="id_tipo_negocio" id="id_tipo_negocio" class="form_select_pesquisa1">
                                     	<option value="">  </option>
                                        <? 
                                        $sql = "SELECT * FROM tipo_negocio ORDER BY nome";
                                        $res = mysql_query( $sql );
                                        while ( $row = mysql_fetch_assoc( $res ) ) {
                                        	echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>'; 
                                        }
                                        ?>
                                        </option></select>
                         	</div>      
                            <div class="btn_pesquisa">         
                                <input type="image" src="../../temas/<? echo $tema; ?>/images/btn_buscar.png" value="Pesquisar" style="cursor: pointer;"/>
                            </div> 
                                    </form>
                            </div>
            </div><!-- Busca -->  
            <div class="pagina_chat">
            	<center><? echo $codigochat; ?></center>

                 </div>
                 <div class="mais_imoveis_saibamais">
      				<a href="../../imovel/index/"> Conheça mais imóveis </a>
    			</div>                 
            </div>       
	</div><!-- Conteudo -->    
  </div><!-- GERAL -->
</div><!-- BG -->
         <div class="rodape">
            <div class="rodape_conteudo">
            	<div class="rodape_creditos">
                <a href="http://www.brserve.com.br/" target="_blank">
<img src="../../temas/<? echo $tema ?>/images/footer_preto.png" /></a>
                </div>
            	<div class="rodape_dados">
                	<div class="rodape_dados_titulo"><? echo $nomeempresa; if($creci != ''){echo " - Creci: ". $creci; } ?></div>
                    <div class="rodape_dados_texto"><? echo $endereco .', '.$bairro .' - '.$cidade.' - '.$estado.' - Cep: '.$cep; ?></div>
                    <div class="rodape_dados_texto"><? echo 'Fone principal: '. $telefone1 .' - Fone: '.$telefone2; ?></div>
            	</div>
            	<div class="rodape_redessociais">
            		<div class="rodape_redessociais_imagens">
                    	<?  if($facebook != '') {echo "<a href='$facebook' target='_blank'><img src='../../temas/$tema/images/facebook.png' /></a>";}
							if($orkut != '') {echo "<a href='$orkut' target='_blank'><img src='../../temas/$tema/images/orkut.png' /></a>";}
							if($twitter != '') {echo "<a href='$twitter' target='_blank'><img src='../../temas/$tema/images/twitter.png' /></a>";}
							if($youtube != '') {echo "<a href='$youtube' target='_blank'><img src='../../temas/$tema/images/youtube.png' /></a>";}
							if($msn != '') {echo "<a href='$msn' target='_blank'><img src='../../temas/$tema/images/messenger.png' /></a>";}
					    ?>
                    </div>
            	</div>
            </div>
		</div> 
</body>
</html>
