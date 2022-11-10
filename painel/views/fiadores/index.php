 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Fiadores
      <small> - Sistema de Gerenciamento Imobiliário</small>
    </h1>
    <!-- search form -->
    <div class="sidebar-form">
      <div class="input-group">
        <input type="search" name="q" autofocus autocomplete="off" onkeyup="buscar_fiador(this)" class="form-control" placeholder="Informe o código do inquilino">
        <span class="input-group-btn">
          <button type="button" name="search" id="search-btn" class="btn btn-flat">
            <i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </div>
    <!-- /.search form -->
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Fiadores</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>N. Inquilino</th>
                  <th>CPF / CNPJ</th>
                  <th>Endereço</th>
                  <th>Bairro</th>
                  <th>Cidade</th>
                  <th>Telefone</th>
                  <th>Ações</th>
                </tr>
              </thead>
              
              <?php foreach ($fiadores as $fiador): ?>
              <tr>
                <td><?php echo $fiador['nome']; ?></td>
                <td><?php echo $fiador['n_inquilino']; ?></td>
                <td><?php echo $fiador['cpf']; ?></td>
                <td><?php echo $fiador['endereco']; ?></td>
                <td><?php echo $fiador['bairro']; ?></td>
                <td><?php echo $fiador['cidade']; ?></td>
                <td id="tel"><?php echo $fiador['telefone']; ?></td>
                <td>
                  <a href="<?php echo BASE_URL ;?>fiadores/ver/<?php echo $fiador['id'];?>" title="Ver" ><i class="fa fa-eye fa-1x fa-border"></i></a>
                  <a href="<?php echo BASE_URL ;?>fiadores/editar/<?php echo $fiador['id'];?>" title="Editar" style="margin:0 10px;"><i class="fa fa-file-text fa-1x fa-border"></i></a>
                  <a href="#" onclick="confirm('Tem certeza que deseja apagar?') ? window.location.href='<?php echo BASE_URL.'fiadores/del/'.$fiador['id']; ?>':''" title="Excluir" ><i class="fa fa-trash fa-1x fa-border"></i></a>
                </td>
              </tr>
            <?php endforeach ;?>
          </table>

          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            <ul class="pagination" style="float:right">
              <?php
              $conta = ceil($totalFiadores / $limitFiadores);
              
              for($q=1;$q<=$conta;$q++): ?>
              <li class="paginate_button">   
                <a href="<?php echo BASE_URL;?>fiadores/listar?p=<?php echo $q; ?>" aria-controls="example2"><?php echo $q; ?></a>
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
