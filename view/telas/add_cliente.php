<?php
  require_once '../../model/funcionario.php';
  session_start();
  if($_SESSION['logado'] == TRUE){
    if ($_SESSION['funcionario']->getEhAdmin() == 1) {
      include 'menu_admin.html';
    }else{
      include 'menu_func.html';
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
  
  <h3 class="page-header">Cadastrar Cliente</h3>
  
  <form action="index.html">
  	<div class="row">
  	  <div class="form-group col-md-6">
  	  	<label for="exampleInputEmail1">Nome</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
  	  </div>
	  <div class="form-group col-md-4">
  	  	<label for="exampleInputEmail1">RG</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
  	  </div>
	</div>

    <div class="row">
      <div class="form-group col-md-6">
        <label for="exampleInputEmail1">Edereço</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
      </div>
        <div class="form-group col-md-4">
        <label for="exampleInputEmail1">CPF</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
      </div>
    </div>
	
	<div class="row">
	  <div class="form-group col-md-3">
  	  	<label for="exampleInputEmail1">Data de Nascimento</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
  	  </div>
	  <div class="form-group col-md-3">
  	  	<label for="exampleInputEmail1">Celular</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
  	  </div>
	  <div class="form-group col-md-3">
  	  	<label for="exampleInputEmail1">Telefone</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
  	  </div>
	</div>
	
	<div class="row">
  	  <div class="form-group col-md-6">
  	  	<label for="exampleInputEmail1">Email</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
  	  </div>
	  <div class="form-group col-md-3">
  	  	<label for="exampleInputEmail1">Senha</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
  	  </div>
	</div>
	
	
	<div class="row">
	  <div class="col-md-12">
	  	<button type="submit" class="btn btn-primary">Salvar</button>
		<a href="index_restrito.php" class="btn btn-default">Cancelar</a>
	  </div>
	</div>

  </form>
 </div>
 

 <script src="../vendor/jquery/jquery.min.js"></script>
 <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>