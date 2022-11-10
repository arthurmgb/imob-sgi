<?
/*
* HomeDevice v1.0
* HomeDevice é um Software proprietário, não livre, cuja cópia, 
* redistribuição ou modificação são em alguma medida restritos 
* pelo seu criador ou distribuidor.
* Desenvolvido por Fernando Blomer
* HomeDevice e WebDevice são nomes fansatia de produtos
* ou sistemas de propriedade de Fernando Blomer
* www.webdevice.com.br
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>
<div class="principal_home">
	<div class="esquerda">
    	<div class="titulo_esqueda"></div>
        <div class="home_resumo">
            <div class="home_resumo_titulo">Resumo do sistema</div>
                <div class="home_resumo_item_esqueda">
            		<? include("resumo.php"); ?>
                </div>
                <div class="home_resumo_item_direita">
            		<? include("resumo2.php"); ?>
                </div>
        </div>
        <div class="home_resumo">
            <div class="home_resumo_titulo">Últimos imóveis cadastrados</div>
            	<div class="home_resumo_item">
                	<? include("ultimos_imoveis.php"); ?> 
                </div>
            </div>	
        </div>
    </div>
    
    <div class="direita">
    	<div class="titulo_direita"></div>
        <div class="home_google">
            <div class="home_google_titulo">Visitas no último mês</div>
            	<div class="home_resumo_item">	
              		<iframe id="conteudo" name="conteudo" src="analytics/dados.php" frameborder="0" width="100%" height="80%" style="margin-top:10px;" allowtransparency="true">
               			Seu navegador não suporta frames.
           		   </iframe>
           		</div>	
        </div>
        
        <div class="home_google">
            <div class="home_google_titulo">Páginas de Referência</div>
            	<div class="home_resumo_item">
              		<iframe id="conteudo" name="conteudo" src="analytics/dados2.php" frameborder="0" width="100%" height="80%" style="margin-top:10px;" allowtransparency="true">
               			Seu navegador não suporta frames.
           		   </iframe>
           		</div>	
        </div>
    </div>

</div>


</body>
</html>