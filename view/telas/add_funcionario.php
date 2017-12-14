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
  if (isset($_POST['salvar'])) {
    $nome=$_POST['nome'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $salario = $_POST['salario'];
    $celular = $_POST['celular'];
    $funcao = $_POST['funcao'];
    $senha = $_POST['senha'];
    $login = $_POST['login'];
    $demissao =$_POST['demissao'];
    $admissao = $_POST['admissao'];
    $permissao = $_POST['permissao'];
    if (empty($nome) || empty($rg) || empty($cpf) || empty($endereco) || empty($funcao) || empty($celular) || empty($senha) || empty($login) || empty($admissao) || empty($salario)){
           echo "<script type=\"text/javascript\">alert(\"Campo obrigatorio em branco!\") </script>";
    }else{
      if (($controle->verificarLogin() > 0) || ($controle->verificarRG($rg) > 0) || ($controle->verificarCPF($cpf) > 0)) {
          if ($controle->verificarLogin($login) > 0) {
              echo "<script type=\"text/javascript\">alert(\"Login já cadastrado!\") </script>";
          }
          if ($controle->verificarRG($rg) > 0) {
              echo "<script type=\"text/javascript\">alert(\"Rg já cadastrado!\") </script>";
          }
          if ($controle->verificarCPF($cpf) > 0) {
            echo "<script type=\"text/javascript\">alert(\"Cpf já cadastrado!\") </script>";
          }
    }else{
         $funcionario = new Funcionario($nome,$funcao,$cpf,$rg,$celular,$salario,$admissao,$demissao,$endereco,$login,$senha,$permissao);
          $controle->insert($funcionario);
          header("Location: index_funcionario.php");

    }
  }
}
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
 
 <div id="main" class="container-fluid" style="margin-top: 50px">
  
  <h3 class="page-header">Cadastrar Funcionário</h3>
  
  <form action="add_funcionario.php" method="post">
  	<div class="row">
  	  <div class="form-group col-md-6">
  	  	<label for="exampleInputEmail1">Nome*</label>
  	  	<input type="text" class="form-control" name="nome" placeholder="Digite o valor">
  	  </div>
	  <div class="form-group col-md-4">
  	  	<label for="exampleInputEmail1">RG*</label>
  	  	<input type="text" class="form-control" name="rg" placeholder="Digite o valor">
  	  </div>
	</div>

    <div class="row">
      <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Edereço*</label>
        <input type="text" class="form-control" name="endereco" placeholder="Digite o valor">
      </div>
        <div class="form-group col-md-4">
        <label for="exampleInputEmail1">CPF*</label>
        <input type="text" class="form-control" name="cpf" placeholder="Digite o valor">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Função*</label>
        <input type="text" class="form-control" name="funcao" placeholder="Digite o valor">
      </div>
        <div class="form-group col-md-3">
        <label for="exampleInputEmail1">Salario*</label>
        <input type="tel" class="form-control" name="salario" placeholder="Digite o valor">
      </div>
    </div>
	
	<div class="row">
	  <div class="form-group col-md-3">
  	  	<label for="exampleInputEmail1">Admissão*</label>
  	  	<input type="date" class="form-control" name="admissao" placeholder="Digite o valor">
  	  </div>
      <div class="form-group col-md-3">
        <label for="exampleInputEmail1">Demissão</label>
        <input type="date" class="form-control" name="demissao" placeholder="Digite o valor">
      </div>
       <div class="form-group col-md-3">
        <label for="exampleInputEmail1">Celular*</label>
        <input type="tel" class="form-control" name="celular" placeholder="Digite o valor">
      </div>
</div>

	<div class="row">
  	  <div class="form-group col-md-3">
  	  	<label for="exampleInputEmail1">Login*</label>
  	  	<input type="text" class="form-control" name="login" placeholder="Digite o valor">
  	  </div>
	  <div class="form-group col-md-3">
  	  	<label for="exampleInputEmail1">Senha*</label>
  	  	<input type="password" class="form-control" name="senha" placeholder="Digite o valor">
  	  </div>
      <div class="form-group col-md-3">
        <label for="exampleInputEmail1">Permissão*</label><br>
        Administrador&nbsp;<input type="radio" name="permissao" value=0>&nbsp;&nbsp;
        Funcionario&nbsp;<input type="radio" name="permissao" value=1>
      </div>
	</div>
	
	
	<div class="row">
	  <div class="col-md-12">
	  	<button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
		<a href="index_funcionario.php" class="btn btn-default">Cancelar</a>
	  </div>
	</div>

  </form>
 </div>
 

 <script src="../vendor/jquery/jquery.min.js"></script>
 <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>