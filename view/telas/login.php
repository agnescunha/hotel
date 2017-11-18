﻿<!DOCTYPE html>
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
            <h2 class="section-heading text-uppercase">Login</h2>
            <h3 class="section-subheading text-muted">Se você já possui cadastro em nosso site entre com seus dados abaixo. Caso não possua cadastro ainda, realize seu cadastro para poder acessar todas as funcionalidades dos clientes cadastrados e realizar suas revervas.</h3>
          </div>
        </div>
        <div id="login" class="row">
          <div class="col-lg-8">
            <form id="loginForm" name="sentMessage" novalidate>
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                      <input class="form-control" id="email_cliente" type="email" placeholder="Seu e-mail *" required data-validation-required-message="Por favor, digite seu e-mail.">
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="senha_cliente" type="password" placeholder="Sua senha *" required data-validation-required-message="Por favor digite sua senha.">
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                    <div id="esqueci_minha_senha"><a href="#">Esqueci minha senha</a></div>
                    <div id="success"></div>

                  <button id="Button_login" class="btn btn-primary btn-xl text-uppercase" type="submit">Entrar</button>
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