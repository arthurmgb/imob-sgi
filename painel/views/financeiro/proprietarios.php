 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Repasse do Proprietário
       <small>Sistema de Gerenciamento Imobiliário</small>
     </h1>

     <div class="toggle-financeiro">
       <a href="<?php echo BASE_URL ?>financeiro" class="btn btn-lg btn-success btn-fin-inq">Receber do Inquilino</a>
       <button style="pointer-events: none;" class="btn btn-lg btn-primary btn-fin-prop" disabled>Repasse do Proprietário</button>
     </div>

     <!-- search form -->
     <form method="GET">
       <div class="div-new-flex">
         <input style="font-size: 20px; font-weight: 700; padding-top: 18px; padding-bottom: 18px;" type="search" name="contrato" value="<?php echo (!empty($searchText)) ? $searchText : ''; ?>" autocomplete="off" autofocus class="form-control" placeholder="Número do contrato" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">

         <button style="color: #fff; font-size: 16px; height: 100%" type="submit" id="search-btn" class="btn btn-success">
           Buscar
           <i style="margin-left: 8px;" class="fa fa-search"></i>
         </button>
       </div>
     </form>

     <!-- /.search form -->
   </section>


   <section class="content">
     <div class="row">
       <div class="col-xs-12">
         <?php if (count($parcelas) > 0) : ?>
           <div class="box">
             <div class="box-header">
               <h3 class="box-title">Área de Repasse do Proprietário</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body table-responsive">
               <table id="example2" class="table table-bordered table-hover">
                 <thead>
                   <tr>
                     <th>N° Cont.</th>
                     <th>Proprietário</th>
                     <th>N° Parc.</th>
                     <th>Valor</th>
                     <th>Data Incio</th>
                     <th>Data Venc.</th>
                     <th>Ações / D.Pag</th>
                   </tr>
                 </thead>
                 <?php foreach ($parcelas['lista'] as $parcela) :

                    $data_fim = strtotime($parcela['data_fim']);
                    $um_mes_frente = strtotime('+1 month');

                    if ($parcela['repasse'] == 1) {
                      $status = 'success';
                    } else if (time() > $data_fim && $parcela['repasse'] == 0) {
                      $status = 'danger';
                    } elseif ($data_fim >= time() && $data_fim <= $um_mes_frente) {
                      $status = 'info';
                    } else {
                      $status = '';
                    }
                  ?>
                   <!-- danger info -->
                   <tr class="<?php echo $status; ?>">
                     <td><?php echo $parcela['id_contrato']; ?></td>
                     <td><?php echo $parcelas['nome_proprietario']; ?></td>
                     <td><?php echo $parcela['n_parcela']; ?></td>
                     <td>R$ <?php

                            $valor = $parcela['valor'];
                            $comissao = floatval($parcelas['comissao']);

                            $total = $valor -= ($valor / 100) * $comissao;
                            echo number_format($total, 2, ',', '.');
                            ?></td>
                     <td><?php echo date("d/m/Y", strtotime($parcela['data_inicio'])); ?></td>
                     <td><?php echo date('d/m/Y', strtotime($parcela['data_fim'])); ?></td>
                     <td>
                       <?php if ($parcela['repasse'] == 0) : ?>
                         <a href="<?php echo BASE_URL; ?>financeiro/repasse/<?php echo $parcela['id_contrato']; ?>/<?php echo $parcela['n_parcela']; ?>" title="Pagar"><i class="fa fa-money fa-1x"></i></a>
                       <?php else :
                          echo date('d/m/Y', strtotime($parcela['data_repasse']));
                        endif; ?>
                     </td>
                   </tr>
                 <?php endforeach; ?>
               </table>
             </div>
             <!-- /.box-body -->
           </div>
         <?php endif; ?>
       </div>
     </div>
   </section>
 </div>