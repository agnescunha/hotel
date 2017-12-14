<?php
  require_once '../../model/funcionario.php';
  require_once '../../controller/FuncionarioControle.php';
  session_start();
  if($_SESSION['logado'] == TRUE){
    if ($_SESSION['funcionario']->getEhAdmin() == 1) {
      include 'menu_admin.html';
    }else{
      include 'menu_func.html';
    }
  }else{
    header("Location: login_restrito.php");
  }
    $controle = new FuncionarioControle();
     $id = $_GET["id"];
  if (isset($_POST['update'])) {
          $funcionario = new Funcionario($_POST['nome'],$_POST['funcao'],$_POST['cpf'],$_POST['rg'],$_POST['celular'],$_POST['salario'],$_POST['admissao'],$_POST['demissao'],$_POST['endereco'],$_POST['login'],$_POST['senha'],$_POST['permissao']);
       $funcionario->setId($id);
       $controle->update($funcionario);
  }
  $funcionario = $controle->selectFromId($id);
?>
<!DOCTYPE html>
<html lang="pt-br"> 
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <link href="../vendor/bootstrap/css2/bootstrap.min.css" rel="stylesheet">
 <link href="../vendor/bootstrap/css2/style.css" rel="stylesheet">
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div>


 <div id="main" class="container-fluid" style="margin-top: 50px">
  <h3 class="page-header">Visualizar Funcionario</h3>

<?php
 echo" <div class=\"row\">
    <div class=\"col-md-4\">
      <p><strong>Id</strong></p>
  	  <p>". $funcionario->getId() ."</p>
    </div>".
	"<div class=\"col-md-8\">
      <p><strong>Nome</strong></p>
  	  <p>". $funcionario->getNome() ."</p>
    </div>".
	"<div class=\"col-md-4\">
      <p><strong>CPF</strong></p>
  	  <p>". $funcionario->getCpf() ."</p>
    </div>".
  "<div class=\"col-md-4\">
      <p><strong>RG</strong></p>
  	  <p>". $funcionario->getRg() ."</p>
    </div>".
	 "<div class=\"col-md-4\">
      <p><strong>Celeular</strong></p>
  	  <p>". $funcionario->getCelular() ."</p>
    </div>".
	"<div class=\"col-md-4\">
      <p><strong>Funcao</strong></p>
  	  <p>". $funcionario->getFuncao() ."</p>
  </div>".
  "<div class=\"col-md-4\">
      <p><strong>Salario</strong></p>
      <p>". $funcionario->getSalario() ."</p>
  </div>".
  "<div class=\"col-md-4\">
      <p><strong>Admissão</strong></p>
      <p>". $funcionario->getAdmissao() ."</p>
  </div>".
  "<div class=\"col-md-4\">
      <p><strong>Demissão</strong></p>
      <p>". $funcionario->getDemissao() ."</p>
  </div>".
  "<div class=\"col-md-4\">
      <p><strong>Endereço</strong></p>
      <p>". $funcionario->getEndereco() ."</p>
    </div>
  </div>".
	"<div class=\"col-md-4\">
      <p><strong>Login</strong></p>
  	  <p>". $funcionario->getLogin() ."</p>
    </div>".
	"<div class=\"col-md-4\">
      <p><strong>Senha</strong></p>
  	  <p>". $funcionario->getSenha() ."</p>
    </div>".
     "<div class=\"col-md-4\">
      <p><strong>Permissao</strong></p>";
if ($funcionario->getEhAdmin() == 1) {
  echo "<p>Administrador</p>";
}else if ($funcionario->getEhAdmin() == 1) {
  echo "<p>Funcionário</p>";
}

echo"  </div>
<hr />
 <div id=\"actions\" class=\"row\">
   <div class=\"col-md-12\">
     <a href=\"index_funcionario.php\" class=\"btn btn-primary\">Fechar</a>
	 <a href=\"edit_funcionario.php?id=$id\" class=\"btn btn-default\">Editar</a>
	 <a href=\"modal_funcionario.php?id=$id\" class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#delete-modal\" name='excluir'>Excluir</a>
   </div>
 </div>";
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>