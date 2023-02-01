 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Contratos
      <small> - Sistema de Gerenciamento Imobiliário</small>
    </h1>
    <!-- search form -->
    
    <!-- /.search form -->
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="row">
          <div class="col-xs-12">
            <div class="sidebar-form" style="margin-top: 0">
              <div class="input-group">
                <input type="search" name="q" autofocus autocomplete="off" onkeyup="buscar_contratos(this)" class="form-control" placeholder="Buscar pelo nome do inquilino">
                <span class="input-group-btn">
                  <button type="button" name="search" id="search-btn" class="btn btn-flat">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </div>
          </div>
        
        </div><!-- row -->

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Contratos</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>N° Contrato</th>
                  <th>Inquilino</th>
                  <th>Proprietário</th>
                  <th>Imóvel</th>
                  <th>Inicio</th>
                  <th>Termino</th>  
                  <th>Ações</th>
                </tr>
              </thead>
              <?php foreach ($contrato as $c):

              $data_final = strtotime($c['data_final']);
              $um_mes_frente = strtotime('+1 month');

              if (time() > $data_final) {
                $status = 'danger';
              }
              elseif ($data_final >= time() && $data_final <= $um_mes_frente) {
                $status = 'info';
              }
              else {
                $status = '';
              }
              ?>
              <!-- danger info -->
              <tr class="<?php echo $status; ?>">
                <td><?php echo $c['id'];?></td>
                <td><?php echo $c['nome_inquilino'];?></td>
                <td><?php echo $c['nome_proprietario'];?></td>
                <td><?php echo $c['end_imv'];?></td>
                <td><?php echo date("d/m/Y", strtotime($c['data_inicio']));?></td>
                <td><?php echo date("d/m/Y", strtotime($c['data_final']));?></td>
                <td>
                  <a href="<?php echo BASE_URL.'contratos/ver/'.$c['id']; ?>" title="Ver" ><i class="fa fa-eye fa-1x fa-border"></i></a>
                  <a href="#" onclick="confirm('Tem certeza que deseja apagar?')? window.location.href='<?php echo BASE_URL.'contratos/del/'.$c['id']; ?>':''" title="Excluir" ><i class="fa fa-trash fa-1x fa-border"></i></a>
                </td>
              </tr>
            <?php endforeach ;?>
            
          </table>

          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            <ul class="pagination" style="float:right">
              <?php
              $conta = ceil($totalContratos / $limitContratos);
              $info = array();
              if (!empty($filtros['status'])) {
                $info['status'] = $filtros['status'];
              }
              
              for($q=1;$q<=$conta;$q++):
                $info['p'] = $q;
                $data = http_build_query($info); ?>
              <li class="paginate_button">   
                <a href="<?php echo BASE_URL;?>contratos/listar<?php echo '?'.$data; ?>" aria-controls="example2"><?php echo $q; ?></a>
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
