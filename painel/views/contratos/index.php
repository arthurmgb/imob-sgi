 <div class="content-wrapper">

   <section class="content-header imob-flex-row">
     <h1 class="imob-custom-h1">
       Contratos Cadastrados
     </h1>
     <a href="<?= BASE_URL . 'contratos/buscar' ?>" class="btn btn-lg btn-success">
       <i style="margin-right: 5px;" class="fa fa-search"></i>
       Buscar por nomes
     </a>
   </section>

   <section class="content">

     <div class="row">
       <div class="col-xs-12">
         <form class="pb-10 mt-10">
           <select name="status" onchange="this.form.submit()" class="form-control input-lg pointer imob-custom-input h-50">
             <option value="" <?php echo (!empty($_GET['status']) && $_GET['status'] == '') ? 'selected="selected"' : ''; ?>>
               🟣 Todos
             </option>
             <option value="1" <?php echo (!empty($_GET['status']) && $_GET['status'] == '1') ? 'selected="selected"' : ''; ?>>
               ⚪🔵 Ativos
             </option>
             <option value="2" <?php echo (!empty($_GET['status']) && $_GET['status'] == '2') ? 'selected="selected"' : ''; ?>>
               🔵 À vencer
             </option>
             <option value="3" <?php echo (!empty($_GET['status']) && $_GET['status'] == '3') ? 'selected="selected"' : ''; ?>>
               🔴 Vencidos
             </option>
           </select>
         </form>
       </div>
     </div>

     <div class="row">
       <div class="col-xs-12">
         <div class="box box-primary">

           <div class="box-body">
             <table id="example2" class="table table-bordered table-hover fs-16">
               <thead>
                 <tr>
                   <th>Nº</th>
                   <th>Inquilino</th>
                   <th>Proprietário</th>
                   <th>Imóvel</th>
                   <th>Início</th>
                   <th>Término</th>
                   <th>Ações</th>
                 </tr>
               </thead>
               <?php foreach ($contrato as $c):

                  $data_final = strtotime($c['data_final']);
                  $um_mes_frente = strtotime('+1 month');

                  if (time() > $data_final) {
                    $status = 'danger';
                  } elseif ($data_final >= time() && $data_final <= $um_mes_frente) {
                    $status = 'info';
                  } else {
                    $status = '';
                  }
                ?>

                 <tr class="<?php echo $status; ?> <?= $c['del_approval'] == '1' ? 'cont-excluir-style' : '' ?>">
                   <td><?php echo $c['id']; ?></td>
                   <td><?php echo $c['nome_inquilino']; ?></td>
                   <td><?php echo $c['nome_proprietario']; ?></td>
                   <td><?php echo $c['end_imv']; ?></td>
                   <td><?php echo date("d/m/Y", strtotime($c['data_inicio'])); ?></td>
                   <td><?php echo date("d/m/Y", strtotime($c['data_final'])); ?></td>
                   <td>
                     <a style="margin: 0px 10px;" href="<?php echo BASE_URL . 'financeiro?contrato=' . $c['id']; ?>" title="Pagamentos">
                       <i class="fa fa-money fa-1x fa-border text-success"></i>
                     </a>
                     <!-- <a style="margin: 0px 10px;" href="<?php echo BASE_URL . 'contratos/ver/' . $c['id']; ?>" title="Ver">
                       <i class="fa fa-eye fa-1x fa-border"></i>
                     </a> -->
                     <?php if ($c['del_approval'] !== '1'): ?>
                       <a href="#" onclick="confirm('Tem certeza que deseja excluir este contrato?')? window.location.href='<?php echo BASE_URL . 'contratos/del/' . $c['id']; ?>':''" title="Excluir">
                         <i class="fa fa-trash fa-1x fa-border text-danger"></i>
                       </a>
                     <?php endif; ?>
                   </td>
                 </tr>
                 <?php if ($c['del_approval'] == '1'): ?>
                   <tr>
                     <td class="cont-excluir-advice" colspan="7">
                       <i style="margin-right: 5px;" class="fa fa-exclamation-triangle text-danger"></i>
                       Exclusão aguardando aprovação do administrador.
                       <br>
                       Solicitada por: <?= $c['del_user']; ?>
                     </td>
                   </tr>
                 <?php endif; ?>
               <?php endforeach; ?>

             </table>

             <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
               <ul class="pagination" style="float:right">
                 <?php
                  $pgAtual = $_GET['p'] ?? 1;
                  $conta = ceil($totalContratos / $limitContratos);
                  $info = array();
                  if (!empty($filtros['status'])) {
                    $info['status'] = $filtros['status'];
                  }

                  for ($q = 1; $q <= $conta; $q++):
                    $info['p'] = $q;
                    $data = http_build_query($info); ?>
                   <li class="paginate_button <?= $pgAtual == $q ? 'active' : '' ?>">
                     <a href="<?php echo BASE_URL; ?>contratos/listar<?php echo '?' . $data; ?>" aria-controls="example2"><?php echo $q; ?></a>
                   </li>
                 <?php endfor; ?>
               </ul>
             </div>
           </div>

         </div>
       </div>
     </div>
   </section>
 </div>