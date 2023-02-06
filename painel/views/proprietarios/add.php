 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cadastro do Proprietário
      <small> - Sistema de Gerenciamento Imobiliário</small>
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
      <form role="form" method="POST">
        <div class="box-body">
         <div class="form-group">
          <label for="">* Nome</label>
          <input name="nome" type="text" required="required" class="form-control" id="" >
        </div>
        <div class="form-group">
          <label for="">* CPF</label>
          <input name="cpf" type="text"  required="required"class="form-control" id="cpf" >
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
          <label for="">* RG</label>
          <input name="rg" type="text" required="required" class="form-control" id="" >
        </div>
        <div class="form-group">
          <label style="color: blue;" for="">
          Informações bancárias
          </label>
          <hr style="margin: 10px 0px; border-color: #888;">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <label for="">Banco</label>
              <input type="text" class="form-control" name="banco" id="" placeholder="">
            </div>
            <div class="col-md-6 col-sm-12">
              <label for="">Tipo de conta</label>
              <select name="tipo_conta" class="form-control">
                <option value="0" selected>Nenhuma selecionada</option>
                <option value="1">Conta corrente</option>
                <option value="2">Conta poupança</option>
              </select>
            </div>
            <div style="margin-top: 10px;" class="col-md-6 col-sm-12">
              <label for="">Agência</label>
              <input type="text" class="form-control" name="agencia" id="" placeholder="">
            </div>
            <div style="margin-top: 10px;" class="col-md-6 col-sm-12">
              <label for="">Conta</label>
              <input type="text" class="form-control" name="conta" id="" placeholder="">
            </div>
            <div style="margin-top: 10px;" class="col-md-6 col-sm-12">
              <label for="">Operação</label>
              <input type="text" class="form-control" name="operacao" id="" placeholder="">
            </div>
            <div style="margin-top: 10px;" class="col-md-6 col-sm-12">
              <label for="">Chave PIX</label>
              <input type="text" class="form-control" name="pix" id="" placeholder="">
            </div>
          </div>
          <hr style="margin: 15px 0px; border-color: #888;">
        </div>
        <div class="form-group">
          <label for="">* Profissão</label>
          <input name="profissao" type="text" required="required" class="form-control" id="" >
        </div>
        <div class="form-group">
          <label for="">* CEP</label>
             <!--input name="cep" type="text"  class="form-control" id="cep" onkeyup="buscar_cep()" required ="required" placeholder=""-->
              <input name="cep" type="text"  class="form-control" id="cep" placeholder="">
        </div>
        <div class="form-group">
          <label for="">* Endereço / N°</label>
          <input name="endereco" type="text" required="required" class="form-control" id="" >
        </div>
        <div class="form-group">
          <label for="">* Bairro</label>
          <input name="bairro" type="text" required="required" class="form-control" id="" >
        </div>
        <div class="form-group">
          <label for="">* Cidade</label>
          <input name="cidade" type="text" required="required" class="form-control" id="" >
        </div>
        <div class="form-group">
          <label for="">* Estado</label>
          <input name="uf" type="text" required="required" class="form-control" id="" >
        </div>
        <div class="form-group">
          <label for="">* Telefone</label>
          <input name="telefone" type="text" required="required" class="form-control" id="tel" >
        </div>
        <div class="form-group">
          <label for="">* Forma de Pagamento</label>
          <select name="pagamento" class="form-control">
            <option value="1">Deposito</option>
            <option value="2">Dinheiro</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Informações Adicionais</label>
          <textarea name="info" class="form-control" id=""></textarea>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-lg btn-block">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>
</section>

</div>  