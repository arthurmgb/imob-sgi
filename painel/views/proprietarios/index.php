 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Proprietarios
      <small> - Sistema de Gerenciamento Imobiliario</small>
    </h1>

    <!-- search form -->
    <div class="sidebar-form">
      <div class="input-group">
        <input type="search" name="q" autofocus autocomplete="off" onkeyup="buscar_proprietario(this)" class="form-control" placeholder="Buscar pelo nome ou rg">
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
            <h3 class="box-title">Proprietarios</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="box-body table-responsive">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Cod</th>
                  <th>Nome</th>
                  <th>CPF / CNPJ</th>
                  <th>Endereço</th>
                  <th>Bairro</th>
                  <th>Cidade</th>
                  <th>Telefone</th>
                  <th>Qt. Imoveis</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($proprietario as $dono): ?>
                  <tr class="<?php echo ($dono['status'] == '2') ? 'danger' : ''; ?>">
                    <td><?php echo $dono['referencia'];?></td>
                    <td><?php echo $dono['nome'];?></td>
                    <td style="word-break: break-all;"><?php echo $dono['cpf'];?></td>
                    <td><?php echo $dono['endereco'];?></td>
                    <td><?php echo $dono['bairro'];?></td>
                    <td><?php echo $dono['cidade'];?></td>
                    <td id="tel"><?php echo $dono['telefone'];?></td>
                    <td><?php echo $dono['qtd_imoveis'];?></td>
                    <td>
                      <a href="<?php echo BASE_URL ;?>proprietarios/ver/<?php echo $dono['id']; ?>" title="Ver" ><i class="fa fa-eye fa-1x fa-border"></i></a>
                      <a href="<?php echo BASE_URL ;?>proprietarios/editar/<?php echo $dono['id']; ?>" title="Editar" style="margin:0 10px;"><i class="fa fa-file-text fa-1x fa-border"></i></a>
                      <a href="#" onclick="confirm('Espere! Todos os imoveis desse proprietario serao apagados.')? window.location.href='<?php echo BASE_URL ;?>proprietarios/del/<?php echo $dono['id']; ?>':'';" title="Excluir" ><i class="fa fa-trash fa-1x fa-border"></i></a>
                    </td>
                  </tr>
                <?php endforeach ;?>
              </tbody>
              
          </table>
          </div>


          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            <ul class="pagination" style="float:right">
              <?php
              $conta = ceil($totalProprietarios / $limitProprietarios);

              for($q=1;$q<=$conta;$q++): ?>
              <li class="paginate_button">   
                <a href="<?php echo BASE_URL;?>proprietarios/listar?p=<?php echo $q; ?>" aria-controls="example2"><?php echo $q; ?></a>
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
