<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Atualizar Imóvel
      <small style="font-weight: bold;"> - Cod. do imovel <?php echo $imoveis['referencia'];?></small>
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
            <p class="box-title">Preencha as informações abaixo para realizar a edição, campos com * são obrigatórios!</p>
          </div>
          <!-- /.box-header -->
          <!-- form start -->

          <form role="form" method="POST" enctype="multipart/form-data">
          <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-block btn-lg">Atualizar</button>
        </div>
            <div class="box-body">
            <div class="form-group">
              <label for="" style="color: green; font-size: 16px;">CEMIG</label>
              <input name="cemig" type="text"  class="form-control" id="" value="<?php echo $imoveis['cemig']; ?>" >
            </div>
            <div class="form-group">
              <label for="">* Código do Proprietário</label>                                        
              <input type="text" class="form-control" name="codigo_proprietario" value="<?php echo $imoveis['cod_proprietario']; ?>">  
            </div>
             <div class="form-group">                                        
              <input type="text" class="form-control" id="nome_proprietario" value="<?php echo $nome_proprietario; ?>" readonly>  
            </div>
            <div class="form-group">
              <label for="">* Tipo</label>
              <select required="required" name="tipo" class="form-control">
                <option value="1" <?php echo ($imoveis['tipo']=='1')? 'selected="selected"':''; ?>>Casa</option>
                <option value="2" <?php echo ($imoveis['tipo']=='2')? 'selected="selected"':''; ?>>Apartamento</option>
                <option value="3" <?php echo ($imoveis['tipo']=='3')? 'selected="selected"':''; ?>>Comercial</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">* Finalidade</label>
              <select required="required"  name="finalidade" class="form-control">
                <option value="1" <?php echo ($imoveis['finalidade']=='1')? 'selected="selected"':''; ?>>Locação</option>
                <option value="2" <?php echo ($imoveis['finalidade']=='2')? 'selected="selected"':''; ?>>Venda</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Fotos</label>
              <input type="file" name="fotos[]" multiple class="form-control" id="" placeholder=""><br />

              <div class="panel panel-default">
               <div class="panel-heading">Fotos do Imóvel</div>

               <div class="panel-body" style="padding: 20px"> 


                <?php foreach($imoveis['fotos'] as $fotos): ?>
                  <div class="gallery_item">
                    <img src="<?php echo BASE_URL;?>upload/<?php echo $fotos['url_img']?>" class="img-responsive" style="width: 272px; height: 200px" border="0"  alt=""> 
                    
                    <div class="area_buttons">
                      <button class="btn btn-default btn-sm" href="<?php echo BASE_URL;?>upload/<?php echo $fotos['url_img']?>" data-lightbox="roadtrip">
                        Visualizar
                      </button>
                      <button data-foto="<?php echo $fotos['id']; ?>" type="button" class="btn btn-default btn-sm" onclick="confirm('Tem certeza que deseja apagar?')? apagar_foto(this):'';">Apagar</button>
                    </div>
                    
                  </div>
                <?php endforeach; ?>
            </div>
          </div>

        </div>
        <div class="form-group">
          <label for="">* CEP</label>
            <!--input name="cep" type="text"  class="form-control" id="cep" onkeyup="buscar_cep()" required ="required" placeholder=""-->
            <input name="cep" type="text"  class="form-control" id="cep" placeholder="" value="<?php echo $imoveis['cep'] ?>">  
        </div>
        <div class="form-group">
          <label for="">* Endereço / N°</label>
          <input required="required" name="endereco" type="text"  class="form-control" id="" value="<?php echo $imoveis['endereco']; ?>" >
        </div>
        <div class="form-group">
          <label for="">* Bairro</label>
          <input required="required" name="bairro" type="text"  class="form-control" id="" value="<?php echo $imoveis['bairro']; ?>">
        </div>
        <div class="form-group">
          <label for="">* Cidade</label>
          <input required="required" name="cidade" type="text"  class="form-control" id="" value="<?php echo $imoveis['cidade']; ?>"p>
        </div>
        
        <div class="form-group">
          <label for="">* Estado</label>
          <input required="required"name="uf" type="text"  class="form-control" id="" value="<?php echo $imoveis['uf']; ?>">
        </div>
        <div class="form-group">
          <label for="">* Quartos</label>
          <select required="required" name="dormitorios" class="form-control">
            <option value="1" <?php echo ($imoveis['dormitorios']=='1')? 'selected="selected"':''; ?>>1</option>
            <option value="2" <?php echo ($imoveis['dormitorios']=='2')? 'selected="selected"':''; ?>>2</option>
            <option value="3" <?php echo ($imoveis['dormitorios']=='3')? 'selected="selected"':''; ?>>3</option>
            <option value="4" <?php echo ($imoveis['dormitorios']=='4')? 'selected="selected"':''; ?>>4</option>
            <option value="5" <?php echo ($imoveis['dormitorios']=='5')? 'selected="selected"':''; ?>>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">* Suítes</label>
          <select required="required" name="suites"class="form-control">
            <option value="0" <?php echo ($imoveis['suites']=='0')? 'selected="selected"':''; ?>>0</option>
            <option value="1" <?php echo ($imoveis['suites']=='1')? 'selected="selected"':''; ?>>1</option>
            <option value="2" <?php echo ($imoveis['suites']=='2')? 'selected="selected"':''; ?>>2</option>
            <option value="3" <?php echo ($imoveis['suites']=='3')? 'selected="selected"':''; ?>>3</option>
            <option value="4" <?php echo ($imoveis['suites']=='4')? 'selected="selected"':''; ?>>4</option>
            <option value="5" <?php echo ($imoveis['suites']=='5')? 'selected="selected"':''; ?>>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">* Banheiros</label>
          <select required="required" name="banheiros" class="form-control">
            <option value="1" <?php echo ($imoveis['banheiros']=='1')? 'selected="selected"':''; ?>>1</option>
            <option value="2" <?php echo ($imoveis['banheiros']=='2')? 'selected="selected"':''; ?>>2</option>
            <option value="3" <?php echo ($imoveis['banheiros']=='3')? 'selected="selected"':''; ?>>3</option>
            <option value="4" <?php echo ($imoveis['banheiros']=='4')? 'selected="selected"':''; ?>>4</option>
            <option value="5" <?php echo ($imoveis['banheiros']=='5')? 'selected="selected"':''; ?>>5</option>
          </select>
        </div>
        <div class="form-group">
          <label  for="">* Vagas na Garagem</label>
          <select required="required" name="garagem"class="form-control">
            <option value="0" <?php echo ($imoveis['garagem']=='0')? 'selected="selected"':''; ?>>0</option>
            <option value="1" <?php echo ($imoveis['garagem']=='1')? 'selected="selected"':''; ?>>1</option>
            <option value="2" <?php echo ($imoveis['garagem']=='2')? 'selected="selected"':''; ?>>2</option>
            <option value="3" <?php echo ($imoveis['garagem']=='3')? 'selected="selected"':''; ?>>3</option>
            <option value="4" <?php echo ($imoveis['garagem']=='4')? 'selected="selected"':''; ?>>4</option>
            <option value="5" <?php echo ($imoveis['garagem']=='5')? 'selected="selected"':''; ?>>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="" style="color: blue; text-transform: uppercase;">Informações do Imóvel</label>
          <textarea placeholder="Digite o texto e aperte ENTER para quebrar a linha" name="outros" class="form-control" id="" cols="30" rows="10"><?php echo $imoveis['outros'];?></textarea>
        </div>
        <div class="form-group">
          <label for="">* Área em M²</label>
          <input required="required"name="tamanho" type="text" class="form-control" id="" value="<?php echo $imoveis['tamanho'];?>" placeholder="">
        </div>
        <div class="form-group">
          <label for="">* IPTU</label>
          <select  required="required" name="iptu" class="form-control">
            <option value="1" <?php echo ($imoveis['iptu']=='1')? 'selected="selected"':''; ?>>Sim</option>
            <option value="2" <?php echo ($imoveis['iptu']=='2')? 'selected="selected"':''; ?>>Não</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">* Rejuste</label>
          <input name="reajuste" type="text" required="required" class="form-control" id="" placeholder="" value="<?php echo $imoveis['reajuste'];?>">
        </div>
        <div class="form-group">
          <label for="">* Valor</label>
          <input required="required"name="valor" type="text" class="form-control" id="" value="<?php echo $imoveis['valor'];?>"placeholder="">
        </div>
        <div class="form-group">
          <label for="">* Comissão</label>
          <input required="required"name="comissao" type="text" class="form-control" id="" value="<?php echo $imoveis['comissao'];?>"placeholder="">
        </div>
        <div class="form-group">
          <label for="">* Status</label>
          <select required="required" name="status" class="form-control" readonly="readonly" tabindex="-1" aria-disabled="true" style="pointer-events: none; touch-action: none;">
            <option value="1" <?php echo ($imoveis['status'] == '1')? 'selected="selected"':''; ?>>Alugado</option>
            <option value="2" <?php echo ($imoveis['status'] == '2')? 'selected="selected"':''; ?>>Disponível</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">* Mostrar no site</label>
          <select required="required" name="site" class="form-control">
            <option value="1" <?php echo ($imoveis['site'] == '1')? 'selected="selected"':''; ?>>Sim</option>
            <option value="2" <?php echo ($imoveis['site'] == '2')? 'selected="selected"':''; ?>>Não</option>
          </select>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-block btn-lg">Atualizar</button>
        </div>

      </form>
    </div>
  </div>
</section>

</div>  