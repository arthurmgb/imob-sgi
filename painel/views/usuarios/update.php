 <div class="content-wrapper">

   <section class="content-header">
     <h1 class="imob-custom-h1">
       Editar Usuário
     </h1>
   </section>

   <section class="content">
     <div class="row">
       <div class="col-md-12">

         <?php if (!empty($error['msg'])): ?>
           <div class="alert alert-<?php echo $error['type']; ?> fs-16">
             <?php echo $error['msg']; ?>
           </div>
         <?php endif; ?>

         <div class="box box-primary p-10">

           <form class="fs-16" autocomplete="off" role="form" method="POST" enctype="multipart/form-data">
             <div class="box-body">
               <div class="form-group">
                 <label>Nome completo</label>
                 <input autocomplete="off" name="nome" type="text" required="required" class="form-control input-lg" id="e-nome" value="<?php echo $usuario['nome']; ?>">
               </div>
               <div class="form-group">
                 <label>CPF</label>
                 <input autocomplete="off" name="cpf" type="text" required="required" class="form-control input-lg" id="cpf" placeholder="000.000.000-00" value="<?php echo $usuario['cpf']; ?>">
               </div>
               <div class="form-group">
                 <label>Cargo</label>
                 <select style="<?= $_SESSION['user']['id'] == $usuario['id'] ? 'pointer-events: none; user-select: none; background: #ddd;' : '' ?>" name="nivel" required="required" class="form-control input-lg pointer">
                   <option value="" disabled>Selecione um cargo</option>
                   <option value="1" <?php echo ($usuario['nivel'] == '1') ? 'selected="selected"' : ''; ?>>
                     Administrador
                   </option>
                   <option value="0" <?php echo ($usuario['nivel'] == '0') ? 'selected="selected"' : ''; ?>>
                     Funcionário
                   </option>
                 </select>
               </div>
               <div class="form-group">
                 <label>
                   E-mail
                   <small class="text-muted">(opcional)</small>
                 </label>
                 <input autocomplete="off" name="email" type="email" class="form-control input-lg" id="e-email" value="<?php echo $usuario['email']; ?>">
               </div>
               <div class="form-group">
                 <label>
                   Celular
                   <small class="text-muted">(opcional)</small>
                 </label>
                 <input autocomplete="off" name="telefone" type="text" class="form-control input-lg" id="tel" value="<?php echo $usuario['telefone']; ?>">
               </div>
               <hr style="border-color: #3C8DBC;">
               <label style="font-weight: normal;" class="pb-10 fs-18">
                 Dados de Login
               </label>
               <div class="form-group">
                 <label>Usuário</label>
                 <input autocomplete="off" name="login" type="text" required="required" class="form-control input-lg" id="e-usuario" value="<?php echo $usuario['login']; ?>">
               </div>
               <div class="form-group">
                 <label>Alterar senha</label>
                 <input autocomplete="new-password" name="senha" type="text" class="form-control input-lg" id="e-senha">
               </div>

               <div class="box-footer pt-10">
                 <button type="submit" class="btn btn-lg btn-block btn-primary">
                   Editar
                 </button>
               </div>

           </form>
         </div>
       </div>
   </section>

 </div>