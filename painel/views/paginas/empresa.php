   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Empresa
        <small> - Sistema de Gerenciamento Imobiliário</small>
      </h1>
    </section>
     <section class="content">
      <div class="row">
        <!-- left column -->
        <?php if(!empty($error['msg'])): ?>
          <div class="alert alert-<?php echo $error['type']; ?>">
            <?php echo $error['msg']; ?>
          </div>
        <?php endif; ?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <p class="box-title">Preencha as informações abaixo para realizar o cadastro, campos com * são obrigatorios!</p>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for=""> * Razão Social</label>
                  <input name="razao_social" type="text" value="<?php echo $config['razao_social'];?>" required="required" class="form-control" id="" >
                </div>
                <div class="form-group">
                  <label for=""> * CNPJ</label>
                  <input name="cnpj" type="text" value="<?php echo $config['cnpj'];?>" required="required" class="form-control" id="cnpj" >
                </div>
                 <div class="form-group">
                  <label for=""> * Inscricao</label>
                  <input name="insc" type="text" value="<?php echo $config['insc'];?>" required="required" class="form-control" id="" >
                </div>
                <div class="form-group">
                  <label for=""> * CRECI</label>
                  <input name="creci" type="text" value="<?php echo $config['creci'];?>" required="required" class="form-control" id="" >
                </div>
                <div class="form-group">
                  <label for=""> * Telefone</label>
                  <input name="telefone" type="text" value="<?php echo $config['telefone'];?>" required="required" class="form-control" id="tel" >
                </div> 
                <div class="form-group">
                  <label for=""> * E-mail</label>
                  <input name="email" type="text" value="<?php echo $config['email'];?>" required="required" class="form-control" id="" >
                </div>        
                <div class="form-group">
                  <label for=""> * CEP</label>
                  <input name="cep" type="text" value="<?php echo $config['cep'];?>" required="required" class="form-control" id="cep" onkeyup="buscar_cep()">
                </div>
                 <div class="form-group">
                  <label for=""> * Endereço / N°</label>
                  <input name="endereco" type="text" value="<?php echo $config['endereco'];?>" required="required" class="form-control" id="" >
                </div>
                <div class="form-group">
                  <label for=""> * Bairro</label>
                  <input name="bairro" type="text" value="<?php echo $config['bairro'];?>" required="required" class="form-control" id="">
                </div>
                 <div class="form-group">
                  <label for=""> * Cidade</label>
                  <input name="cidade" type="text"value="<?php echo $config['cidade'];?>" required="required" class="form-control" id="" >
                </div>
                 <div class="form-group">
                  <label for=""> * Estado</label>
                  <input name="uf" type="text" value="<?php echo $config['uf'];?>" required="required" class="form-control" id="" >
                </div>
                <div class="form-group">
                  <label for=""> Logo</label>
                  <input name="logo" type="file"  class="form-control" id="" ><hr><br />
                  <img src="<?php echo BASE_URL;?>upload/<?php echo $config['logo'];?>" style="width:250px;">
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
              </div>
            </form>
          </div>
      </div>
    </section>

  </div>  