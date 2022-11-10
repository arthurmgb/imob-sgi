 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Financeiro
      <small>Sistema de Gerenciamento Imobiliário</small>
    </h1>
    <!-- search form -->
    <form method="GET" class="sidebar-form">
      <div class="input-group">
        <input type="search" name="contrato" value="<?php echo (!empty($searchText)) ? $searchText: ''; ?>" autofocus autocomplete="off" class="form-control" placeholder="Numero do contrato">
        <span class="input-group-btn">
          <button type="button" id="search-btn" class="btn btn-flat">
            <i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
  </section>


  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <?php if (count($parcelas) > 0): ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Aréa de Repasse do Proprietário</h3>
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
             <?php foreach ($parcelas['lista'] as $parcela):

              $data_fim = strtotime($parcela['data_fim']);
              $um_mes_frente = strtotime('+1 month');

              if ($parcela['repasse'] == 1){
                $status = 'success';
              }
              else if (time() > $data_fim && $parcela['repasse'] == 0) {
                $status = 'danger';
              } elseif ($data_fim >= time() && $data_fim <= $um_mes_frente) {
                $status = 'info';
              }
              else {
                $status = '';
              }
              ?>
              <!-- danger info -->
              <tr class="<?php echo $status; ?>">
                <td><?php echo $parcela['id_contrato'];?></td>
                <td><?php echo $parcelas['nome_proprietario']; ?></td>
                <td><?php echo $parcela['n_parcela'];?></td>
                <td>R$ <?php
                  
                  $valor = $parcela['valor'];
                  $comissao = floatval($parcelas['comissao']);

                  $total = $valor -= ($valor / 100) * $comissao;
                  echo number_format($total, 2, ',', '.');
                ?></td>
                <td><?php echo date("d/m/Y", strtotime($parcela['data_inicio'])); ?></td>
                <td><?php echo date('d/m/Y', strtotime($parcela['data_fim'])); ?></td>
                <td>
                  <?php if ($parcela['repasse'] == 0): ?>
                    <a href="<?php echo BASE_URL ;?>financeiro/repasse/<?php echo $parcela['id_contrato'];?>/<?php echo $parcela['n_parcela'];?>" title="Pagar"><i class="fa fa-money fa-1x"></i></a>
                  <?php else:
                    echo date('d/m/Y', strtotime($parcela['data_repasse']));
                  endif; ?>
                </td>
              </tr>
            <?php endforeach ; ?>
          </table>
      </div>
      <!-- /.box-body -->
    </div>
    <?php endif; ?> 
  </div>
</div>
</section>
</div>
