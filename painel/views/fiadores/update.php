 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Atualizar Fiador
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
          <p class="box-title">Preencha as informações abaixo para realizar o cadastro, campos com * são obrigatorios!</p>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="POST">
          <div class="box-body">
           <div class="form-group">
            <label for="">* Nome</label>
            <input name="nome" type="text" required="required"  class="form-control" id="" placeholder="" value="<?php echo $fiador['nome'];?>">
          </div>
          <div class="form-group">
            <label for="">* CPF / CNPJ</label>
            <input name="cpf" type="text" required="required"  class="form-control" placeholder="" value="<?php echo $fiador['cpf'];?>">
          </div>
          <div class="form-group">
            <label for="">* RG</label>
            <input name="rg" type="text" required="required"  class="form-control" id="" placeholder="" value="<?php echo $fiador['rg'];?>">
          </div>
          <div class="form-group">
            <label for="">* Nacionalidade</label>
            <input name="nacionalidade" value="<?php echo $fiador['nacionalidade'];?>" type="text" required="required" class="form-control" id="" >
          </div>
          <div class="form-group">
            <label for="">* Estado Civil</label>
            <input name="estado_civil" value="<?php echo $fiador['estado_civil'];?>" required="required" class="form-control">
          </div>
          <div class="form-group">
            <label for="">* Profissão</label>
            <input name="profissao" type="text" required="required"  class="form-control" id="" placeholder="" value="<?php echo $fiador['profissao'];?>">
          </div>
          <div class="form-group">
            <label for="">* CEP</label>
                 <!--input name="cep" type="text"  class="form-control" id="cep" onkeyup="buscar_cep()" required ="required" placeholder=""-->
              <input name="cep" type="text"  class="form-control" id="cep" placeholder="">
            </div>
          <div class="form-group">
            <label for="">* Endereço</label>
            <input name="endereco" type="text" required="required"  class="form-control" id="" placeholder="" value="<?php echo $fiador['endereco'];?>">
          </div>
          <div class="form-group">
            <label for="">* Bairro</label>
            <input name="bairro" type="text" required="required"  class="form-control" id="" placeholder="" value="<?php echo $fiador['bairro'];?>">
          </div>
          <div class="form-group">
            <label for="">* Cidade</label>
            <input name="cidade" type="text" required="required"  class="form-control" id="" placeholder="" value="<?php echo $fiador['cidade'];?>">
          </div>
          <div class="form-group">
            <label for="">* Estado</label>
            <input name="uf" type="text" required="required"  class="form-control" id="" placeholder="" value="<?php echo $fiador['uf'];?>">
          </div>

          <div class="form-group">
            <label for="">* Telefone</label>
            <input name="telefone" type="text" required="required"  class="form-control" id="tel" placeholder="" value="<?php echo $fiador['telefone'];?>">
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Atualizar</button>
          </div>
        </form>
      </div>
    </div>
  </section>


</div>  