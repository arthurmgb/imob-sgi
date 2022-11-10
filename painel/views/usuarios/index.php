 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Usuarios
      <small> - Sistema de Gerenciamento Imobiliário</small>
    </h1>
    <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Pesquisar...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
  </section>
  
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Usuários</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Avatar</th>
                  <th>Nome</th>
                  <th>Função</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <?php foreach ($user as $usuario): ?>
              <tr>
                <td><img class="img-circle" width="30" src="<?php echo BASE_URL?>upload/avatar/<?php echo $usuario['avatar'];?>" alt=""></td>
                <td style="line-height: 2"><?php echo $usuario['nome'];?></td>
                <td style="line-height: 2">
                    <?php 
                    $funcao = $usuario['nivel'];
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
                      }  
                    ?>
                </td>
                <td>
                  <a href="<?php echo BASE_URL ;?>usuarios/ver/<?php echo $usuario['id'];?>" title="Ver" ><i class="fa fa-eye fa-1x fa-border"></i></a>
                  <a href="<?php echo BASE_URL ;?>usuarios/editar/<?php echo $usuario['id'];?>" title="Editar" style="margin:0 10px;"><i class="fa fa-file-text fa-1x fa-border"></i></a>
                  <a href="#" 
                  onclick="confirm('Espere! Tem certeza que deseja excluir este usuario?') ? window.location.href='<?php echo BASE_URL.'usuarios/del/'.$usuario['id'];?>':'';" title="Excluir" ><i class="fa fa-trash fa-1x fa-border"></i></a>
                  
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
</section> 


</div>
