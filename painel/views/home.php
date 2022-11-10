<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 style="padding-left: 12px">Sistema de Gerenciamento Imobiliario</h1>
<section class="content">
  <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-home fa-x2"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Imóveis</span>
              <span class="info-box-number"><?php echo $totalImoveis;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-address-card fa-x2"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inquilinos</span>
              <span class="info-box-number"><?php echo $totalInquilinos;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-address-card-o fa-x2"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Proprietarios</span>
              <span class="info-box-number"><?php echo $totalProprietarios;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-handshake-o fa-x2"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Contratos</span>
              <span class="info-box-number"><?php echo $totalContratos;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Imóveis Diponiveis</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#REF</th>
                  <th>Tipo</th>
                  <th>Endereço</th>
                  <th>Bairro</th>
                  <th>Cidade</th>
                  <th>Valor</th>
                  <th>Finalidade</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <?php foreach ($disponiveis as $disponivel): ?>
                <tr>
                  <td><?php echo $disponivel['referencia'];?></td>
                  <td><?php echo ($disponivel['tipo']=='1') ? 'Casa':'Apartamento';?></td>
                  <td><?php echo utf8_encode ($disponivel['endereco']);?></td>
                  <td><?php echo utf8_encode ($disponivel['bairro']);?></td>
                  <td><?php echo $disponivel['cidade'];?></td>
                  <td><?php echo number_format($disponivel['valor'],2,",",".");?></td>
                  <td><?php echo ($disponivel['finalidade']=='1') ? 'Aluguel':'Venda';?></td>
                  <td>
                    <a href="imoveis/ver/<?php echo $disponivel['id'];?>" title="Ver" style="margin:0 10px;"><i class="fa fa-eye fa-1x fa-border"></i></a>
                    <a href="imoveis/editar/<?php echo $disponivel['id'];?>" title="Editar"><i class="fa fa-file-text fa-1x fa-border"></i></a>
                  </td>
                </tr>
              <?php endforeach ;?>
                
            </table>
          </div>

          <!-- /.box-body -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Aluguel Vencido</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Inquilino</th>
                  <th>Vencimento</th>
                  <th>Valor</th>
                </tr>
              </thead>
                <tr>
                  <td>João marcos</td>
                  <td>20/05/2018</td>
                  <td>R$ 980,00</td>
                </tr>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
      </div>

      <div class="col-xs-6">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Proximos Vencimentos</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Inquilino</th>
                  <th>Vencimento</th>
                  <th>Valor</th>
                </tr>
              </thead>
                <tr>
                  <td>João marcos</td>
                  <td>20/06/2018</td>
                  <td>R$ 980,00</td>
                </tr>
            </table>
          </div>

          <!-- /.box-body -->
        </div>
      </div>
    </div>
  
  <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Contratos a vencer</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>Inquilino</th>
                  <th>Proprietario</th>
                  <th>Aluguel</th>
                  <th>Reajuste</th>
                  <th>Novo Valor</th>
                  <th>Ações</th>
                </tr>
              </thead>
                <tr>
                  <td>1</td>
                  <td>João</td>
                  <td>Lucas</td>
                  <td>R$  850,00</td>
                  <td>6%</td>
                  <td>R$ 901,00</td>
                  <td>
                    <a href="imoveis/ver/<?php echo $disponivel['id'];?>" title="Ver" ><i class="fa fa-eye fa-1x fa-border"></i></a>
                    <a href="imoveis/editar/<?php echo $disponivel['id'];?>" title="Renovar" style="margin:0 10px;"><i class="fa fa-file-text fa-1x fa-border"></i></a>
                    <a href="imoveis/del/<?php echo $disponivel['id'];?>" title="Excluir" ><i class="fa fa-trash fa-1x fa-border"></i></a>
                  </td>
                </tr>
            </table>
          </div>

          <!-- /.box-body -->
        </div>
      </div>
    </div>

  </section>    

</div>
