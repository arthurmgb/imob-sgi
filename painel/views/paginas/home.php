<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 style="padding-left: 12px">Sistema de Gerenciamento Imobiliário</h1>
<section class="content">
  <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="<?php BASE_URL ?>imovel">
          <div class="info-box text-black custom-ifb custom-ifb">
            <span class="info-box-icon bg-aqua"><i class="fa fa-home fa-x2"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Imóveis</span>
              <span class="info-box-number"><?php echo $totalImoveis;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="<?php BASE_URL ?>inquilinos">
          <div class="info-box text-black custom-ifb">
            <span class="info-box-icon bg-red"><i class="fa fa-address-card fa-x2"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inquilinos</span>
              <span class="info-box-number"><?php echo $totalInquilinos;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="<?php BASE_URL ?>proprietarios">
          <div class="info-box text-black custom-ifb">
            <span class="info-box-icon bg-green"><i class="fa fa-address-card-o fa-x2"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Proprietários</span>
              <span class="info-box-number"><?php echo $totalProprietarios;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="<?php BASE_URL ?>contratos/buscar">
          <div class="info-box text-black custom-ifb">
            <span class="info-box-icon bg-yellow"><i class="fa fa-handshake-o fa-x2"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Contratos</span>
              <span class="info-box-number"><?php echo $totalContratos;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Imóveis Diponiveis para Aluguel</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#COD</th>
                  <th>Tipo</th>
                  <th>Endereço</th>
                  <th>Bairro</th>
                  <th>Cidade</th>
                  <th>Valor</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <?php foreach ($disponiveis as $disponivel): ?>
                <tr>
                  <td><?php echo $disponivel['referencia'];?></td>
                  <td>
                    <?php
                      switch($disponivel['tipo']) {
                        case 1:
                          $tipo = 'Casa';
                        break;
                        case 2:
                          $tipo = 'Apartamento';
                        break;
                        case 3:
                          $tipo = 'Comercial';
                        break;
                      }
                      echo $tipo; 
                    ?>
                  </td>
                  <td><?php echo $disponivel['endereco'];?></td>
                  <td><?php echo $disponivel['bairro'];?></td>
                  <td><?php echo $disponivel['cidade'];?></td>
                  <td>R$ <?php echo number_format($disponivel['valor'],2,",",".");?></td>
                  <td>
                    <a href="imovel/ver/<?php echo $disponivel['id'];?>" title="Ver" style="margin:0 10px;"><i class="fa fa-eye fa-1x fa-border"></i></a>
                    <a href="imovel/editar/<?php echo $disponivel['id'];?>" title="Editar"><i class="fa fa-file-text fa-1x fa-border"></i></a>
                  </td>
                </tr>
              <?php endforeach ;?>
            </table>
            <?php if (!empty($disponivel['id'])): ?>
            <div class="" style="margin: 10px 0; float:right; margin-right:10px;">
                <a class="btn btn-primary btn-flat" href="<?php echo BASE_URL;?>relatorios/disponiveis" target="_blank">Ver Mais</a>
            </div>
            <?php endif; ?>
          </div>

          <!-- /.box-body -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Aluguel Vencido</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>N° Contrato</th>
                  <th>N° Parcela</th>
                  <th>Inquilino</th>
                  <th>Mês</th>
                  <th>Vencimento</th>
                  <th>Valor</th>
                  <th>Ações</th>
                </tr>
              </thead>
             <?php foreach($atrasado as $vencido): ?>
                <tr class="danger">
                  <td><?php echo $vencido['id_contrato'];?></td>
                  <td><?php echo $vencido['n_parcela'];?></td>
                  <td><?php echo $vencido['nome_inquilino']; ?></td>
                  <td><?php echo date('d/m/Y', strtotime($vencido['data_inicio']));?></td>
                  <td><?php echo date('d/m/Y', strtotime($vencido['data_fim']));?></td>
                  <td>R$ <?php echo number_format($vencido['valor'],2,",",".");?></td>
                  <td>
                    <a href="<?php echo BASE_URL ;?>financeiro?contrato=<?php echo $vencido['id_contrato'];?>" title="Ver" style="margin:0 10px;"><i class="fa fa-eye fa-1x fa-border"></i></a>

                    <a href="#" onclick="confirm('Tem certeza que deseja pagar esta parcela?') ? window.location.href='<?php echo BASE_URL ;?>financeiro/pagar/<?php echo $vencido['id_contrato'];?>/<?php echo $vencido['n_parcela'];?>' : ''"
                    title="Pagar"><i class="fa fa-money fa-1x fa-border"></i></a>

                  </td>
                </tr>
              <?php endforeach;?>
            </table>
            <?php if (!empty($vencido['id'])): ?>
            <div class="" style="margin: 10px 0; float:right; margin-right:10px;">
                <a class="btn btn-primary btn-flat" target="_blank" href="<?php echo BASE_URL;?>financeiro">Ver Mais</a>
            </div>
            <?php endif; ?>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
  </div>
  <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Contratos Vencidos</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
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
                <td><?php echo $c['cod_imovel'];?></td>
                <td><?php echo date("d/m/Y", strtotime($c['data_inicio']));?></td>
                <td><?php echo date("d/m/Y", strtotime($c['data_final']));?></td>
                <td>
                  <a href="<?php echo BASE_URL.'contratos/ver/'.$c['id']; ?>" title="Ver" ><i class="fa fa-eye fa-1x fa-border"></i></a>
                  <a href="#" onclick="confirm('Tem certeza que deseja renovar este contrato?') ? window.location.href='<?php echo BASE_URL.'contratos/renovar/'.$c['id'];?>' : ''" title="Renovar" ><i class="fa fa-file fa-1x fa-border"></i></a>
                 </td>
              </tr>
            <?php endforeach ;?>
          </table>
           <?php if (!empty($vencido['id'])): ?>
            <div class="" style="margin: 10px 0; float:right; margin-right:10px;">
                <a class="btn btn-primary btn-flat" target="_blank" href="<?php echo BASE_URL;?>contratos">Ver Mais</a>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>   
</div>
