 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cadastro Usuários
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
              <p class="box-title">Preencha as informações abaixo para realizar o cadastro, campos com * são obrigatorios!</p>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="box-body">

                 <div class="form-group">
                  <label for="">* Nome</label>
                    <input name="nome" type="text" required="required" class="form-control" id="" placeholder="">
                  </div>
                <div class="form-group">
                  <label for="">* CPF</label>
                    <input name="cpf" type="text" required="required" class="form-control" id="cpf" placeholder="">
                  </div>
                <div class="form-group">
                  <label for="">* Função</label>
                  <select name="nivel" required="required" class="form-control">
                    <option value=""></option>
                    <option value="1">Adminstrador</option>
                    <option value="2">Gerente</option>
                    <option value="3">Funcionário</option>
                  </select>
                </div>
                 <div class="form-group">
                  <label for="">* E-mail</label>
                  <input name="email" type="email" required="required" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">* Telefone</label>
                  <input name="telefone" type="text" required="required" class="form-control" id="tel" placeholder="">
                </div>
                  <div class="form-group">
                  <label for="">* Login</label>
                  <input name="login" type="text" required="required" class="form-control" id="" placeholder="">
                </div>
                  <div class="form-group">
                  <label for="">* Senha</label>
                  <input name="senha" type="password" required="required" class="form-control" id="" placeholder="">
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
      </div>
    </section>

  </div>  