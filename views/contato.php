 <div class="container" style="margin-top:80px !important">
  <!-- Page Heading/Breadcrumbs -->
  <h1 class="mt-4 mb-3">Contato</h1><hr>
  <!-- Contact Form -->
  <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
  <div class="row">

    <div class="col-lg-12 mb-6">
      <p class="">Preencha todos os campos abaixo para entrar em contato conosco.</p>
       
      <form method="POST" id="" novalidate>
        <div class="control-group form-group">
          <div class="controls">
            <label>* Nome:</label>
            <input type="text" class="form-control" name="nome" id="name" required data-validation-required-message="Informe seu nome!">
            <p class="help-block"></p>
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>* Assunto:</label>
            <input type="text" class="form-control" name="assunto" id="assunto" required data-validation-required-message="Informe o Assunto!">
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>* Mensagem:</label>
            <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Escreva sua mensagem!" name="mensagem" maxlength="999" style="resize:none"></textarea>
          </div>
        </div>
        <div id="success">

        </div>
        <button type="submit" name="" class="btn btn-primary" id="">Enviar</button>
      </form>
      <br />
    </div>

  </div>
  <!-- /.row -->

</div>
    <!-- /.container -->