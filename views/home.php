         <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('assets/images/slide-1.jpg')">
          </div>
          
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('assets/images/slide-2.jpg')">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>
    <div class="container-fluid"  style="background: #ffe140; padding:30px 0;">
   <div class="row">
    <div class="col-lg-12 col-md-6">
     <h2 class="text-center text-white">ENCONTRE AQUI O IMÓVEL QUE VOCÊ PROCURA!</h2>
       <div class="col-md-6 text-center float-left py-2">
        <button type="button" class="call-action btn btn-outline-light">imoveis para aluguel</button>
      </div>
      <div class="col-md-6 text-center float-left py-2">
        <button type="button" class="call-action btn btn-outline-light">imoveis para venda</button> 
      </div>
   </div>
 </div>
</div>
    <div class="container" style="margin-top:15px;">	
        <div class="row">
			<?php foreach ($imovel as $disponivel):?>
                <div class="col-lg-3 col-sm-6 portfolio-item">
                  <div class="card h-100">
                    <a href="<?php echo BASE_URL; ?>imoveis/ver/<?php echo $disponivel['id'];?>">
                      <?php if(!empty($disponivel['url_img'])): ?>
                        <img class="card-img-top" src="<?php echo BASE_URL;?>painel/upload/<?php echo $disponivel['url_img'];?>" alt="" style="width: 100%; min-height:200px; height:200px;">
                      <?php else: ?>
                        <img src="<?php echo BASE_URL;?>assets/images/default-image.png" title="Imagem não cadastrada!" class="card-img-top" style="width: 100%;  min-height:200px; height:200px;">
                      <?php endif;?>
                    </a>  
                    <p class="mark-1 bg-info"><?php echo ($disponivel['finalidade']=='1') ? 'Aluguel':'Venda';?></p>
                    <div class="card-body">
                        <p class="lead text-center">REF: <?php echo $disponivel['referencia'];?></p>
                        <p class="lead text-center"><?php echo $disponivel['bairro'];?></p>
                        <p class="lead text-center">R$ <?php echo number_format($disponivel['valor'],2,",",".");?></p>
                        <ul class="list-inline text-center"> 
                          <li class="list-inline-item">
                            <?php
                              switch($disponivel['tipo']) {
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
                            <i class="fa fa-bed " aria-hidden="true" title="<?php echo $disponivel['dormitorios'];?> - Quartos"></i>
                          </li>
                          <?php if(!empty($disponivel['suites'])): ?>
                          <li class="list-inline-item ">
                            <i class="fa fa-bath" title="<?php echo $disponivel['suites'];?> - Suites" aria-hidden="true"></i>
                          </li>
                          <?php else:
                           endif; ?>
                          <li class="list-inline-item">
                            <i class="fa fa-shower " title="<?php echo $disponivel['banheiros'];?> - Banheiros" aria-hidden="true"></i>
                          </li>
                          <?php if(!empty($disponivel['garagem'])): ?>
                          <li class="list-inline-item ">
                            <i class="fa fa-car" title="<?php echo $disponivel['garagem'];?> - Garagem" aria-hidden="true"></i> 
                          </li>
                          <?php else:
                           endif; ?>
                        </ul>
                    <hr>
                    <a href="<?php echo BASE_URL;?>imoveis/ver/<?php echo $disponivel['id'];?>" class="float-right">Mais detalhes</a>
                    </div>  
                </div><!--card-->
            </div><!--portfolio-item-->
            <?php endforeach; ?>    
        </div><!--row-->
    </div><!--container-->