   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cadastro de Imóveis
        <small> - Sistema de Gerenciamento Imobiliário</small>
      </h1>
      
    </section>
    
     <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php if(!empty($error['msg'])): ?>
          <div class="alert alert-<?php echo $error['type']; ?>">
            <?php echo $error['msg']; ?>
          </div>
          <?php endif; ?>
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <p class="box-title">Preencha as informações abaixo para realizar o cadastro, campos com * são obrigatórios!</p>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="" style="color: green; font-size: 16px;">CEMIG</label>
                  <input name="cemig" type="text" class="form-control" id="" placeholder="">
                </div>
                 <div class="form-group">
                  <label for="">* Código do Proprietário</label>                                        
                    <input type="text" class="form-control" name="codigo_proprietario" required="required">
                  </div>
                  <div class="form-group">                                        
                    <input type="text" id="nome_proprietario" class="form-control" readonly>
                  </div>
                 <div class="form-group">
                  <label for="">* Tipo</label>
                   <select name="tipo" class="form-control">
                      <option value="1" >Casa</option>
                      <option value="2" >Apartamento</option>
                      <option value="3" >Comercial</option>
                    </select>
                </div>
                 <div class="form-group">
                  <label for="">* Finalidade</label>
                   <select name="finalidade" class="form-control">
                      <option value="1">Locação</option>
                      <option value="2">Venda</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="">* CEP</label>
                     <input name="cep" type="text"  class="form-control" id="cep" onkeyup="buscar_cep()" required ="required" placeholder="">
                </div>
                 <div class="form-group">
                  <label for="">* Endereço / N°</label>
                  <input name="endereco" type="text" required="required" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">* Bairro</label>
                  <input name="bairro" type="text" required="required" class="form-control" id="" placeholder="">
                </div>
                 <div class="form-group">
                  <label for="">* Cidade</label>
                  <input name="cidade" type="text" required="required" class="form-control" id="" pplaceholder="">
                </div>
                 <div class="form-group">
                  <label for="">* Estado</label>
                  <input name="uf" type="text" required="required" class="form-control" id="" placeholder="">
                </div>
                 <div class="form-group">
                  <label for="">* Quartos</label>
                    <select name="dormitorios" class="form-control">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="">Suítes</label>
                    <select name="suites"class="form-control">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="">* Banheiros</label>
                    <select name="banheiros" class="form-control">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                </div>
                 <div class="form-group">
                  <label  for="">Vagas na Garagem</label>
                    <select name="garagem"class="form-control">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                </div>
                 <div class="form-group">
                  <label for="" style="color: blue; text-transform: uppercase;">Informações do Imóvel</label>
                  <textarea placeholder="Digite o texto e aperte ENTER para quebrar a linha" name="outros" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Área em M²</label>
                  <input name="tamanho" type="text" class="form-control" id="" placeholder="">
                </div>
                 <div class="form-group">
                  <label for="">* IPTU</label>
                     <select name="iptu" class="form-control">
                      <option value="1">Sim</option>
                      <option value="2">Não</option>
                    </select>
                </div>
               <div class="form-group">
                  <label for="">* Rejuste</label>
                  <input name="reajuste" type="text" required="required" class="form-control" value="6" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">* Valor</label>
                  <input name="valor" type="text" required="required" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">* Comissão</label>
                  <input name="comissao" type="text" required="required" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">* Mostrar no site</label>
                  <select required="required" name="site" class="form-control">
                    <option value="1">Sim</option>
                    <option value="2">Não</option>
                  </select>
                </div>
                  <input name="id_user" type="hidden" value="<?php echo $_SESSION['user']['id'];?>">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Cadastrar</button>
              </div>
              
            </form>
          </div>
      </div>
    </section>

  </div>  