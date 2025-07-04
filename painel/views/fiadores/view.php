 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1 class="imob-custom-h1">
       <?php echo $fiador['nome']; ?>
     </h1>
   </section>

   <section class="content">
     <div class="row">
       <!-- left column -->
       <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary">
           <!-- form start -->
           <form role="form" method="POST" enctype="multipart/form-data">
             <div class="box-body">
               <div class="form-group">
                 <label for="">Nome</label>
                 <input type="text" readonly="true" class="form-control" id="" value="<?php echo $fiador['nome']; ?>" placeholder="">
               </div>
               <div class="form-group">
                 <label for="">CPF / CNPJ</label>
                 <input type="text" readonly="true" class="form-control" value="<?php echo $fiador['cpf']; ?>" placeholder="">
               </div>
               <div class="form-group">
                 <label for="">RG</label>
                 <input type="text" readonly="true" class="form-control" id="" value="<?php echo $fiador['rg']; ?>" placeholder="">
               </div>
               <div class="form-group">
                 <label for="">Nacionalidade</label>
                 <input name="nacionalidade" readonly="true" value="<?php echo $fiador['nacionalidade']; ?>" type="text" required="required" class="form-control" id="">
               </div>
               <div class="form-group">
                 <label for="">Estado Civil</label>
                 <input name="estado_civil" readonly="true" value="<?php echo $fiador['estado_civil']; ?>" required="required" class="form-control">
               </div>
               <div class="form-group">
                 <label for="">Profissão</label>
                 <input type="text" readonly="true" class="form-control" id="" value="<?php echo $fiador['profissao']; ?>" placeholder="">
               </div>

               <div class="form-group">
                 <label for="">Endereço / N°</label>
                 <input type="text" readonly="true" class="form-control" id="" value="<?php echo $fiador['endereco']; ?>" placeholder="">
               </div>
               <div class="form-group">
                 <label for="">Bairro</label>
                 <input type="text" readonly="true" class="form-control" id="" value="<?php echo $fiador['bairro']; ?>" placeholder="">
               </div>
               <div class="form-group">
                 <label for="">Cidade</label>
                 <input type="text" readonly="true" class="form-control" id="" value="<?php echo $fiador['cidade']; ?>" pplaceholder="">
               </div>
               <div class="form-group">
                 <label for="">CEP</label>
                 <input type="text" readonly="true" class="form-control" id="cep" value="<?php echo $fiador['cep']; ?>" placeholder="">
               </div>
               <div class="form-group">
                 <label for="">Estado</label>
                 <input type="text" readonly="true" class="form-control" id="" value="<?php echo $fiador['uf']; ?>" placeholder="">
               </div>
               <div class="form-group">
                 <label for="">Telefone</label>
                 <input type="text" readonly="true" class="form-control" id="" value="<?php echo $fiador['telefone']; ?>" placeholder="">
               </div>
               <div class="form-group">
                 <label for="">Data de Cadastro</label>
                 <input type="text" readonly="true" class="form-control" id="" value="<?php echo date('d/m/Y - H:i:s', strtotime($fiador['data_cad'])); ?>" placeholder="">
               </div>
               <hr>
               <a href="<?php echo BASE_URL; ?>fiadores/editar/<?php echo $fiador['id']; ?>" title="Editar" style="margin:0 10px; "><i class="fa fa-file-text fa-2x fa-border"></i></a>
               <a href="<?php echo BASE_URL; ?>fiadores/del/<?php echo $fiador['id']; ?>" title="Excluir"><i class="fa fa-trash fa-2x fa-border"></i></a>
           </form>
         </div>
       </div>
   </section>

 </div>