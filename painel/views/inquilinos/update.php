 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">

     <h1 class="imob-custom-h1">
       Editar Inquilino
     </h1>

   </section>

   <section class="content">
     <div class="row">
       <!-- left column -->
       <div class="col-md-12">

         <?php if (!empty($error['msg'])): ?>
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
                 <input name="nome" type="text" value="<?php echo $inquilino['nome']; ?>" class="form-control" required="required">
               </div>
               <div class="form-group">
                 <label for="">* CPF / CNPJ</label>
                 <input name="cpf" type="text" value="<?php echo $inquilino['cpf']; ?>" class="form-control" required="required">
               </div>
               <div class="form-group">
                 <label for="">* RG</label>
                 <input name="rg" type="text" value="<?php echo $inquilino['rg']; ?>" class="form-control" required="required">
               </div>
               <div class="form-group">
                 <label for="">* Nacionalidade</label>
                 <input name="nacionalidade" type="text" value="<?php echo $inquilino['nacionalidade']; ?>" required="required" class="form-control">
               </div>
               <div class="form-group">
                 <label for="">* Estado Civil</label>
                 <input name="estado_civil" type="text" value="<?php echo $inquilino['estado_civil']; ?>" required="required" class="form-control">
               </div>
               <div class="form-group">
                 <label for="">* Profissão</label>
                 <input name="profissao" type="text" value="<?php echo $inquilino['profissao']; ?>" class="form-control" required="required">
               </div>
               <div class="form-group">
                 <label for="">* Telefone</label>
                 <input name="telefone" type="text" id="tel" value="<?php echo $inquilino['telefone']; ?>" class="form-control" required="required">
               </div>
               <div class="form-group">
                 <label for="">Informações Adicionais</label>
                 <textarea name="info" class="form-control"><?php echo $inquilino['info']; ?></textarea>
               </div>
               <div class="form-group">
                 <label>Status</label>
                 <select class="form-control" name="status">
                   <option value="1" <?php echo ($inquilino['status'] == 1) ? 'selected="selected"' : ''; ?>>Ativo</option>
                   <option value="2" <?php echo ($inquilino['status'] == 2) ? 'selected="selected"' : ''; ?>>Inativo</option>
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