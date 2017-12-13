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
      $id = $_GET["id"];
      $controle = new funcionarioControle();
      $funcionario = $controle->selectFromId($id);
      $nome = $funcionario->getNome();
      $cpf = $funcionario->getCpf();
      $rg = $funcionario->getRg();
      $celular = $funcionario->getCelular();
      $admissao = $funcionario->getAdmissao();
      $demissao = $funcionario->getDemissao();
      $login = $funcionario->getLogin();
      $senha = $funcionario->getSenha();
      $endereco = $funcionario->getEndereco();
      $eh_admin = $funcionario->getEhAdmin();
      $salario =  $funcionario->getSalario();
      $funcao = $funcionario->getFuncao();
  
echo "
<!DOCTYPE html>
<html lang=\"pt-br\">
<head>
 <meta charset=\"utf-8\">
 <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
 <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
 <title>Administrado</title>

 <link href=\"../vendor/bootstrap/css2/bootstrap.min.css\" rel=\"stylesheet\">
 <link href=\"../vendor/bootstrap/css2/style.css\" rel=\"stylesheet\">
</head>
<body>

 
 <div id=\"main\" class=\"container-fluid\" style=\"margin-top: 50px\">
  
  <h3 class=\"page-header\">Editar Funcionario</h3>
    <form action=\"view_funcionario.php?id=$id\" method=\"post\">
    <div class=\"row\">
    <div class=\"form-group col-md-1\">
        <label for=\"exampleInputEmail1\">Id</label>
        <input type=\"text\" class=\"form-control\" name=\"id\" placeholder=\"Digite o valor\" value=\"$id\" disabled>
      </div>
   <div class=\"form-group col-md-6\">
        <label for=\"exampleInputEmail1\">Nome</label>
        <input type=\"text\" class=\"form-control\" name=\"nome\" placeholder=\"Digite o valor\" value=\"$nome\">
      </div>
    <div class=\"form-group col-md-4\">
        <label for=\"exampleInputEmail1\">RG</label>
        <input type=\"text\" class=\"form-control\" name=\"rg\" placeholder=\"Digite o valor\" value=\"$rg\">
      </div>
  </div>

    <div class=\"row\">
      <div class=\"form-group col-md-6\">
        <label for=\"exampleInputEmail1\">Edereço</label>
       <input type=\"text\" class=\"form-control\" name=\"endereco\" placeholder=\"Digite o valor\" value=\"$endereco\">
      </div>
        <div class=\"form-group col-md-4\">
        <label for=\"exampleInputEmail1\">CPF</label>
        <input type=\"text\" class=\"form-control\" name=\"cpf\" placeholder=\"Digite o valor\" value=\"$cpf\">
      </div>
    </div>
  
<div class=\"row\">
      <div class=\"form-group col-md-6\">
        <label for=\"exampleInputEmail1\">Função</label>
        <input type=\"text\" class=\"form-control\" name=\"funcao\" placeholder=\"Digite o valor\" value=\"$funcao\">
      </div>
        <div class=\"form-group col-md-3\">
        <label for=\"exampleInputEmail1\">Salario</label>
        <input type=\"tel\" class=\"form-control\" name=\"salario\" placeholder=\"Digite o valor\" value=\"$salario\">
      </div>
    </div>
  
  <div class=\"row\">
    <div class=\"form-group col-md-3\">
        <label for=\"exampleInputEmail1\">Admissão</label>
        <input type=\"date\" class=\"form-control\" name=\"admissao\" placeholder=\"Digite o valor\" value=\"$admissao\">
      </div>
      <div class=\"form-group col-md-3\">
        <label for=\"exampleInputEmail1\">Demissão</label>
        <input type=\"date\" class=\"form-control\" name=\"demissao\" placeholder=\"Digite o valor\" value=\"$demissao\">
      </div>
       <div class=\"form-group col-md-3\">
        <label for=\"exampleInputEmail1\">Celular</label>
        <input type=\"tel\" class=\"form-control\" name=\"celular\" placeholder=\"Digite o valor\" value=\"$celular\">
      </div>
</div>

  <div class=\"row\">
      <div class=\"form-group col-md-3\">
        <label for=\"exampleInputEmail1\">Login</label>
        <input type=\"text\" class=\"form-control\" name=\"login\" placeholder=\"Digite o valor\" value=\"$login\">
      </div>
    <div class=\"form-group col-md-3\">
        <label for=\"exampleInputEmail1\">Senha</label>
        <input type=\"password\" class=\"form-control\" name=\"senha\" placeholder=\"Digite o valor\" value=\"$senha\">
      </div>
      <div class=\"form-group col-md-3\">
        <label for=\"exampleInputEmail1\">Permissão</label><br>";

if($eh_admin == 1){
  echo"Administrador&nbsp;<input type=\"radio\" name=\"permissao\" value=0 checked>&nbsp;&nbsp;
        Funcionario&nbsp;<input type=\"radio\" name=\"permissao\" value=1>";
}else if($eh_admin == 0){
  echo"Administrador&nbsp;<input type=\"radio\" name=\"permissao\" value=0>&nbsp;&nbsp;
        Funcionario&nbsp;<input type=\"radio\" name=\"permissao\" value=1 checked>";
}

echo " </div>
  </div>
	
	<hr />
	
<div class=\"row\">
	  <div class=\"col-md-12\">
	  	<input type=\"submit\" class=\"btn btn-primary\" name=\"update\" value=\"Atualizar\"></input>
		<a href=\"index_funcionario.php\" class=\"btn btn-default\">Cancelar</a>
	  </div>
	</div>

  </form>
 </div>
  <script src=\"../vendor/jquery/jquery.min.js\"></script>
 <script src=\"../vendor/bootstrap/js/bootstrap.min.js\"></script>
</body>
</html>";

?>