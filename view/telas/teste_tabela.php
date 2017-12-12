<!DOCTYPE html>
<!-- <?php
    /*require("../../model/Banco.php");
    //iniciar a pesquisa no banco de Dados para povoar a tabela
    //criar a conexão com o banco de dados
    $link = new mysqli('localhost', 'root', '', 'hotel');

    if (!$link) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }
    //Selecionar todos os registros da tabela
    $query = "SELECT * FROM reserva" or die("Error in the consult.." . mysqli_error($link));
    $result = $link->query($query);
    $cont=0;*/
    ?> -->
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
          <div class='row'>
            <div class='col-lg-12 text-center'>
              <h3 class='section-heading text-uppercase' id='titulo'>Histórico de Reservas</h3>
              <h3 class='section-subheading text-muted'>Abaixo você pode visualizar suas últimas 10 reservas realizadas. Obs: Apenas reservas ainda não aprovadas poderão ser canceladas via área do cliente, após a aprovação para realizar cancelamentos somente entrando em contato conosco.</h3>
            </div>
          </div>
     </section>
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
     				<td><input id = "campos" disabled="disabled" readonly="readonly" type="text"></input></td>
     				<td><input id = "campos" disabled="disabled" readonly="readonly" type="text"></input></td>
     				<td><input id = "campos" disabled="disabled" readonly="readonly" type="text"></input></td>
     				<td><input id = "campos" disabled="disabled" readonly="readonly" type="text"></input></td>
     				<td><input id = "campos" disabled="disabled" readonly="readonly" type="text"></input></td>
     				<td><button class="btn btn-primary" id="button_cancelar">Cancelar</button></td>
     			</tr>
     		</tbody>
     	</table>
     	<h4 class='section-heading text-uppercase' id="subtitulo">Aprovadas</h4>
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
     				<td><input id = "campos" disabled="disabled" readonly="readonly" type="text"></input></td>
     				<td><input id = "campos" disabled="disabled" readonly="readonly" type="text"></input></td>
     				<td><input id = "campos" disabled="disabled" readonly="readonly" type="text"></input></td>
     				<td><input id = "campos" disabled="disabled" readonly="readonly" type="text"></input></td>
     				<td><input id = "campos" disabled="disabled" readonly="readonly" type="text"></input></td>
     				<td><input id = "campos" disabled="disabled" readonly="readonly" type="text"></input></td>
     				<td><input id = "campos" disabled="disabled" readonly="readonly" type="text"></input></td>
     			</tr>
     		</tbody>
     	</table>
     </div>


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
  </body>

</html>
