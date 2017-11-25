<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">


    <title>Hotel DW2</title>

    <!-- Bootstrap -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- fontes customizadas -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- estilo-->
    <link href="../css/style.css" rel="stylesheet">

  </head>

  <body id="login_cliente">
    
  <?php
    include 'cabecalho.html';
  ?>

  <!-- login -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Cadastrar</h2>
            <h3 class="section-subheading text-muted">Se você não possui cadastro, por favor preencha os campos abaixo para realizar seu cadastro para poder fazer suas reservas.</h3>
          </div>
        </div>
        <div id="login" class="row">
          <div class="col-lg-8">
            <form id="loginForm" name="sentMessage" novalidate>
              <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        Nome Completo: <input class="form-control" id="nome_cliente" type="text" placeholder="Nome Completo" required data-validation-required-message="Por favor digite seu nome." />
                    </div>
                    <div>
                        Sexo:
                        <select name="sexo">
                            <option value="feminino">Feminino</option>
                            <option value="masculino">Masculino</option>
                            <option value="masculino">Outro</option>
                          </select>
                        <br />
                        <br />
                    </div>
                    <div class="form-group">
                        Endereço:
                        <input class="form-control" id="endereco_cliente" type="text" placeholder="Seu endereço" required data-validation-required-message="Por favor digite seu endereço." />
                    </div>
                    <div class="form-group">
                        Telefone:
                        <input class="form-control" id="telefone_cliente" type="text" placeholder="(XX)XXXXX-XXXX" required data-validation-required-message="Por favor digite seu telefone." />
                    </div>
                    <div class="form-group">
                        Celular:
                        <input class="form-control" id="celular_cliente" type="text" placeholder="(XX)XXXXX-XXXX" required data-validation-required-message="Por favor digite seu telefone." />
                    </div>
                    <div class="form-group">
                        CPF:
                        <input class="form-control" id="cpf_cliente" type="text" placeholder="XXX.XXX.XX-XX" required data-validation-required-message="Por favor digite seu CPF." />
                    </div>
                    <div class="form-group">
                        RG:
                        <input class="form-control" id="rg_cliente" type="text" placeholder="XXXXXXXX-XX" required data-validation-required-message="Por favor digite seu RG." />
                    </div>
                    <div class="form-group">
                        Data de Nascimento:
                        <input class="form-control" id="nascimento_cliente" type="date" placeholder="dd/mm/aaaa" required data-validation-required-message="Por favor digite sua data de nascimento." />
                    </div>
                  <div class="form-group">
                      E-mail: <input class="form-control" id="email_cliente" type="email" placeholder="E-mail" required data-validation-required-message="Por favor digite seu E-mail.">
                  </div>
                  <div class="form-group">
                    Cadastrar Senha: <input class="form-control" id="senha_cliente" type="password" placeholder="Senha" required data-validation-required-message="Por favor digite uma Senha.">
                  </div>
                    <div class="form-group">
                        Confirmar Senha:
                        <input class="form-control" id="Csenha_cliente" type="password" placeholder="Senha" required data-validation-required-message="Por favor confirme sua Senha." />
                    </div>
                </div>
                  <br />
                  <br />
                <div>
                    <h2 class="section-heading text-uppercase">Reserva</h2>
                Data da entrada:
                <input class="form-control" id="entrada_cliente" type="date" required data-validation-required-message="Por favor insira uma data de entrada." />
                Data da saída:                
                <input class="form-control" id="saida_cliente" type="date" /><br />

                Tipo de Quarto:
                <select name="sexo">
                    <option value="economico">Econômico</option>
                    <option value="suite">Suíte</option>
                    <option value="premium">Premium</option>
                </select>
                <br />
                <br />
                Diária: <input class="form-control" id="valor_diaria" type="text" /><br />

                Total a Pagar: <input class="form-control" id="valor_total" type="text" /><br />
                </div>
                Ao confirmar sua solicitação de reserva ela será encaminhada para análise de disponibilidade de quarto, e poderá verificar seu status na área do cliente.
                <br />
                <br />
                 <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                <button id="Button_cadastrar" class="btn btn-primary btn-xl text-uppercase" type="submit">Cadastrar e Reservar</button>
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contato_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/agency.min.js"></script>

  </body>

</html>