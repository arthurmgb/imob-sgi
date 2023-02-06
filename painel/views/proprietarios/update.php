 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Atualizar Proprietário
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
          <p class="box-title">Preencha as informações abaixo para realizar a edição, campos com * são obrigatórios!</p>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="POST">
          <div class="box-body">
           <div class="form-group">
            <label for="">* Nome</label>
            <input name="nome" type="text" required="required"  class="form-control" id="" placeholder="" value="<?php echo $proprietario['nome'];?>">
          </div>
          <div class="form-group">
            <label for="">* CPF</label>
            <input name="cpf" type="text" required="required"  class="form-control" id="cpf" placeholder="" value="<?php echo $proprietario['cpf'];?>">
          </div>
          <div class="form-group">
            <label for="">* RG</label>
            <input name="rg" type="text" required="required"  class="form-control" id="" placeholder="" value="<?php echo $proprietario['rg'];?>">
          </div>
          <div class="form-group">
            <label style="color: blue;" for="">
            Informações bancárias
            </label>
            <hr style="margin: 10px 0px; border-color: #888;">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <label for="">Banco</label>
                <input type="text" class="form-control" name="banco" id="" value="<?php echo $proprietario['banco'] ?>" placeholder="">
              </div>
              <div class="col-md-6 col-sm-12">
                <label for="">Tipo de conta</label>
                <select name="tipo_conta" class="form-control">
                  <option value="0" <?php echo ($proprietario['tipo_conta'] == '0')? 'selected="selected"':''; ?>>Nenhuma selecionada</option>
                  <option value="1" <?php echo ($proprietario['tipo_conta'] == '1')? 'selected="selected"':''; ?>>Conta corrente</option>
                  <option value="2" <?php echo ($proprietario['tipo_conta'] == '2')? 'selected="selected"':''; ?>>Conta poupança</option>
                </select>
              </div>
              <div style="margin-top: 10px;" class="col-md-6 col-sm-12">
                <label for="">Agência</label>
                <input type="text" class="form-control" name="agencia" id="" value="<?php echo $proprietario['agencia'] ?>" placeholder="">
              </div>
              <div style="margin-top: 10px;" class="col-md-6 col-sm-12">
                <label for="">Conta</label>
                <input type="text" class="form-control" name="conta" id="" value="<?php echo $proprietario['conta'] ?>" placeholder="">
              </div>
              <div style="margin-top: 10px;" class="col-md-6 col-sm-12">
                <label for="">Operação</label>
                <input type="text" class="form-control" name="operacao" id="" value="<?php echo $proprietario['operacao'] ?>" placeholder="">
              </div>
              <div style="margin-top: 10px;" class="col-md-6 col-sm-12">
                <label for="">Chave PIX</label>
                <input type="text" class="form-control" name="pix" id="" value="<?php echo $proprietario['pix'] ?>" placeholder="">
              </div>
            </div>
            <hr style="margin: 15px 0px; border-color: #888;">
          </div>
          <div class="form-group">
            <label for="">* Nacionalidade</label>
            <input name="nacionalidade" type="text" value="<?php echo $proprietario['nacionalidade'];?>" required="required" class="form-control" id="" >
          </div>
          <div class="form-group">
            <label for="">* Estado Civil</label>
            <input name="estado_civil" type="text" value="<?php echo $proprietario['estado_civil'];?>" required="required" class="form-control" id="" >
          </div>
          <div class="form-group">
            <label for="">* Profissão</label>
            <input name="profissao" type="text" required="required"  class="form-control" id="" placeholder="" value="<?php echo $proprietario['profissao'];?>">
          </div>
          <div class="form-group">
            <label for="">* CEP</label>
             <!--input name="cep" type="text"  class="form-control" id="cep" onkeyup="buscar_cep()" required ="required" placeholder=""-->
              <input name="cep" type="text"  class="form-control" id="cep" placeholder="">    
            </div>
          <div class="form-group">
            <label for="">* Endereço / N°</label>
            <input name="endereco" type="text" required="required"  class="form-control" id="" placeholder="" value="<?php echo $proprietario['endereco'];?>">
          </div>
          <div class="form-group">
            <label for="">* Bairro</label>
            <input name="bairro" type="text" required="required"  class="form-control" id="" placeholder="" value="<?php echo $proprietario['bairro'];?>">
          </div>
          <div class="form-group">
            <label for="">* Cidade</label>
            <input name="cidade" type="text" required="required"  class="form-control" id="" placeholder="" value="<?php echo $proprietario['cidade'];?>">
          </div>
          <div class="form-group">
            <label for="">* Estado</label>
            <input name="uf" type="text" required="required"  class="form-control" id="" placeholder="" value="<?php echo $proprietario['uf'];?>">
          </div>

          <div class="form-group">
            <label for="">* Telefone</label>
            <input name="telefone" type="text" required="required"  class="form-control" id="tel" placeholder="" value="<?php echo $proprietario['telefone'];?>">
          </div>
          <div class="form-group">
            <label for="">* Forma de Pagamento</label>
            <select name="pagamento" class="form-control">
              <option value="1" <?php echo ($proprietario['status'] == '1')? 'selected="selected"':''; ?>>Deposito</option>
              <option value="2" <?php echo ($proprietario['status'] == '2')? 'selected="selected"':''; ?>>Dinheiro</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Informações Adicionais</label>
            <textarea name="info" class="form-control" id=""><?php echo utf8_encode($proprietario['info']);?></textarea>
          </div>

          <div class="form-group">
            <label for="">* Status</label>
            <select name="status" class="form-control">
              <option value="1" <?php echo ($proprietario['status'] == '1')? 'selected="selected"':''; ?>>Ativo</option>
              <option value="2" <?php echo ($proprietario['status'] == '2')? 'selected="selected"':''; ?>>Inativo</option>
            </select>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Atualizar</button>
          </div>
        </form>
      </div>
    </div>
  </section>


</div>  