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
                    <?php if ($_SESSION['user']['nivel'] == '1'): ?>
                      <th width="20"></th>
                    <?php endif; ?>
                    <th>Inquilino</th>
                    <!-- <th>N° Parc.</th> -->
                    <th>Valor</th>
                    <th>Vl. Comissão</th>
                    <th class="text-center">%</th>
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
                    <!-- Mostrar botão se for admin -->
                    <?php if ($_SESSION['user']['nivel'] == '1'): ?>
                      <td class="text-center nowrap" style="vertical-align: middle;">
                        <button
                          title="Editar - <?= $parcela['n_parcela']; ?>"
                          style="outline: none;" class="btn-edit-parc"
                          data-id="<?= $parcela['id_contrato']; ?>"
                          data-n="<?= $parcela['n_parcela']; ?>">
                          <i class="fa fa-pencil-square-o fa-lg"></i>
                        </button>
                      </td>
                    <?php endif; ?>
                    <td><?php echo $parcelas['nome_inquilino']; ?></td>
                    <td class="fw-bold nowrap">
                      <?php
                      $parc_valor = round($parcela['valor']);
                      $parc_comissao_porcentagem = floatval($parcelas['comissao']);
                      $parc_comissao_valor = round(($parc_valor / 100) * $parc_comissao_porcentagem);
                      ?>
                      R$ <?= number_format($parc_valor, 2, ',', '.'); ?>
                    </td>
                    <td style="color: #0055f3;" class="fw-bold nowrap">
                      R$ <?= number_format($parc_comissao_valor, 2, ',', '.'); ?>
                    </td>
                    <td class="nowrap text-center">
                      <?= $parc_comissao_porcentagem ?>%
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

<div class="modal fade" id="editarParcela" tabindex="-1" role="dialog" aria-labelledby="editarParcelaLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <table class="table table-bordered fs-16 table-fin table-modal" style="margin: 0;">
          <thead>
            <tr>
              <th>Valor</th>
              <th>Data Início</th>
              <th>Data Venc.</th>
              <th id="data_pag_th">Data Pag.</th>
              <th id="data_rep_th">Repasse</th>
              <th id="actions_th">Ações</th>
            </tr>
          </thead>
          <form action="financeiro/editar" method="POST">
            <input type="hidden" name="id_contrato" id="input_id_contrato">
            <input type="hidden" name="n_parcela" id="input_n_parcela">

            <tr>
              <td>
                <div class="flex-input">
                  <span class="fw-bold">R$</span>
                  <input type="text" name="valor" class="cash">
                </div>
              </td>
              <td>
                <input type="date" name="data_inicio" onfocus="this.showPicker();" min="2000-01-01" max="2100-12-31">
              </td>
              <td>
                <input type="date" name="data_fim" onfocus="this.showPicker();" min="2000-01-01" max="2100-12-31">
              </td>
              <td id="data_pag_td">
                <input type="date" name="data_pag" onfocus="this.showPicker();" min="2000-01-01" max="2100-12-31" id="data_pag_input">
              </td>
              <td id="data_rep_td">
                <input type="date" name="data_rep" onfocus="this.showPicker();" min="2000-01-01" max="2100-12-31" id="data_rep_input">
              </td>
              <td class="text-center" id="actions_td">
                <a
                  id="btn-est-pag"
                  href="#"
                  class="btn btn-success"
                  data-id=""
                  data-n="">
                  <i style="margin-left: 5px;" class="fa fa-undo fa-fw"></i>
                  Estornar pagamento
                </a>
                <a role="button" id="btn-est-rep-none" href="#" class="btn btn-default disabled">
                  <i style="margin-right: 5px;" class="fa fa-times fa-lg"></i>
                  Não repassado
                </a>
              </td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success btn-lg">Salvar alterações</button>
        </form>
      </div>
    </div>
  </div>
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

<?php if (!empty($_GET['status'])):
  $title = "";
  if ($_GET['status'] == 'ok') {
    $title = "Parcela recebida com sucesso! 💸";
    $icon = "success";
  } elseif ($_GET['status'] == 'editado') {
    $title = "Parcela editada com sucesso! ✏️";
    $icon = "success";
  } elseif ($_GET['status'] == 'errozero') {
    $title = "Valor inválido! O valor da parcela não pode ser zero.";
    $icon = "error";
  } elseif ($_GET['status'] == 'pagoestornado') {
    $title = "Pagamento estornado com sucesso! 🔄";
    $icon = "success";
  }
?>
  <script>
    $(document).ready(function() {
      Swal.fire({
        position: "center",
        icon: "<?= $icon; ?>",
        title: "<?= $title; ?>",
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
    // Estornar pagamento #btn-est-pag
    $("#btn-est-pag").on("click", function() {
      let idContrato = $(this).attr("data-id");
      let nParcela = $(this).attr("data-n");

      Swal.fire({
        title: "Tem certeza?",
        html: "Deseja estornar o <b>pagamento</b> desta parcela?<br>O <b>repasse</b> também será estornado <b>caso tenha sido repassado</b>.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, estornar!",
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `<?= BASE_URL; ?>financeiro/estornarpagamento/${idContrato}/${nParcela}`;
        }
      });
    });
  });
</script>

<script>
  $('.btn-edit-parc').on('click', function() {
    $('#editarParcela').modal({
      backdrop: 'static',
      keyboard: false
    });
  });
</script>