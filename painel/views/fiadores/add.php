 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   
    <h1>
      Cadastro de Fiadores
      <small> - Sistema de Gerenciamento Imobiliario</small>
    </h1>
    
  </section>
  
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">

        <?php if(!empty($error['msg'])): ?>
        <div class="alert alert-<?php echo $error['type']; ?>">
          <?php echo $error['msg']; ?>
        </div>
      <?php endif; ?>

      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <p class="box-title">Preencha as informações abaixo para realizar o cadastro, campos com * são obrigatórios!</p>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        
        <form role="form" method="POST" >
          <div class="box-body">
            <div class="form-group">
              <label for="">* Código do Inquilino</label>                                        
              <input type="text" class="form-control" name="codigo_inquilino" required="required">
            </div>
            <div class="form-group">                                        
              <input type="text" id="nome_inquilino" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label for="">* Nome</label>
              <input name="nome" type="text"  class="form-control" id="" required ="required" placeholder="">
            </div>
            <div class="form-group">
              <label for="">* CPF / CNPJ</label>
              <input name="cpf" type="text"  class="form-control" required ="required" placeholder="">
            </div>
            <div class="form-group">
              <label for="">* RG</label>
              <input name="rg" type="text"  class="form-control" id="" required ="required" placeholder="">
            </div>
            <div class="form-group">
              <label for="">* Nacionalidade</label>
              <input name="nacionalidade" type="text" value="Brasileiro" required="required" class="form-control" id="" >
            </div>
            <div class="form-group">
              <label for="">* Estado Civil</label>
              <input name="estado_civil" required="required" class="form-control">
            </div>
            <div class="form-group">
              <label for="">* Profissão</label>
              <input name="profissao" type="text"  class="form-control" id="" required ="required" placeholder="">
            </div>
            <div class="form-group">
              <label for="">* CEP</label>
              <!--input name="cep" type="text"  class="form-control" id="cep" onkeyup="buscar_cep()" required ="required" placeholder=""-->
              <input name="cep" type="text"  class="form-control" id="cep" placeholder="">
            </div>
            <div class="form-group">
              <label for="">* Endereco / N°</label>
              <input name="endereco" type="text"  class="form-control" id="" required ="required" placeholder="">
            </div>
            <div class="form-group">
              <label for="">* Bairro</label>
              <input name="bairro" type="text"  class="form-control" id="" required ="required" placeholder="">
            </div>
            <div class="form-group">
              <label for="">* Cidade</label>
              <input name="cidade" type="text"  class="form-control" id="" required ="required" placeholder="">
            </div>
            <div class="form-group">
              <label for="">* UF</label>
              <input name="uf" type="text"  class="form-control" id="" required ="required" placeholder="">
            </div>
            <div class="form-group">
              <label for="">* Telefone</label>
              <input name="telefone" type="text"  class="form-control" id="tel" required ="required" placeholder="">
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Cadastrar</button>
            </div>
          </form>
        </div>
      </div>
    </section>

  </div>  