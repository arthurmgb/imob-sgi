 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1 class="imob-custom-h1">
       Imóveis Cadastrados
     </h1>
     <!-- search form -->
     <div class="sidebar-form">
       <div class="input-group">
         <input type="search" name="q" autofocus autocomplete="off" onkeyup="buscar_imoveis(this)" class="form-control" placeholder="Buscar pelo endereço, bairro ou nome do proprietário">
         <span class="input-group-btn">
           <button type="button" name="search" id="search-btn" class="btn btn-flat">
             <i class="fa fa-search"></i>
           </button>
         </span>
       </div>
     </div>
     <!-- /.search form -->
   </section>

   <section class="content">
     <div class="row">
       <div class="col-xs-12">
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Imóveis</h3>
           </div>
           <!-- /.box-header -->
           <div class="box-body table-responsive">
             <table id="example2" class="table table-bordered table-hover">
               <thead>
                 <tr>
                   <th>#COD</th>
                   <th>Tipo</th>
                   <th>Endereço</th>
                   <th>Proprietário</th>
                   <th>CEMIG</th>
                   <th>Bairro</th>
                   <th>Valor</th>
                   <th>Status</th>
                   <th>Ações</th>
                 </tr>
               </thead>
               <?php foreach ($imob as $imovel):
                  $highligthers = array(
                    1 => '',
                    2 => 'success',
                    3 => 'success'
                  );
                ?>
                 <tr class="<?php $highlight = $imovel['status'];
                            echo $highligthers[$highlight]; ?>">
                   <td><?php echo $imovel['referencia']; ?></td>
                   <td><?php echo $imovel['tipo']; ?></td>
                   <td><?php echo $imovel['endereco']; ?></td>
                   <td><?php echo $imovel['nome_prop']; ?></td>
                   <td style="<?php echo !is_null($imovel['cemig']) ? ' color: green; font-weight: bold;' : ' color: red;'; ?>">
                     <?php echo !is_null($imovel['cemig']) ? $imovel['cemig'] : 'Não cadastrado'; ?>
                   </td>
                   <td><?php echo $imovel['bairro']; ?></td>
                   <td>R$ <?php echo number_format($imovel['valor'], 2, ",", "."); ?></td>
                   <td>
                     <?php if ($imovel['status'] == '1') {
                        echo 'Alugado';
                      } elseif ($imovel['status'] == '2') {
                        echo 'Disponível';
                      } ?>
                   </td>
                   <td>
                     <a href="<?php echo BASE_URL; ?>imovel/ver/<?php echo $imovel['id']; ?>" title="Ver"><i class="fa fa-eye fa-1x fa-border"></i></a>
                     <a href="<?php echo BASE_URL; ?>imovel/editar/<?php echo $imovel['id']; ?>" title="Editar" style="margin:0 10px;"><i class="fa fa-file-text fa-1x fa-border"></i></a>
                     <a href="#" onclick="confirm('Tem certeza que deseja apagar?') ? window.location.href='<?php echo BASE_URL . 'imovel/del/' . $imovel['id']; ?>':''" title="Excluir"><i class="fa fa-trash fa-1x fa-border"></i></a>
                   </td>
                 </tr>
               <?php endforeach; ?>
             </table>

             <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
               <ul class="pagination" style="float:right">
                 <?php
                  $conta = ceil($totalImoveis / $limitImoveis);

                  for ($q = 1; $q <= $conta; $q++): ?>
                   <li class="paginate_button">
                     <a href="<?php echo BASE_URL; ?>imovel/listar?p=<?php echo $q; ?>" aria-controls="example2"><?php echo $q; ?></a>
                   </li>
                 <?php endfor; ?>
               </ul>
             </div>


           </div>

           <!-- /.box-body -->
         </div>
       </div>
     </div>
   </section>

 </div>