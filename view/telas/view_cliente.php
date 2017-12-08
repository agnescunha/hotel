<?php
  require_once '../../model/funcionario.php';
  require_once '../../model/Cliente.php';
  require_once '../../controller/ClienteControle.php';
  session_start();
  if($_SESSION['logado'] == TRUE){
    if ($_SESSION['funcionario']->getEhAdmin() == 1) {
      include 'menu_admin.html';
    }else{
      include 'menu_func.html';
    }
  }
  $id = $_GET["id"];
  $controle = new ClienteControle();
  $cliente = $controle->selectFromId($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Administrador</title>

 <link href="../vendor/bootstrap/css2/bootstrap.min.css" rel="stylesheet">
 <link href="../vendor/bootstrap/css2/style.css" rel="stylesheet">
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLabel">Excluir Cliente</h4>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este cliente?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Sim</button>
	<button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
      </div>
    </div>
  </div>
</div>


 <div id="main" class="container-fluid" style="margin-top: 50px">
  <h3 class="page-header">Visualizar Cliente</h3>

<?php
 echo" <div class=\"row\">
    <div class=\"col-md-4\">
      <p><strong>Id</strong></p>
  	  <p>". $cliente->getId() ."</p>
    </div>".
	"<div class=\"col-md-4\">
      <p><strong>Nome</strong></p>
  	  <p>". $cliente->getNome() ."</p>
    </div>".
	"<div class=\"col-md-4\">
      <p><strong>CPF</strong></p>
  	  <p>". $cliente->getCpf() ."</p>
    </div>".
  "<div class=\"col-md-4\">
      <p><strong>RG</strong></p>
  	  <p>". $cliente->getRg() ."</p>
    </div>".
	 "<div class=\"col-md-4\">
      <p><strong>Celeular</strong></p>
  	  <p>". $cliente->getTelefone1() ."</p>
    </div>".
	"<div class=\"col-md-4\">
      <p><strong>Telefone</strong></p>
  	  <p>". $cliente->getTelefone2() ."</p>
  </div>".
  "<div class=\"col-md-4\">
      <p><strong>Data Nascimento</strong></p>
      <p>". $cliente->getAniversario() ."</p>
  </div>".
	"<div class=\"col-md-4\">
      <p><strong>Email</strong></p>
  	  <p>". $cliente->getEmail() ."</p>
    </div>".
	"<div class=\"col-md-4\">
      <p><strong>Senha</strong></p>
  	  <p>". $cliente->getSenha() ."</p>
    </div>".
  "<div class=\"col-md-8\">
      <p><strong>Endereço</strong></p>
      <p>". $cliente->getEndereco() ."</p>
    </div>
  </div>";
?>

 <hr />
 <div id="actions" class="row">
   <div class="col-md-12">
     <a href="index_restrito.php" class="btn btn-primary">Fechar</a>
	 <a href="edit_cliente.php" class="btn btn-default">Editar</a>
	 <a href="#" class="btn btn-default" data-toggle="modal" data-target="#delete-modal">Excluir</a>
   </div>
 </div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>