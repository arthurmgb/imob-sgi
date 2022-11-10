<?
// sistema descriptado por Tiago de Araujo Maccartney visite nosso site www.brserve.com.br e www.festhalls.com //
?>
<div id="contato_venda"><!-- contato -->
                        <p class="titulo_contato">Contato</p>
                        <p class="label_contato">Preencha o formulário abaixo e descreva seu imóvel.</p>                    
                            <div class="contato_form_cont_venda">        
                                <form id="formID" action="../../contato/venda/terreno.php" method="post">         
                                    <label class="labelcontato" for="nome"><strong>Nome</strong></label>        
                                    <input name="nome" type="text" id="nome" class="validate[required] form_cont"/>         
                                    <br />        
                                    <label class="labelcontato" for="email"><strong>Email</strong></label>        
                                    <input name="email" type="text" id="email" class="validate[required,custom[email]] form_cont"/> 
                                    <br />              
                                    <label class="labelcontato" for="telefone"><strong>Telefone</strong></label>        
                                    <input name="telefone" type="text" id="telefone" class="validate[required,custom[phone]] form_cont"/>        
                                    <br /> 
                                    <br />        
                                    <label class="label_contato" for="msg"><strong>Descrição do imóvel/terreno </strong></label>
                                    <br /> 
                                    <br />       
                                    <label class="labelcontato" for="estado"><strong>Estado</strong></label>        
                                    <input name="estado" type="text" id="estado" class="validate[required] form_cont"/>  
                                    <br />        
                                    <label class="labelcontato" for="cidade"><strong>Cidade</strong></label>        
                                    <input name="cidade" type="text" id="cidade" class="validate[required] form_cont"/>       
                                    <br /> 
                                    <label class="labelcontato" for="bairro"><strong>Bairro</strong></label>        
                                    <input name="bairro" type="text" id="bairro" class="validate[required] form_cont"/>       
                                    <br />
                                    <label class="labelcontato" for="rua"><strong>Rua</strong></label>        
                                    <input name="rua" type="text" id="rua" class="validate[required] form_cont"/>       
                                    <br /> 
                                    <label class="labelcontato" for="numero"><strong>Número</strong></label>        
                                    <input name="numero" type="text" id="numero" class="validate[required] form_cont"/>       
                                    <br />  
                                    <label class="labelcontato" for="tamanho"><strong>Medida(m²)</strong></label>        
                                    <input name="tamanho" type="text" id="tamanho" class="validate[required] form_cont"/>  
                                    <br />            
                                    <label class="labelcontato" for="msg"><strong>Proposta de venda</strong></label>        
                                    <textarea name="msg" id="msg" cols="" rows="" class="form_cont_text validate[required]"></textarea>              
                                    <br />
                                     <input type="image" src="../../temas/<? echo $tema; ?>/images/btn_enviar.png" value="Enviar" style="cursor: pointer;" class="btn_enviar"/>
                                </form>
                        </div>  <!-- /contato_form" -->  
                     </div><!-- contato -->                         