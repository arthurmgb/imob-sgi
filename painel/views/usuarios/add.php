 <div class="content-wrapper">

   <section class="content-header">
     <h1 class="imob-custom-h1">
       Cadastrar Usuário
     </h1>
   </section>

   <section class="content">
     <div class="row">
       <div class="col-md-12">

         <?php if (!empty($error['msg'])): ?>
           <div class="alert alert-<?php echo $error['type']; ?>">
             <?php echo $error['msg']; ?>
           </div>
         <?php endif; ?>

         <div class="box box-primary p-10">

           <form class="fs-16" autocomplete="off" role="form" method="POST" enctype="multipart/form-data">
             <div class="box-body">
               <div class="form-group">
                 <label>Nome completo</label>
                 <input name="nome" type="text" required="required" class="form-control input-lg" id="c-nome" autocomplete="off">
               </div>
               <div class="form-group">
                 <label>CPF</label>
                 <input name="cpf" type="text" required="required" class="form-control input-lg" id="cpf" autocomplete="off" placeholder="000.000.000-00">
               </div>
               <div class="form-group">
                 <label>Cargo</label>
                 <select name="nivel" required="required" class="form-control input-lg pointer">
                   <option value="" disabled>Selecione um cargo</option>
                   <option value="0">Funcionário</option>
                   <option value="1">Administrador</option>
                 </select>
               </div>
               <hr style="border-color: #3C8DBC;">
               <label style="font-weight: normal;" class="pb-10 fs-18">
                 Dados de Login
               </label>
               <div class="form-group">
                 <label>Usuário</label>
                 <input name="login" type="text" required="required" class="form-control input-lg" id="c-usuario" autocomplete="off">
               </div>
               <div class="form-group">
                 <label>Senha</label>
                 <input name="senha" type="text" required="required" class="form-control input-lg" id="c-senha" autocomplete="new-password">
               </div>
               <div class="box-footer pt-10">
                 <button type="submit" class="btn btn-lg btn-block btn-primary">
                   Cadastrar
                 </button>
               </div>
             </div>
           </form>

         </div>

       </div>
     </div>
   </section>

 </div>