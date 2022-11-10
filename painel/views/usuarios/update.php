 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Atualizar Usuário
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
                    <input name="nome" type="text" required="required"  class="form-control" id="" placeholder="" value="<?php echo utf8_encode($usuario['nome']);?> ">
                  </div>
                <div class="form-group">
                  <label for="">* CPF</label>
                    <input name="cpf" type="text" required="required"  class="form-control" id="cpf" placeholder="" value="<?php echo utf8_encode($usuario['cpf']);?> ">
                </div>
                 <div class="form-group">
                  <label for="">* Função</label>
                  <select name="nivel" required="required" class="form-control">
                    <option value=""></option>
                    <option value="1" <?php echo ($usuario['nivel'] == '1') ? 'selected="selected"' : ''; ?> >Adminstrador</option>
                    <option value="2" <?php echo ($usuario['nivel'] == '2') ? 'selected="selected"' : ''; ?> >Gerente</option>
                    <option value="3" <?php echo ($usuario['nivel'] == '3') ? 'selected="selected"' : ''; ?> >Funcionário</option>
                  </select>
                </div>
                 <div class="form-group">
                  <label for="">* E-mail</label>
                  <input name="email" type="email" required="required"  class="form-control" id="" placeholder="" value="<?php echo utf8_encode($usuario['email']);?> ">
                </div>
                <div class="form-group">
                  <label for="">* Telefone</label>
                  <input name="telefone" type="text" required="required"  class="form-control" id="tel" placeholder="" value="<?php echo utf8_encode($usuario['telefone']);?> ">
                </div>
                  <div class="form-group">
                  <label for="">* Login</label>
                  <input name="login" type="text" required="required"  class="form-control" id="" placeholder="" value="<?php echo utf8_encode($usuario['login']);?> ">
                </div>
                  <div class="form-group">
                  <label for=""> Atualizar senha</label>
                  <input name="senha" type="password" class="form-control" id="" placeholder="">
                </div>

                 <div class="form-group">
                  <label for=""> Foto</label>
                    <input name="avatar" type="file"  class="form-control" id="" placeholder=""><br />
                    <img src="<?php echo BASE_URL ;?>upload/avatar/<?php echo $usuario['avatar']?>" width="100">
                  </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
              </div>
            </form>
          </div>
      </div>
    </section>

  </div>  