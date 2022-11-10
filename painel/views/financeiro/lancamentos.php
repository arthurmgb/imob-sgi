<div class="content-wrapper">
  <section class="content-header">
    <h1 style="display: inline">Lançamentos</h1>&nbsp;&nbsp;
    <a href="#add" data-toggle="modal" class="btn btn-primary btn-sm">
      <i class="fa fa-plus" aria-hidden="true"></i>
      &nbsp;&nbsp;Adicionar
    </a>
  </section>
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
        
        <table class="table table-hover">
          <thead>
            <th>Valor</th>
            <th>Data</th>
            <th>Tipo</th>
            <th>Info.</th>
            <th>Ações</th>
          </thead>
          <tbody>
            <?php foreach($lancamentos as $item): ?>
              <tr class="<?php echo $item['tipo'] == 1 ? 'success':'danger';?>">
                <td>R$ <?php echo number_format($item['valor'], 2, ',', '.'); ?></td>
                <td><?php echo date('d/m/Y', strtotime($item['data'])); ?></td>
                <td><?php echo $item['tipo'] == '1' ? 'Entrada':'Saida'; ?></td>
                <td><?php echo $item['info']; ?></td>
                <td>
                  <a href="#" onclick="confirm('Tem certeza que deseja apagar?') ? window.location.href='<?php echo BASE_URL.'financeiro/lancamentos/'.$item['id'].'/del';?>':''" title="Excluir" ><i class="fa fa-trash fa-1x fa-border"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
          <ul class="pagination" style="float:right">
            <?php
              $conta = ceil($totalLancamentos / $limitLancamentos);
              if ($conta > 1):
                for($q=1;$q<=$conta;$q++): ?>
                 <li class="paginate_button">   
                <a href="<?php echo BASE_URL;?>financeiro/lancamentos?p=<?php echo $q; ?>" aria-controls="example2"><?php echo $q; ?></a>
              </li>
              <?php endfor;
            endif;?>
          </ul>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade"tabindex="-1" role="dialog" id="add">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3C8DBC !important; color: white">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Novo lancamento</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo BASE_URL; ?>financeiro/lancamentos/0/add">
          <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" class="form-control form-control-sm dinheiro" name="valor" required="required">
          </div>
          <div class="form-group">
            <label for="descricao">Descricao:</label>
            <textarea required="required" style="resize: none" rows="5" class="form-control form-control-sm" name="info"></textarea>
          </div>
          <p>Tipo da transacao:</p>
          <div class="radio">
            <label>
              <input type="radio" name="tipo" value="1" checked>
              Entrada
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="tipo" value="2">
              Saida
            </label>
          </div>
          <input type="hidden" name="id_user" value="<?php echo $_SESSION['user']['id']?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Adicionar</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
  $('#add').on('shown.bs.modal', function () {
    $('input[name=valor]').focus();
  })
</script>
