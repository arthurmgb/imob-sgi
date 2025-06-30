 <div class="content-wrapper">

   <section class="content-header">
     <h1 class="imob-custom-h1">
       Usuários Cadastrados
     </h1>
   </section>

   <section class="content">
     <div class="row">
       <div class="col-xs-12">
         <!-- ALERT -->
         <?php if (!empty($_GET['msg'])): ?>
           <div class="alert alert-<?php echo $_GET['type']; ?> fs-16">
             <?php echo $_GET['msg']; ?>
           </div>
         <?php endif; ?>
         <!-- END -->
         <div class="box box-primary p-10">
           <div class="box-body">
             <table id="example2" class="table table-bordered table-hover fs-16">
               <thead>
                 <tr>
                   <th>Nome completo</th>
                   <th>Usuário</th>
                   <th>CPF</th>
                   <th>Cargo</th>
                   <th>Ações</th>
                 </tr>
               </thead>
               <?php foreach ($user as $usuario): ?>
                 <tr>
                   <td style="line-height: 2">
                     <?php echo $usuario['nome']; ?>
                   </td>
                   <td style="line-height: 2">
                     <?php echo $usuario['login']; ?>
                   </td>
                   <td style="line-height: 2">
                     <?php echo $usuario['cpf']; ?>
                   </td>
                   <td style="line-height: 2;" class="<?= $usuario['nivel'] == '1' ? 'bg-primary' : 'bg-warning' ?>">
                     <?php
                      $cargo = $usuario['nivel'];
                      switch ($cargo) {
                        case '1':
                          echo 'Administrador';
                          break;
                        case '0':
                          echo 'Funcionário';
                          break;
                        default:
                          break;
                      }
                      ?>
                   </td>
                   <td>

                     <a href="<?php echo BASE_URL; ?>usuarios/editar/<?php echo $usuario['id']; ?>" title="Editar" style="margin:0 10px;">
                       <i class="fa fa-pencil-square-o fa-1x fa-border text-success"></i>
                     </a>

                     <?php if ($_SESSION['user']['id'] !== $usuario['id']): ?>
                       <a href="#"
                         onclick="confirm('Tem certeza que deseja excluir este usuário?') ? window.location.href='<?php echo BASE_URL . 'usuarios/del/' . $usuario['id']; ?>':'';" title="Excluir">
                         <i class="fa fa-trash fa-1x fa-border text-danger"></i>
                       </a>
                     <?php endif; ?>

                   </td>
                 </tr>
               <?php endforeach; ?>
             </table>
           </div>
         </div>
       </div>
     </div>
   </section>

 </div>