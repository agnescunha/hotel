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
  }else{
    header("Location: login_restrito.php");
  }
  $controle = new ClienteControle();
  if (isset($_POST['salvar'])) {
    $nome=$_POST['nome'];
    $email = $_POST['email'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $aniversario = $_POST['aniversario'];
    $telefone1 = $_POST['telefone1'];
    $telefone2 = $_POST['telefone2'];
    $senha = $_POST['senha'];
    $sexo = $_POST['gender'];
    if (empty($nome) || empty($email) || empty($rg) || empty($cpf) || empty($endereco) || empty($aniversario) || empty($telefone1) || empty($senha)|| empty($sexo)){
           echo "<script type=\"text/javascript\">alert(\"Campo obrigatorio em branco!\") </script>";
    }else{
      if (($controle->verificarEmail() > 0) || ($controle->verificarRG($rg) > 0) || ($controle->verificarCPF($cpf) > 0)) {
          if ($controle->verificarEmail($email) > 0) {
              echo "<script type=\"text/javascript\">alert(\"Email já cadastrado!\") </script>";
          }
          if ($controle->verificarRG($rg) > 0) {
              echo "<script type=\"text/javascript\">alert(\"Rg já cadastrado!\") </script>";
          }
          if ($controle->verificarCPF($cpf) > 0) {
            echo "<script type=\"text/javascript\">alert(\"Cpf já cadastrado!\") </script>";
          }
    }else{
         $cliente = new Cliente();
         $cliente->setar($nome,$rg,$cpf,$endereco,$aniversario,$telefone1,$telefone2,$email,$senha,$sexo);
          $controle->insert($cliente);
          header("Location: index_restrito.php");
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
  
  <h3 class="page-header">Cadastrar Cliente</h3>
  
  <form action="add_cliente.php" method="post">
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
	  <div class="form-group col-md-3">
  	  	<label for="exampleInputEmail1">Data de Nascimento*</label>
  	  	<input type="date" class="form-control" name="aniversario" placeholder="Digite o valor">
  	  </div>
     <div class="form-group col-md-3">
        <label for="exampleInputEmail1">Sexo*</label><br>
        Feminino<input type="radio" name="gender" value="F">&nbsp;
        Maculino<input type="radio" name="gender" value="M">&nbsp;
        Outro<input type="radio" name="gender" value="O">
      </div>
</div>


<div class="row">
	  <div class="form-group col-md-3">
  	  	<label for="exampleInputEmail1">Celular*</label>
  	  	<input type="tel" class="form-control" name="telefone1" placeholder="Digite o valor">
  	  </div>
	  <div class="form-group col-md-3">
  	  	<label for="exampleInputEmail1">Telefone</label>
  	  	<input type="tel" class="form-control" name="telefone2" placeholder="Digite o valor">
  	  </div>
	</div>

	<div class="row">
  	  <div class="form-group col-md-6">
  	  	<label for="exampleInputEmail1">Email*</label>
  	  	<input type="email" class="form-control" name="email" placeholder="Digite o valor">
  	  </div>
	  <div class="form-group col-md-3">
  	  	<label for="exampleInputEmail1">Senha*</label>
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