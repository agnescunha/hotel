<?php
  require_once '../../model/funcionario.php';
   require_once '../../controller/ClienteControle.php';
  session_start();
  if($_SESSION['logado'] == TRUE){
    if ($_SESSION['funcionario']->getEhAdmin() == 1) {
      include 'menu_admin.html';
    }else{
      include 'menu_func.html';
    }
  }
  $controle = new ClienteControle();
  if (isset($_POST['salvar'])) {
    $cliente = new Cliente($_POST['nome'],$_POST['rg'],$_POST['cpf'],$_POST['endereco'],$_POST['aniversario'],$_POST['telefone1'],
          $_POST['telefone2'],$_POST['email'],$_POST['senha']);
    $controle->insert($cliente);
     header("Location: index_restrito.php");
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
  
  <h3 class="page-header">Cadastrar Cliente</h3>
  
  <form action="add_cliente.php" method="post">
  	<div class="row">
  	  <div class="form-group col-md-6">
  	  	<label for="exampleInputEmail1">Nome</label>
  	  	<input type="text" class="form-control" name="nome" placeholder="Digite o valor">
  	  </div>
	  <div class="form-group col-md-4">
  	  	<label for="exampleInputEmail1">RG</label>
  	  	<input type="text" class="form-control" name="rg" placeholder="Digite o valor">
  	  </div>
	</div>

    <div class="row">
      <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Edereço</label>
        <input type="text" class="form-control" name="endereco" placeholder="Digite o valor">
      </div>
        <div class="form-group col-md-4">
        <label for="exampleInputEmail1">CPF</label>
        <input type="text" class="form-control" name="cpf" placeholder="Digite o valor">
      </div>
    </div>
	
	<div class="row">
	  <div class="form-group col-md-3">
  	  	<label for="exampleInputEmail1">Data de Nascimento</label>
  	  	<input type="date" class="form-control" name="aniversario" placeholder="Digite o valor">
  	  </div>
	  <div class="form-group col-md-3">
  	  	<label for="exampleInputEmail1">Celular</label>
  	  	<input type="text" class="form-control" name="telefone1" placeholder="Digite o valor">
  	  </div>
	  <div class="form-group col-md-3">
  	  	<label for="exampleInputEmail1">Telefone</label>
  	  	<input type="text" class="form-control" name="telefone2" placeholder="Digite o valor">
  	  </div>
	</div>
	
	<div class="row">
  	  <div class="form-group col-md-6">
  	  	<label for="exampleInputEmail1">Email</label>
  	  	<input type="email" class="form-control" name="email" placeholder="Digite o valor">
  	  </div>
	  <div class="form-group col-md-3">
  	  	<label for="exampleInputEmail1">Senha</label>
  	  	<input type="password" class="form-control" name="senha" placeholder="Digite o valor">
  	  </div>
	</div>
	
	
	<div class="row">
	  <div class="col-md-12">
	  	<button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
		<a href="index_restrito.php" class="btn btn-default">Cancelar</a>
	  </div>
	</div>

  </form>
 </div>
 

 <script src="../vendor/jquery/jquery.min.js"></script>
 <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>