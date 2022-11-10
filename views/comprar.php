<div class="container" style="margin:80px auto;">	
  <div class="row">
	<div class="col-md-12">
        <h1>Comprar</h1><hr>
       
  <div class="row">
	<div class="col-md-12">
        <div class="row">
			<?php foreach ($comprar as $disponivel):?>
        <div class="col-lg-3 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="<?php echo BASE_URL; ?>imoveis/ver/<?php echo $disponivel['id'];?>">
            	 <?php if(!empty($disponivel['thumb'])): ?>
                <img class="card-img-top" src="<?php echo BASE_URL;?>painel/upload/<?php echo $disponivel['thumb'];?>" alt="" style="width: 100%; min-height:180px;">
            <?php else: ?>
              <img src="<?php echo BASE_URL;?>assets/images/default-image.png" title="Imagem não cadastrada!" class="card-img-top" style="width: 100%;  min-height:180px;">
            <?php endif;?>
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

              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div><!--row-->
        
    </div><!--col-12-->    
  </div><!--row-->
</div><!--container-->


  </div><!--row-->
</div><!--container-->
