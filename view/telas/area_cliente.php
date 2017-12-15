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

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>
    
    <!-- estilo-->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/agnes.css" rel="stylesheet">

  </head>

  <body>
    <?php
      require_once '../../model/Banco.php';
      require_once '../../model/Cliente.php';
        
      session_start();

      if(!isset($_SESSION['cliente']) == true){
        unset($_SESSION['cliente']);
        header('Location: login.php');
      }

      else{
        $banco = new Banco();
        $cliente = $banco->pesquisarCliente("email",$_SESSION['cliente']);
      }
    
      if(isset($_GET['botao_sair'])){
          unset($_SESSION);
          session_destroy();
          header('Location: login.php');
      }

      include 'cabecalho.html';
      
    ?>
<!-- caixa de login -->
    <div id = "caixaLogin">
      <form method='get'>
        <?php echo $cliente->getNome().'<br><br>';?>
          <button id = "button_sair" name="botao_sair" class="btn btn-primary" type="submit">Sair</button>
      </form>
    </div>

    
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase" id="titulo">Área do Cliente</h2>
            <h3 class="section-subheading text-muted">Bem vindo, esse é o seu espaço, você pode cosultar suas reservas, visualizar e cancelar suas solicitações de reservas, além de ter a possibilidade de editar seus dados cadastrais.</h3>
            <h3 class="section-heading text-uppercase" id="titulo">Dados Pessoais</h3>
          </div>
        </div>
         <form id="areaForm" name="areaForm" action='../../controller/atualizar_cliente.php' method='post'>
         <div  id="area_cliente" class="container-fluid">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <b>Nome Completo:</b>
                    <?php
                      echo "<input class='form-control' id='nome_cliente' name='nome_cliente' type='text' value='".$cliente->getNome()."' readonly />";
                    ?>
                  
                    <!-- readonly: impede de editar o campo - fica somente para leitura-->
                </div>
                <div class="col-md-6">
                  <b>Sexo:</b>
                    <?php
                      echo"<input class='form-control' id='sexo_cliente' name='sexo_cliente' type='text' readonly value='".$cliente->getSexo()."'/>";
                    ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <b>Endereço:</b>
                    <?php
                      echo "<input class='form-control' id='endereco_cliente' name='endereco_cliente' type='text' required='required' onblur='validaEndereco();' minlength='10' maxlength='150' value='".$cliente->getEndereco()."'/>";
                    ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <b>Telefone:</b>
                    <?php
                      echo "<input class='form-control' id='telefone_cliente' name='telefone_cliente' type='text' required='required' pattern='\([0-9]{2}\)[0-9]{5}-[0-9]{4}$' onkeyup='mascaraFone();' onkeypress='mascaraFone();' value='".$cliente->getTelefone1()."'/>";
                    ?>
                </div>
                <div class="col-md-6">
                  <b>Celular:</b>
                    <?php
                      echo "<input class='form-control' id='celular_cliente' name='celular_cliente' type='text' required='required' pattern='\([0-9]{2}\)[0-9]{5}-[0-9]{4}$' onkeyup='mascaraCel();' onkeypress='mascaraCel();' value='".$cliente->getTelefone2()."'/>";
                    ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <b>CPF:</b>
                    <?php
                      echo"<input class='form-control' id='cpf_cliente' name='cpf_cliente' type='text' readonly value='".$cliente->getCpf()."'/>";
                    ?>
                </div>
                <div class="col-md-6">
                  <b>RG:</b>
                    <?php
                      echo"<input class='form-control' id='rg_cliente' name='rg_cliente' type='text' readonly value='".$cliente->getRg()."'/>";
                    ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <b>Data de Nascimento:</b>
                    <?php
                      echo"<input class='form-control' id='nascimento_cliente' name='nascimento_cliente' type='text' readonly value='".$cliente->getAniversario()."'/>";
                    ?>
                </div>
                <div class="col-md-6">
                  <b>E-mail:</b>
                    <?php
                      echo "<input class='form-control' id='email_cliente' name='email_cliente' type='email' required='required' onblur='validaEmail();' readonly value='".$cliente->getEmail()."'/>";
                    ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <b>Senha atual:</b> 
                    <?php
                      echo "<input class='form-control' id='senha_cliente' name='senha_cliente' type='password' required='required' onblur='validaSenha();' minlength='6' maxlength='8' value='".$cliente->getSenha()."'/>";
                    ?>
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
              <button id="Button_atualizar" name="Button_atualizar" onclick = "alert('Dados cadastrados com sucesso!')" class="btn btn-primary btn-xl text-uppercase"> Atualizar
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
<section>
  <div class="container">
    <div class='row'>
      <div class='col-lg-12 text-center'>
        <h3 class='section-heading text-uppercase' id='titulo'>Histórico de Reservas</h3>
        <h3 class='section-subheading text-muted'>Abaixo você pode visualizar suas últimas 10 reservas realizadas. Obs: Apenas reservas ainda não aprovadas poderão ser canceladas via área do cliente, após a aprovação para realizar cancelamentos somente entrando em contato conosco.</h3>
      </div>
    </div>
    <div id="tabela_historico" name="tabela_historico" class="col-md-8 col-md-offset-2">
      <h4 class='section-heading text-uppercase' id="subtitulo">Pendentes</h4>
      <table id="pendentes" name = "pendentes">
        <thead> <!--cabeçalho da tabela-->
          <tr>
            <th>Data Inicial</th>
            <th>Data Final</th>
            <th>Tipo de Quarto</th>
            <th>Valor Diária</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <?php 
              $pendentes = $banco->reservasPendentes($cliente);
              foreach($pendentes as $a){
                $inicio = $a['inicio'];
                  $ano = substr($inicio,0,4);
                  $mes = substr(substr($inicio,5,7),0,2); //2 substr pois está repetindo o dia
                  $dia = substr($inicio,8,10);
                $saida = $a['saida'];
                  $ano = substr($saida,0,4);
                  $mes = substr(substr($saida,5,7),0,2); //2 substr pois está repetindo o dia
                  $dia = substr($saida,8,10);
                switch($a['classe']){
                  case 'a':
                    $classe = 'Premium';
                    break;
                  case 'b':
                    $classe = 'Suite';
                    break;
                  case 'c':
                    $classe = 'Economica';
                    break;
                }
      
                echo "<td><input id = 'campos' disabled='disabled' readonly='readonly' type='date' value = '".$inicio."'></input></td>";
                echo "<td><input id = 'campos' disabled='disabled' readonly='readonly' type='date' value = '".$saida."'></input></td>";
                echo "<td><input id = 'campos' disabled='disabled' readonly='readonly' type='text' value = '".$classe."'></input></td>";
                echo "<td><input id = 'campos' disabled='disabled' readonly='readonly' type='' value = 'R$ ".$a['valor'].",00'></input></td>";
                echo "<td><input id = 'campos' disabled='disabled' readonly='readonly' type='text' value = '".$a['status_reserva']."'></input></td>";
                echo "<td><button class='btn btn-primary' id='button_cancelar'>Cancelar</button></td>";
                echo "</tr>";
              }
          ?>

        </tbody>
      </table>
      <h4 class='section-heading text-uppercase' id="subtitulo">Histórico</h4>
      <table id="aprovadas" name = "aprovadas">
        <thead> <!--cabeçalho da tabela-->
          <tr>
            <th>Data Inicial</th>
            <th>Data Final</th>
            <th>Tipo de Quarto</th>
            <th>Quarto</th>
            <th>Valor Diária</th>
            <th>Valor Total</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
              $historico = $banco->ReservasConcluidas($cliente);

              foreach($historico as $a){
                $inicio = $a['inicio'];
                  $ano = substr($inicio,0,4);
                  $mes = substr(substr($inicio,5,7),0,2); //2 substr pois está repetindo o dia
                  $dia = substr($inicio,8,10);
                $saida = $a['saida'];
                  $ano = substr($saida,0,4);
                  $mes = substr(substr($saida,5,7),0,2); //2 substr pois está repetindo o dia
                  $dia = substr($saida,8,10);
                switch($a['classe']){
                  case 'a':
                    $classe = 'Premium';
                    break;
                  case 'b':
                    $classe = 'Suite';
                    break;
                  case 'c':
                    $classe = 'Economica';
                    break;
                }
      
                echo "<td><input id = 'campos' disabled='disabled' readonly='readonly' type='date' value = '".$inicio."'></input></td>";
                echo "<td><input id = 'campos' disabled='disabled' readonly='readonly' type='date' value = '".$saida."'></input></td>";
                echo "<td><input id = 'campos' disabled='disabled' readonly='readonly' type='text' value = '".$classe."'></input></td>";
                echo "<td><input id = 'campos' disabled='disabled' readonly='readonly' type='text' value = '".$a['num_quarto']."'></input></td>";
                echo "<td><input id = 'campos' disabled='disabled' readonly='readonly' type='text' value = 'R$ ".$a['valor'].",00'></input></td>";
                echo "<td><input id = 'campos' disabled='disabled' readonly='readonly' type='text' value = 'R$ ".(($a['dias']*$a['valor'])+$a['total']).",00'></input></td>";
                echo "<td><input id = 'campos' disabled='disabled' readonly='readonly' type='text' value = '".$a['status_reserva']."'></input></td>";
                echo "</tr>";
              }
              
            ?>
        </tbody>
      </table>
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

      <!-- js -->
      <script src="../js/validacoes_clientes.js"></script>
</body>

</html>