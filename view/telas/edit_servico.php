<?php
require_once '../../model/Servico.php';
require_once '../../controller/ServicoControle.php';
session_start();
if($_SESSION['logado'] == TRUE){
    if ($_SESSION['servico']->getEhAdmin() == 1) {
        include 'menu_admin.html';
    }else{
        include 'menu_func.html';
    }
}else{
    header("Location: login_restrito.php");
}
$id = $_GET["id"];
$controle = new ServicoControle();
$servico = $controle->selectFromId($id);
$descricao = $servico->getDescricao();
$valor = $servico->getValor();
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
  
  <h3 class=\"page-header\">Editar Servico</h3>
    <form action=\"view_servico.php?id=$id\" method=\"post\">
    <div class=\"row\">
    <div class=\"form-group col-md-1\">
        <label for=\"exampleInputEmail1\">Id</label>
        <input type=\"text\" class=\"form-control\" name=\"id\" placeholder=\"Digite o valor\" value=\"$id\" disabled>
      </div>
   <div class=\"form-group col-md-6\">
        <label for=\"exampleInputEmail1\">Descricao</label>
        <input type=\"text\" class=\"form-control\" name=\"nome\" placeholder=\"Digite o valor\" value=\"$descricao\">
      </div>
    <div class=\"form-group col-md-4\">
        <label for=\"exampleInputEmail1\">Valor</label>
        <input type=\"text\" class=\"form-control\" name=\"rg\" placeholder=\"Digite o valor\" value=\"$valor\">
      </div>
  </div>
	<hr />
	
	<div class=\"row\">
	  <div class=\"col-md-12\">
	  	<input type=\"submit\" class=\"btn btn-primary\" name=\"update\" value=\"Atualizar\"></input>
		<a href=\"index_restrito.php\" class=\"btn btn-default\">Cancelar</a>
	  </div>
	</div>

  </form>
 </div>
  <script src=\"../vendor/jquery/jquery.min.js\"></script>
 <script src=\"../vendor/bootstrap/js/bootstrap.min.js\"></script>
</body>
</html>";

?>