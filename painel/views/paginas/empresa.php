   <div class="content-wrapper">

     <section class="content-header">
       <h1 class="imob-custom-h1">
         Gerenciar Imobiliária
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
                   <label>Razão Social</label>
                   <input name="razao_social" type="text" value="<?php echo $config['razao_social']; ?>" required="required" class="form-control input-lg">
                 </div>
                 <div class="form-group">
                   <label>CNPJ</label>
                   <input name="cnpj" type="text" value="<?php echo $config['cnpj']; ?>" required="required" class="form-control input-lg" id="cnpj">
                 </div>
                 <div class="form-group">
                   <label>Inscrição Estadual</label>
                   <input name="insc" type="text" value="<?php echo $config['insc']; ?>" required="required" class="form-control input-lg">
                 </div>
                 <div class="form-group">
                   <label>CRECI</label>
                   <input name="creci" type="text" value="<?php echo $config['creci']; ?>" required="required" class="form-control input-lg">
                 </div>
                 <div class="form-group">
                   <label>Telefone/Celular</label>
                   <input name="telefone" type="text" value="<?php echo $config['telefone']; ?>" required="required" class="form-control input-lg" id="tel">
                 </div>
                 <div class="form-group">
                   <label>E-mail</label>
                   <input name="email" type="text" value="<?php echo $config['email']; ?>" required="required" class="form-control input-lg">
                 </div>
                 <div class="form-group">
                   <label>CEP</label>
                   <input name="cep" type="text" value="<?php echo $config['cep']; ?>" required="required" class="form-control input-lg" id="cep" onkeyup="buscar_cep()">
                 </div>
                 <div class="form-group">
                   <label>Endereço</label>
                   <input name="endereco" type="text" value="<?php echo $config['endereco']; ?>" required="required" class="form-control input-lg">
                 </div>
                 <div class="form-group">
                   <label>Bairro</label>
                   <input name="bairro" type="text" value="<?php echo $config['bairro']; ?>" required="required" class="form-control input-lg">
                 </div>
                 <div class="form-group">
                   <label>Cidade</label>
                   <input name="cidade" type="text" value="<?php echo $config['cidade']; ?>" required="required" class="form-control input-lg">
                 </div>
                 <div class="form-group">
                   <label>Estado</label>
                   <input name="uf" type="text" value="<?php echo $config['uf']; ?>" required="required" class="form-control input-lg">
                 </div>
                 <div class="box-footer pt-10">
                   <button type="submit" class="btn btn-lg btn-block btn-primary">
                     Salvar dados
                   </button>
                 </div>
               </div>
             </form>
           </div>

         </div>
       </div>
     </section>

   </div>