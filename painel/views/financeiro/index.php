<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Receber do Inquilino
      <small>Sistema de Gerenciamento Imobiliário</small>
    </h1>
    <!-- search form -->
    <form method="GET" >
      <div class="div-new-flex">
        <input style="font-size: 20px; font-weight: 700; padding-top: 18px; padding-bottom: 18px;" type="search" name="contrato" value="<?php echo (!empty($searchText)) ? $searchText: ''; ?>" autocomplete="off" autofocus class="form-control" placeholder="Número do contrato" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">
        
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
        <?php if (count($parcelas) > 0): ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Área de Recebimento do Inquilino</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
                     <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>N° Cont.</th>
                <th>Inquilino</th>
                <th>N° Parc.</th>
                <th>Valor</th>
                <th>Data Incio</th>
                <th>Data Venc.</th>
                <th>Data Pag.</th> 
                <th>Ações</th>
              </tr>
            </thead>
              <?php foreach ($parcelas['lista'] as $parcela):
                  $data_fim = strtotime($parcela['data_fim']);
                  $um_mes_frente = strtotime('+1 month');
                  if ($parcela['status'] == 1){
                    $status = 'success';
                }else if (time() > $data_fim) {
                  $status = 'danger';
                } elseif ($data_fim >= time() && $data_fim <= $um_mes_frente) {
                  $status = 'info';
                }else {
                  $status = '';
                }
              ?>
              <!-- danger info -->
              <tr class="<?php echo $status; ?>">
                <td><?php echo $parcela['id_contrato'];?></td>
                <td><?php echo $parcelas['nome_inquilino']; ?></td>
                <td><?php echo $parcela['n_parcela'];?></td>
                <td>R$ <?php echo number_format($parcela['valor'], 2, ',', '.');?></td>
                <td><?php echo date("d/m/Y", strtotime($parcela['data_inicio']));?></td>
                <td><?php echo date('d/m/Y', strtotime($parcela['data_fim']));?></td>
                <?php if($parcela['data_pag'] > 0):?>
                <td><?php echo date('d/m/Y', strtotime($parcela['data_pag']));?></td>  
              <?php else:?>
                <td></td>
              <?php endif;?>
                <td>
                  <?php if($parcela['status'] != 1):?>
                   <a href="#" onclick="confirm('Tem certeza que deseja pagar esta parcela?') ? window.location.href='<?php echo BASE_URL ;?>financeiro/pagar/<?php echo $parcela['id_contrato'];?>/<?php echo $parcela['n_parcela'];?>' : ''"
                    title="Pagar" style="margin-left: 5px;"><i class="fa fa-money fa-1x fa-border"></i></a>
                  <?php else: ?>

                  <?php endif;?>

                    <a href="<?php echo BASE_URL ;?>financeiro/recibo/<?php echo $parcela['id_contrato'];?>/<?php echo $parcela['n_parcela'];?>" title="Recibo" style="margin: 0 5px;"><i class="fa fa-print fa-1x fa-border"></i></a>
                 
                </td>
              </tr>
            <?php endforeach ; ?>
          </table>
          </div>
        </div><!-- /.box -->
        <?php endif; ?>  
      </div><!-- /.col-xs-12 -->
    </div><!-- /.row -->
  </section>
</div>
