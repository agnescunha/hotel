<!DOCTYPE html>
<html lang='pt-br'>

  <head>

    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link rel='stylesheet' href='path/to/font-awesome/css/font-awesome.min.css'>

    <title>Hotel DW2</title>

    <!-- Bootstrap -->
    <link href='../vendor/bootstrap/css/bootstrap.min.css' rel='stylesheet'>

    <!-- fontes customizadas -->
    <link href='../vendor/font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js' ></script>

    <!-- estilo-->
    <link href='../css/style.css' rel='stylesheet'>
    <link href='../css/agnes.css' rel='stylesheet'>

  </head>

  <body>
    
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js' ></script>
    <?php
      include 'cabecalho.html';
    ?>
      <section>
        <div class='container'>
          <div class='row'>
            <div class='col-lg-12 text-center'>
              <h2 class='section-heading text-uppercase' id='titulo'>Cadastrar</h2>
              <h3 class='section-subheading text-muted'>Se você não possui cadastro, por favor preencha os campos abaixo para realizar seu cadastro para poder fazer suas reservas.</h3>
            </div>
          </div>
          <div class='row' id='cadastro_cliente'>
            <div class='col-lg-8'>
              <form id='cadastroForm' name='cadastroForm' action= '../../controller/controle_cadastro_cliente.php' method='get' enctype='text/plain'>
                <div class='row'>
                  <div class='col-md-9'>
                    <div class='form-group'>
                      Nome Completo: 
                        <input class='form-control' id='nome_cliente' name='nome_cliente' type='text' placeholder='Nome Completo' pattern='[[a-z][A-Z]\s]+$' required='required' data-validation-required-message='Por favor digite seu nome.' minlength='10' onkeyup='mascaraNome();' onkeypress='mascaraNome();'/>
                    </div>
                    <div class='form-group'>
                     Sexo:<br />
                        <input id='sexoF' type='radio' name='sexo' value='feminino' /> Feminino
                        &nbsp;&nbsp; 
                        <input id='sexoM' type='radio' name='sexo' value='masculino'  /> Masculino   
                        &nbsp;&nbsp;
                        <input id='sexoO' type='radio' name='sexo' value='outros' /> Outro   
                      <br />
                      <br />
                    </div>
                    <div class='form-group'>
                      Endereço:
                        <input class='form-control' id='endereco_cliente' name='endereco_cliente' type='text' placeholder='Seu endereço' required='required' data-validation-required-message='Por favor digite seu endereço.' onblur='validaEndereco();' minlength='10' maxlength='150'/>
                    </div>
                    <div class='form-group'>
                      Telefone:
                        <input class='form-control' id='telefone_cliente' name='telefone_cliente' type='text' placeholder='(XX)XXXXX-XXXX' required='required' data-validation-required-message='Por favor digite seu número de telefone.' pattern='\([0-9]{2}\)[0-9]{5}-[0-9]{4}$' onkeyup='mascaraFone();' onkeypress='mascaraFone();'/>
                    </div>
                    <div class='form-group'>
                      Celular:
                        <input class='form-control' id='celular_cliente' name='celular_cliente' type='text' placeholder='(XX)XXXXX-XXXX' required='required' data-validation-required-message='Por favor digite seu número de celular.' pattern='\([0-9]{2}\)[0-9]{5}-[0-9]{4}$' onkeyup='mascaraCel();' onkeypress='mascaraCel();'/>
                    </div>
                    <div class='form-group'>
                      CPF:
                        <input class='form-control' id='cpf_cliente' name='cpf_cliente' type='text' placeholder='XXX.XXX.XX-XX' required='required' data-validation-required-message='Por favor digite seu CPF.' onkeyup='mascaraCPF();' onkeypress='mascaraCPF();' pattern='[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}'/>
                    </div>
                    <div class='form-group'>
                      RG:
                        <input class='form-control' id='rg_cliente' name='rg_cliente' type='text' placeholder='XXXXXXXXXX' required='required' data-validation-required-message='Por favor digite seu RG.'/>
                    </div>
                    <div class='form-group'>
                      Data de Nascimento:
                        <input class='form-control' id='nascimento_cliente' name='nascimento_cliente' type='text' placeholder='dd/mm/aaaa' required='required' data-validation-required-message='Por favor digite sua data de nascimento.' onkeypress ='mascaraDataNascimento();' onblur ='validaDataNascimento();' maxlength='10' autocomplete='off' pattern='[0-9]{2}\/[0-9]{2}\/[0-9]{4}$'/>
                    </div>
                    <div class='form-group'>
                      E-mail: 
                        <input class='form-control' id='email_cliente' name='email_cliente' type='email' placeholder='E-mail' required='required' data-validation-required-message='Por favor digite seu E-mail.' onblur='validaEmail();'>
                    </div> 
                    <div class='form-group'>
                      Cadastrar Senha: 
                        <input class='form-control' id='senha_cliente' name='senha_cliente' type='password' placeholder='Senha' required='required' data-validation-required-message='Por favor digite uma Senha.' onblur='validaSenha();' text='Mínimo 6 e no máximo 8 dígitos' minlength='6' maxlength='8'>
                    </div>
                    <div class='form-group'>
                      Confirmar Senha:
                        <input class='form-control' id='Csenha_cliente' name='Csenha_cliente' type='password' placeholder='Confirme a senha' required='required' data-validation-required-message='Por favor confirme sua Senha.' onblur='confirmaSenha();' minlength='6' maxlength='8'/>
                    </div>
                  </div>
                  <br />
                  <br />
                  <div>
                    <!-- <div class='clearfix'></div> -->
                    <div class='col-lg-12 text-center'>
                      <button id='Button_cadastrar' name = 'cadastrar' type='submit' onclick='Enviar()';>Cadastrar</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

    <?php
      include 'rodape.html';
    ?>

      <!-- Bootstrap core JavaScript -->
      <script src='../vendor/jquery/jquery.min.js'></script>
      <script src='../vendor/bootstrap/js/bootstrap.bundle.min.js'></script>
      <!-- Plugin JavaScript -->
      <script src='../vendor/jquery-easing/jquery.easing.min.js'></script>

      <!-- Contact form JavaScript -->
      <script src='../js/jqBootstrapValidation.js'></script>
      <script src='../js/contato_me.js'></script>

      <!-- Custom scripts for this template -->
      <script src='../js/agency.min.js'></script>

      <!-- js -->
      <script src='../js/validacoes_clientes.js'></script>
  </body>

</html>