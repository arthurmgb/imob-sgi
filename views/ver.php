<div class="container" style="margin:80px auto;">	
  <div class="row">
	<div class="col-md-12">
		<?php
         switch($imovel['tipo']) {
         case 1:
          $tipo = 'Casa';
        break;
        case 2:
          $tipo = 'Apartamento';
        break;
        case 3:
          $tipo = 'Comercial';
       break;
      }
    ?>

            
		<h3><?php echo $tipo;?> para <?php echo ($imovel['finalidade']=='1') ? 'alugar':'comprar'; ?> <h3> <hr>

      <div class="col-md-6 float-left">
       <div id="Indicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <?php foreach ($imovel['fotos'] as $key => $fotos): ?>

          <div class="carousel-item <?php if ($key <=0) echo 'active' ;?>">

            <img src="<?php echo BASE_URL;?>painel/upload/<?php echo $fotos['url_img'];?>" class="image-resposive" style="width: 100%" alt="">
          </div>
          <?php endforeach;?>
        </div>
        <a class="carousel-control-prev" href="#Indicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#Indicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
           <?php if(!empty($fotos['url_img'])): ?>
        <?php else:?>
          <img src="<?php echo BASE_URL;?>assets/images/default-image.png" title="Imagem não cadastrada!" class="card-img-top" style="width: 100%;  min-height:220px;">
            <?php endif;?>

            <ul class="list-inline text-center py-3"> 
                  <li class="list-inline-item">
                    <?php
                      switch($imovel['tipo']) {
                        case 1:
                          $tipo = '<i class="fa fa-home" title="Casa" aria-hidden="true"></i>';
                          break;
                        case 2:
                            $tipo = '<i class="fa fa-building " title="Apartamento" aria-hidden="true"></i>';
                          break;
                        case 3:
                            $tipo = '<i class="fa fa-handshake-o" title="Comercial" aria-hidden="true"></i>';
                        break;
                      }
                      echo $tipo;
                    ?>
                  </li>  
                  <li class="list-inline-item">
                    <i class="fa fa-bed " aria-hidden="true" title="<?php echo $imovel['dormitorios'];?> - Quartos"></i>
                  </li>
                  <?php if(!empty($imovel['suites'])): ?>
                  <li class="list-inline-item ">
                    <i class="fa fa-bath" title="<?php echo $imovel['suites'];?> - Suites" aria-hidden="true"></i>
                  </li>
                  <?php else:
                   endif; ?>
                  <li class="list-inline-item">
                    <i class="fa fa-shower " title="<?php echo $imovel['banheiros'];?> - Banheiros" aria-hidden="true"></i>
                  </li>
                  <?php if(!empty($imovel['garagem'])): ?>
                  <li class="list-inline-item ">
                    <i class="fa fa-car" title="<?php echo $imovel['garagem'];?> - Garagem" aria-hidden="true"></i> 
                  </li>
                  <?php else:
                   endif; ?>
                </ul>

      </div>		
	       <div class="col-md-6 float-left">
	       	<p class="lead text-center">REF: <?php echo $imovel['referencia'];?></p>
	       	<p class="lead text-center"><?php echo $imovel['endereco'];?>, <?php echo $imovel['bairro'];?> - <?php echo $imovel['cidade'];?></p>
	       	<hr>
	       	<p class="lead"><?php echo $imovel['outros'];?></p>
	       	<p class="lead">R$ <?php echo number_format($imovel['valor'],2,",",".");?></p>
       </div>   
       <div class="col-md-12">
    	


			</div>

    </div><!--col-12-->    
  </div><!--row-->
</div><!--container-->
