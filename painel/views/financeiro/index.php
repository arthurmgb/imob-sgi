<div class="content-wrapper">

  <section class="content-header">
    <h1 class="imob-custom-h1">
      Receber do Inquilino
    </h1>

    <?php
    $finid = filter_input(INPUT_GET, 'contrato', FILTER_SANITIZE_NUMBER_INT);
    $pagasToggler = filter_input(INPUT_GET, 'pagas', FILTER_SANITIZE_STRING);
    ?>

    <div class="toggle-financeiro" style="position: relative;">
      <button style="pointer-events: none;" class="btn btn-lg btn-success btn-fin-inq" disabled>
        <i style="margin-right: 5px;" class="fa fa-user"></i>
        Receber do Inquilino
      </button>
      <i class="fa fa-arrow-left arrow-icon" style="margin-left: -38px;"></i>
      <a href="<?php echo BASE_URL ?>financeiro/repasse?contrato=<?= $finid ?>" class="btn btn-lg btn-primary btn-fin-prop">
        <i style="margin-right: 5px;" class="fa fa-user-o"></i>
        Repassar ao Proprietário
      </a>
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
          <div class="box box-success">

            <div class="toggler">
              <?php if ($pagasToggler): ?>
                <a href="<?= BASE_URL ?>financeiro?contrato=<?= $finid ?>" class="toggler-link">
                  <i class="fa fa-toggle-on fa-fw fa-2x"></i>
                  <span>Ocultar parcelas pagas</span>
                </a>
              <?php else: ?>
                <a href="<?= BASE_URL ?>financeiro?contrato=<?= $finid ?>&pagas=false" class="toggler-link">
                  <i class="fa fa-toggle-off fa-fw fa-2x"></i>
                  <span>Ocultar parcelas pagas</span>
                </a>
              <?php endif; ?>
            </div>

            <div class="box-body table-responsive p-0">
              <table id="example2" class="table table-bordered table-hover fs-16 table-fin">
                <thead>
                  <tr>
                    <th width="20"></th>
                    <th>Inquilino</th>
                    <!-- <th>N° Parc.</th> -->
                    <th>Valor</th>
                    <th>Vl. Comissão</th>
                    <th>%</th>
                    <th>Data Início</th>
                    <th>Data Venc.</th>
                    <th>Data Pag.</th>
                    <th>Origem</th>
                    <th>Recibo</th>
                  </tr>
                </thead>
                <?php foreach ($parcelas['lista'] as $parcela) :
                  $data_fim = strtotime($parcela['data_fim']);
                  $um_mes_frente = strtotime('+1 month');
                  if ($parcela['status'] == 1) {
                    $status = 'success';
                  } else if (time() > $data_fim) {
                    $status = 'danger';
                  } elseif ($data_fim >= time() && $data_fim <= $um_mes_frente) {
                    $status = 'info';
                  } else {
                    $status = '';
                  }
                ?>
                  <tr class="<?php echo $status; ?>">
                    <td class="text-center nowrap" style="vertical-align: middle;">
                      <button title="Editar - <?= $parcela['n_parcela']; ?>" style="outline: none;" class="btn-edit-parc">
                        <i class="fa fa-pencil-square-o fa-lg"></i>
                      </button>
                    </td>
                    <td><?php echo $parcelas['nome_inquilino']; ?></td>
                    <td class="fw-bold nowrap">
                      R$ <?php echo number_format(round($parcela['valor']), 2, ',', '.'); ?>
                    </td>
                    <td style="color: #0055f3;" class="fw-bold nowrap">
                      R$ <?php echo number_format(ceil($parcela['valor'] * $parcelas['comissao'] / 100), 2, ',', '.'); ?>
                    </td>
                    <td class="nowrap text-center">
                      <?= $parcelas['comissao'] ?>%
                    </td>
                    <td class="fw-bold"><?php echo date("d/m/Y", strtotime($parcela['data_inicio'])); ?></td>
                    <td class="fw-bold"><?php echo date('d/m/Y', strtotime($parcela['data_fim'])); ?></td>
                    <?php if ($parcela['data_pag'] > 0) : ?>
                      <td style="color: #166534; background-color: #86efac;" class="fw-bold nowrap text-center">
                        <i style="margin-right: 5px;" class="fa fa-check-circle-o"></i>
                        <?php echo date('d/m/Y', strtotime($parcela['data_pag'])); ?>
                      </td>
                    <?php else : ?>
                      <td></td>
                    <?php endif; ?>
                    <td style="text-align: center;">
                      <?php
                      $origem = null;
                      switch ($parcela['origem']) {
                        case null:
                          $origem = "Indefinida";
                          break;
                        case 1:
                          $origem = "CAIXA";
                          break;
                        case 2:
                          $origem = "BANCO";
                          break;
                        case 3:
                          $origem = "CAIXA/BANCO";
                          break;
                        default:
                          $origem = "---";
                          break;
                      }
                      ?>
                      <?php if ($parcela['status'] == 1) : ?>
                        <span style="<?= ($origem === 'Indefinida') ? 'color: red;' : 'font-weight: bold'; ?>">
                          <?= $origem  ?>
                        </span>
                      <?php endif; ?>

                      <?php if ($parcela['status'] != 1) : ?>

                        <div class="dropdown dropy" style="margin-top: 10px;">
                          <button title="Receber" style="padding: 5px; outline: none;" class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i style="margin-right: 5px;" class="fa fa-money fa-lg"></i>
                            Receber
                          </button>
                          <ul style="margin-bottom: 10px; border: 2px solid green;" class="dropdown-menu dropdown-menu-right pay-menu" aria-labelledby="dropdownMenu2">
                            <li class="dropdown-header pay-drop-h">De onde foi recebido? </li>

                            <li>
                              <a style="font-weight: bold;"
                                class="receber-parcela"
                                data-id="<?= $parcela['id_contrato']; ?>"
                                data-n="<?= $parcela['n_parcela']; ?>"
                                data-tipo="1">
                                💵 CAIXA
                              </a>
                            </li>

                            <li>
                              <a style="font-weight: bold;"
                                class="receber-parcela"
                                data-id="<?= $parcela['id_contrato']; ?>"
                                data-n="<?= $parcela['n_parcela']; ?>"
                                data-tipo="2">
                                💰 BANCO
                              </a>
                            </li>

                            <!-- <li>
                              <a style="font-weight: bold;" onclick="confirm('Tem certeza que deseja receber esta parcela pelo CAIXA/BANCO?') ? window.location.href='<?php echo BASE_URL; ?>financeiro/pagar/<?php echo $parcela['id_contrato']; ?>/<?php echo $parcela['n_parcela']; ?>/3' : ''">
                                🪙 CAIXA/BANCO
                              </a>
                            </li> -->
                          </ul>
                        </div>

                      <?php else : ?>

                      <?php endif; ?>
                    </td>
                    <td class="text-center">

                      <a href="<?php echo BASE_URL; ?>financeiro/recibo/<?php echo $parcela['id_contrato']; ?>/<?php echo $parcela['n_parcela']; ?>" title="Imprimir recibo" class="nowrap rcb-btn">
                        <i style="margin-right: 5px;" class="fa fa-file-text-o fa-lg"></i>
                        Recibo
                      </a>

                    </td>
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
          <div style="border-radius: 20px;" class="box box-success">
            <div class="no-shadow" style="position: relative; padding: 50px;">
              <h3 style="margin: 0;" class="text-center">
                <i style="margin-right: 1rem; color: #02A75B;" class="fa fa-info-circle" aria-hidden="true"></i>
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
<script>
  $(document).ready(function() {
    $('.dropy').on('show.bs.dropdown', function() {
      var $dropdown = $(this).find('.dropdown-menu');
      var $button = $(this).find('.dropdown-toggle');

      var buttonOffset = $button.offset();
      var windowHeight = $(window).height();
      var spaceBelow = windowHeight - (buttonOffset.top + $button.outerHeight());
      var spaceAbove = buttonOffset.top;

      if (spaceBelow < $dropdown.outerHeight() && spaceAbove > $dropdown.outerHeight()) {
        $(this).addClass('dropup');
      } else {
        $(this).removeClass('dropup');
      }
    });
  });
</script>

<?php if (!empty($_GET['status'])): ?>
  <script>
    $(document).ready(function() {
      Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Parcela recebida com sucesso! 💸",
        showConfirmButton: false,
        timer: 2000,
        customClass: {
          title: "popup-title",
        }
      });
    })
  </script>
<?php endif; ?>

<script>
  $(document).ready(function() {
    $(".receber-parcela").on("click", function() {
      let idContrato = $(this).data("id");
      let nParcela = $(this).data("n");
      let tipo = $(this).data("tipo");
      let metodo = tipo == "1" ? "💵 CAIXA" : "💰 BANCO";

      Swal.fire({
        title: "Tem certeza?",
        text: `Deseja receber esta parcela pelo ${metodo}?`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, confirmar!",
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `<?= BASE_URL; ?>financeiro/pagar/${idContrato}/${nParcela}/${tipo}`;
        }
      });
    });
  });
</script>