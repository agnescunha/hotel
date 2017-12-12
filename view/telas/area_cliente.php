<!DOCTYPE html>
<html lang="pt-br">
<!-- <?php
  //equire_once '../../model/cliente.php';
  //session_start();
  //$login_session = $_SESSION['cliente'];
    //if(isset($login_session)){
     /// echo"Bem-Vindo, $login_session <br>";
   // }else{
    //  echo"Você não pode acessar essa página pois não fez login na página. <br>";
    //}
?> -->
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

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>

    <!-- estilo-->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/agnes.css" rel="stylesheet">

  </head>

  <body>
    <?php
      include 'cabecalho.html';
    ?>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase" id="titulo">Área do Cliente</h2>
            <h3 class="section-subheading text-muted">Bem vindo, esse é o seu espaço, você pode cosultar suas reservas, visualizar e cancelar suas solicitações de reservas, além de ter a possibilidade de editar seus dados cadastrais.</h3>
            <h3 class="section-heading text-uppercase" id="titulo">Dados Pessoais</h3>
          </div>
        </div>
         <form id="areaForm" name="areaForm" novalidate action= "editar_cliente.php" method="post">
          <div  id="area_cliente" class="container-fluid">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <b>Nome Completo:</b> 
                    <input class="form-control" id="nome_cliente" name="nome_cliente" type="text" readonly/>
                    <!-- readonly: impede de editar o campo - fica somente para leitura-->
                </div>
                <div class="col-md-6">
                  <b>Sexo:</b>
                  <input class="form-control" id="sexo_cliente" name="sexo_cliente" type="text" readonly/>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <b>Endereço:</b>
                    <input class="form-control" id="endereco_cliente" name="endereco_cliente" type="text" required="required" onblur="validaEndereco();" minlength="10" maxlength="150" readonly/>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <b>Telefone:</b>
                  <input class="form-control" id="telefone_cliente" name="telefone_cliente" type="text" required="required" pattern="\([0-9]{2}\)[0-9]{5}-[0-9]{4}$" onkeyup="mascaraFone();" onkeypress="mascaraFone();" readonly/>
                </div>
                <div class="col-md-6">
                  <b>Celular:</b>
                  <input class="form-control" id="celular_cliente" name="celular_cliente" type="text" required="required" pattern="\([0-9]{2}\)[0-9]{5}-[0-9]{4}$" onkeyup="mascaraCel();" onkeypress="mascaraCel();" readonly/>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <b>CPF:</b>
                  <input class="form-control" id="cpf_cliente" name="cpf_cliente" type="text" readonly/>
                </div>
                <div class="col-md-6">
                  <b>RG:</b>
                  <input class="form-control" id="rg_cliente" name="rg_cliente" type="text" readonly/>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <b>Data de Nascimento:</b>
                  <input class="form-control" id="nascimento_cliente" name="nascimento_cliente" type="text" readonly/>
                </div>
                <div class="col-md-6">
                  <b>E-mail:</b> 
                  <input class="form-control" id="email_cliente" name="email_cliente" type="email" required="required" onblur="validaEmail();" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <b>Senha atual:</b> 
                  <input class="form-control" id="senha_cliente" name="senha_cliente" type="password" required="required" onblur="validaSenha();" minlength="6" maxlength="8" readonly>
                </div>
                <div class="col-md-6">
                  <b>Confirmar nova senha:</b>
                  <input class="form-control" id="Csenha_cliente" name="Csenha_cliente" type="password" required="required" onblur="confirmaSenha();" minlength="6" maxlength="8" readonly>
                </div>
              </div>
            </div>
            <br/>
            <br/>
            <div>
            <div class="clearfix"></div>
            <div class="col-lg-12 text-center">
              <button id="Button_atualizar" class="btn btn-primary btn-xl text-uppercase" type="submit" onclick="editar_cadastro()";>Atualizar
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<div class="col-lg-12 text-center">
 <a id="Button_fazer_reserva" class="btn btn-primary btn-xl text-uppercase" href = "reserva_cliente.php">REALIZAR NOVA RESERVA</a>
</div>
<div class="row">
  <div class="col-lg-12 text-center">
    <h3 class="section-heading text-uppercase" id="titulo">Histórico de Reservas</h3>
  </div>
</div>
<table id = "historico_reservas">
  <colgroup span="3"></colgroup>
    <tr>
      <th>Agudo</th>
      <th >Médio</th>
      <th>Grave</th>
    </tr>
    <tr>
      <td>Trompete</td>
      <td>Trompa</td>
      <td>Trombone </td>
    </tr>
    <tr>
      <td>Bb</td>
      <td>Fa</td>
      <td>C</td>
    </tr>
</table>

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

      <!-- js -->
      <script src="../js/validacoes_clientes.js"></script>
</body>

</html>