<div class="container" style="margin-top:80px !important">

	<!-- Page Heading/Breadcrumbs -->
	<h1 class="mt-4 mb-3">Sobre</h1><hr>
	<div class="row">
		<div class="col-md-12 mb-6">
			<h2 class="text-center" style="margin:15px 0;"><?php echo $empresa['razao_social'];?></h2>
			
			<div class="col-md-4 float-left">
				<img src="<?php echo BASE_URL;?>painel/upload/empresas/<?php echo $empresa['logo'];?>" alt="<?php echo $empresa['razao_social'];?>" class="" title="<?php echo $empresa['razao_social'];?>">
			</div>
      <div class="col-md-8 float-left">
        <p class="lead"><?php echo $empresa['sobre'];?></p>

        <div id="accordion">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link btn-md btn-block" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-decoration: none; color: #000; font-size: 18px; text-transform: uppercase; font-weight: 600;" >
                  MISSÃO
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                <p class="lead"><?php echo $empresa['missao'];?></p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link btn-md btn-block" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"  style="text-decoration: none; color: #000; font-size: 18px; text-transform: uppercase; font-weight: 600;">
                  VALORES
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                <p class="lead"><?php echo $empresa['valores'];?></p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link btn-md btn-block" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"  style="text-decoration: none; color: #000; font-size: 18px; text-transform: uppercase; font-weight: 600;">
                  VISÃO
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
                <p class="lead"><?php echo $empresa['visao'];?></p>
              </div>
            </div>
          </div>
        </div>
      </div>	
    </div>
  </div>  
</div>
</div>	