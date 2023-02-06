 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <h1>
      Cadastro de Inquilinos
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
            <label for="">* Nome</label>
            <input name="nome" type="text" class="form-control" required ="required">
          </div>
          <div class="form-group">
            <label for="">* CPF / CNPJ</label>
            <input name="cpf" type="text" class="form-control" required ="required">
          </div>
          <div class="form-group">
            <label for="">* RG</label>
            <input name="rg" type="text" class="form-control" required ="required">
          </div>
          <div class="form-group">
            <label for="">* Nacionalidade</label>
            <input name="nacionalidade" value="Brasileiro" type="text" required="required" class="form-control" >
          </div>
          <div class="form-group">
            <label for="">* Estado Civil</label>
            <input name="estado_civil" type="text" required="required" class="form-control">
          </div>
          <div class="form-group">
            <label for="">* Profissão</label>
            <input name="profissao" type="text" class="form-control" required ="required">
          </div>
          <div class="form-group">
            <label for="">* Telefone</label>
            <input name="telefone" type="text" id="tel" class="form-control" required ="required">
          </div>
          <div class="form-group">
           <label for="">Informações Adicionais</label>
           <textarea name="info" class="form-control"></textarea>
         </div>
         <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-lg btn-block">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>
</section>

</div>  