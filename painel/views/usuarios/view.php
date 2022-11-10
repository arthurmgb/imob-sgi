 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuário
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
                  <label for="">Nome</label>
                    <input name="nome" type="text" readonly="true"  class="form-control" id="" placeholder="" value ="<?php echo utf8_encode($user['nome']);?>">
                  </div>
                <div class="form-group">
                  <label for="">CPF</label>
                    <input name="cpf" type="text" readonly="true"  class="form-control" id="" placeholder="" value ="<?php echo $user['cpf'];?>">
                  </div>
                <div class="form-group">
                  <label for="">Função</label>
                  <input name="funcao" type="text" readonly="true"  class="form-control" id="" placeholder="" value ="<?php
                    $funcao = $user['nivel'];
                    switch ($funcao) {
                        case '1':
                            echo 'Adminstrador';
                          break;
                          case '2':
                            echo 'Gerente';
                          break;
                          case '3':
                            echo 'Funcionário';
                          break;
                          case '4':
                            echo 'Usuario';
                          break;
                      }  
                  ?>">
                </div>
                 <div class="form-group">
                  <label for="">E-mail</label>
                  <input name="email" type="email" readonly="true"  class="form-control" id="" placeholder="" value ="<?php echo $user['email'];?>">
                </div>
                <div class="form-group">
                  <label for="">Telefone</label>
                  <input name="telefone" type="text" readonly="true"  class="form-control" id="" placeholder="" value ="<?php echo $user['telefone'];?>">
                </div>
                  <div class="form-group">
                  <label for="">Login</label>
                  <input name="login" type="text" readonly="true"  class="form-control" id="" placeholder="" value ="<?php echo $user['login'];?>">
                </div>
                  <div class="form-group">
                    <label for="">Avatar</label><hr>
                  <img src="<?php echo BASE_URL;?>upload/avatar/<?php echo $user['avatar']?>" width="100" alt="">
                </div>
            
            </form>
          </div>
      </div>
    </section>

  </div>  