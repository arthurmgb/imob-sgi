<div class="content-wrapper">

  <section class="content-header">
    <h1 class="imob-custom-h1">
      Repassar ao Proprietário
    </h1>

    <?php
    $finid = filter_input(INPUT_GET, 'contrato', FILTER_SANITIZE_NUMBER_INT);
    $repToggler = filter_input(INPUT_GET, 'rep', FILTER_SANITIZE_STRING);
    ?>

    <div class="toggle-financeiro" style="position: relative;">
      <a href="<?php echo BASE_URL ?>financeiro?contrato=<?= $finid ?>" class="btn btn-lg btn-success btn-fin-inq">
        <i style="margin-right: 5px;" class="fa fa-user-o"></i>
        Receber do Inquilino
      </a>
      <i class="fa fa-arrow-right arrow-icon" style="margin-left: -30px;"></i>
      <button style="pointer-events: none;" class="btn btn-lg btn-primary btn-fin-prop" disabled>
        <i style="margin-right: 5px;" class="fa fa-user"></i>
        Repassar ao Proprietário
      </button>
    </div>

    <form method="GET">
      <div class="div-new-flex" style="position: relative;">

        <input style="font-size: 22px; font-weight: 700;" type="search" name="contrato" value="<?php echo (!empty($searchText)) ? $searchText : ''; ?>" autocomplete="off" autofocus class="form-control input-lg imob-custom-input h-50 only-num" placeholder="Nº do Contrato" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">

        <button type="submit" id="search-btn" class="btn btn-rcb-search">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </form>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <?php if (count($parcelas) > 0) : ?>
          <div class="box box-primary">

            <div class="toggler">
              <?php if ($repToggler): ?>
                <a href="<?= BASE_URL ?>financeiro/repasse?contrato=<?= $finid ?>" class="toggler-link">
                  <i class="fa fa-toggle-on fa-fw fa-2x"></i>
                  <span>Ocultar parcelas repassadas</span>
                </a>
              <?php else: ?>
                <a href="<?= BASE_URL ?>financeiro/repasse?contrato=<?= $finid ?>&rep=false" class="toggler-link">
                  <i class="fa fa-toggle-off fa-fw fa-2x"></i>
                  <span>Ocultar parcelas repassadas</span>
                </a>
              <?php endif; ?>
            </div>

            <div class="box-body table-responsive p-0">
              <table id="example2" class="table table-bordered table-hover fs-16 table-fin">
                <thead>
                  <tr>
                    <th>Proprietário</th>
                    <th>Valor</th>
                    <th>Vl. Comissão</th>
                    <th>%</th>
                    <th>Data Início</th>
                    <th>Data Venc.</th>
                    <th>Repasse</th>
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
                  <tr class="<?php echo $status; ?>">
                    <td><?php echo $parcelas['nome_proprietario']; ?></td>
                    <td class="fw-bold nowrap">R$ <?php
                                                  $valor = $parcela['valor'];
                                                  $comissao = floatval($parcelas['comissao']);
                                                  $com_valor = ($valor / 100) * $comissao;
                                                  $total = $valor -= ceil($com_valor);
                                                  echo number_format(round($total), 2, ',', '.');
                                                  ?>
                    </td>
                    <td style="color: #0055f3;" class="fw-bold nowrap">
                      R$ <?php echo number_format(ceil($parcela['valor'] * $parcelas['comissao'] / 100), 2, ',', '.'); ?>
                    </td>
                    <td class="nowrap text-center">
                      <?= $parcelas['comissao'] ?>%
                    </td>
                    <td class="fw-bold"><?php echo date("d/m/Y", strtotime($parcela['data_inicio'])); ?></td>
                    <td class="fw-bold"><?php echo date('d/m/Y', strtotime($parcela['data_fim'])); ?></td>
                    <?php if ($parcela['repasse'] == 0) : ?>
                      <td style="text-align: center;">
                        <a title="Repassar" style="padding: 5px; outline: none;" class="btn btn-primary" href="<?php echo BASE_URL; ?>financeiro/repasse/<?php echo $parcela['id_contrato']; ?>/<?php echo $parcela['n_parcela']; ?>">
                          <i style="margin-right: 5px;" class="fa fa-exchange fa-lg"></i>
                          Repassar
                        </a>
                      </td>
                    <?php else : ?>
                      <td style="color: #1e40af; background-color: #93c5fd;" class="fw-bold nowrap text-center">
                        <i style="margin-right: 5px;" class="fa fa-check-circle-o"></i>
                        <?= date('d/m/Y', strtotime($parcela['data_repasse'])); ?>
                      </td>
                    <?php endif; ?>
                  </tr>
                <?php endforeach; ?>
              </table>
            </div>
          </div>
        <?php elseif (count($parcelas) == 0 && !empty($finid)) : ?>
          <div style="border-radius: 20px;" class="box box-danger">
            <div class="no-shadow" style="position: relative; padding: 50px;">
              <h3 style="margin: 0;" class="text-center">
                <i style="margin-right: 1rem; color: #DD4B39;" class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                Nenhum contrato encontrado com o número <b><?php echo $finid; ?></b>.
              </h3>
              <h3 style="margin: 5px 0;" class="text-center">
                <small>Verifique se o número do contrato está correto.</small>
              </h3>
            </div>
          </div>
        <?php else : ?>
          <div style="border-radius: 20px;" class="box box-primary">
            <div class="no-shadow" style="position: relative; padding: 50px;">
              <h3 style="margin: 0;" class="text-center">
                <i style="margin-right: 1rem; color: #3C8DBC;" class="fa fa-info-circle" aria-hidden="true"></i>
                Digite o <b>número do contrato</b> para consultar.
              </h3>
              <h3 style="margin: 5px 0;" class="text-center">
                <small>O número do contrato pode ser encontrado na parte superior do recibo.</small>
              </h3>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>

<?php if (!empty($_GET['status'])): ?>
  <script>
    $(document).ready(function() {
      Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Parcela repassada com sucesso! 💸",
        showConfirmButton: false,
        timer: 2000,
        customClass: {
          title: "popup-title",
        }
      });
    })
  </script>
<?php endif; ?>