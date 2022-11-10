 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Inquilinos
      <small> - Sistema de Gerenciamento Imobiliario</small>
    </h1>
    <!-- search form -->
    <div class="sidebar-form">
      <div class="input-group">
        <input type="search" name="q" autofocus autocomplete="off" onkeyup="buscar_inquilinos(this)" class="form-control" placeholder="Buscar pelo código, nome ou rg">
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
            <h3 class="box-title">Inquilinos</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Cod</th>
                  <th>Nome</th>
                  <th>CPF/CNPJ</th>
                  <th>Telefone</th>
                  <th>Endereço</th>
                  <th width="115">Ações</th>
                </tr>
              </thead>
               
               <?php foreach ($inquilinos as $inquilino): ?>
                <tr class="<?php echo ($inquilino['status'] == 2)? 'danger':''; ?>">
                  <td><?php echo $inquilino['referencia']; ?></td>
                  <td><?php echo $inquilino['nome']; ?></td>
                  <td><?php echo $inquilino['cpf']; ?></td>
                  <td id="tel"><?php echo $inquilino['telefone']; ?></td>
                  <td><?php
                    if (!empty($inquilino['cod_imovel'])) {
                      $string = $inquilino['endereco'].' - ';
                      $string .= $inquilino['bairro'];
                      echo $string;
                    }
                    ?></td>
                  <td>
                    <a href="<?php echo BASE_URL ;?>inquilinos/ver/<?php echo $inquilino['id'];?>" title="Ver" ><i class="fa fa-eye fa-1x fa-border"></i></a>
                    <a href="<?php echo BASE_URL ;?>inquilinos/editar/<?php echo $inquilino['id'];?>" title="Editar" style="margin:0 10px;"><i class="fa fa-file-text fa-1x fa-border"></i></a>
                    <a href="#" onclick="confirm('Tem certeza que deseja apagar?')? window.location.href='<?php echo BASE_URL.'inquilinos/del/'.$inquilino['id'];?>':''" title="Excluir" ><i class="fa fa-trash fa-1x fa-border"></i></a>
                  </td>
                </tr>
                <?php endforeach ;?>
            </table>

            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                  <ul class="pagination" style="float:right">
                    <?php
                      $conta = ceil($totalInquilinos / $limitInquilinos);
                      
                      for($q=1;$q<=$conta;$q++): ?>
                       <li class="paginate_button">   
                      <a href="<?php echo BASE_URL;?>inquilinos/listar?p=<?php echo $q; ?>" aria-controls="example2"><?php echo $q; ?></a>
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
