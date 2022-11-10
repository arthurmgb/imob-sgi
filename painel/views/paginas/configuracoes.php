<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Configurações
      <small>- Sistema de Gerenciamento Imobiliário</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo BASE_URL;?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Empresa</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Informações da Empresa">
          <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="col-md-3"> 
            <img src="<?php echo BASE_URL;?>upload/<?php echo $config['logo'];?>" style="padding:3px; margin:5px 0px; max-width:250px; " title="<?php echo $config['razao_social'];?>">
          </div> 
          <div class="col-md-9" style="float:right;" >  
            <dl class="dl-horizontal" > 
              <dt>Razão Social:</dt><dd><?php echo $config['razao_social'];?></dd>
              <dt>CNPJ:</dt><dd><?php echo $config['cnpj'];?></dd>
              <dt>Inscrição Estadual:</dt><dd><?php echo $config['insc'];?></dd>
              <dt>CRECI:</dt><dd><?php echo $config['creci'];?></dd>
              <dt>Endereço:</dt>
              <dd><?php echo $config['endereco'].' - '.$config['bairro'] 
              .', '.$config['cidade'].' / '.$config['uf'];?>
            </dd>
            <dt>CEP:</dt><dd><?php echo $config['cep'];?></dd>  
            <dt>Telefone:</dt><dd><?php echo $config['telefone'];?></dd>
            <dt>E-mail:</dt><dd><?php echo $config['email'];?></dd>
          </dl>
        </div> 
      </div>
      <!-- /.box-body -->
      <div class="box-footer">

      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->