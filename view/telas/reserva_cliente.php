    <?php
        //deslogar do sistema - sessions e cookies
        if(isset($_GET['botao_sair'])){
          if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
              session_name(), '', time() - 42000,
              $params["path"], $params["domain"],
              $params["secure"], $params["httponly"]
            );
            header('Location: login.php');
          }
        }
    ?>
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
    <link href="../css/agnes.css" rel="stylesheet">
  </head>

  <body id="reservas">
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

  <!-- reserva -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase" id="titulo">Reservas</h2>
          <h3 class="section-subheading text-muted">Preencha o formulário abaixo para solicitar sua reserva de quarto.</h3>
        </div>
      </div>
         <form id="reservaForm" name="sentMessage" novalidate action='../../controller/reserva.php' method='post'>
            <div class="container-fluid">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <b>Data da entrada:</b><input class="form-control" id="entrada_cliente" type="date" required data-validation-required-message="Por favor insira uma data de entrada." />
                  </div>
                  <div class="col-md-6">
                    <b>Data da saída:</b><input class="form-control" id="saida_cliente" type="date" required data-validation-required-message="Por favor insira uma data de saída."/>
                  </div>
               </div>
                <span style="font-size: 12px;">Obs: Atente para o horário de fechamento de cada diária que é ás 10:00 horas da manhã e a entrada é as 12:00 horas da tarde. </span>
                <br>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <b>Tipo de Quarto:</b>
                    <select name="tipo_quarto" id='tipo_quarto' onclick="reservaQuarto();">
                      <option value="economico">Econômico</option>
                      <option value="suite">Suíte</option>
                      <option value="premium">Premium</option>
                    </select>
                  </div>
                </div>
                  <br />
                  <br />
                <div class="row">
                  <div class="col-md-6">
                    <b>Valor da Diária: </b>
                    <input class='form-control' id='valor_diaria' type='text' readonly />
                    
                  </div>
                  <div class="col-md-6">
                    <b>Total a Pagar:</b>  <input class="form-control" id="valor_total" type="text" readonly/><br />
                    <!-- readonly: impede de editar o campo - fica somente para leitura-->
                  </div>
                </div>
            </div>
            </div>
          </form>
          <div class="row">
              <div class="col-lg-12 text-center" style="margin-bottom: 10%; margin-right: 3%;"><span>Ao confirmar sua solicitação de reserva ela será encaminhada para análise de disponibilidade de quarto, e poderá verificar seu status na área do cliente.</span><br></div>  
              <div class="col-lg-12 text-center">
                <button id="Button_Reserva" class="btn btn-primary btn-xl text-uppercase" type="submit">Reservar</button>
                <a id="Button_voltar" class="btn btn-primary btn-xl text-uppercase" href = "area_cliente.php">Voltar</a>
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
    <script src="../js/validacoes_clientes.js"></script>

</body>

</html>