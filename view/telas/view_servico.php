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
$controle = new ServicoControle();
$id = $_GET["id"];
if (isset($_POST['update'])) {
    $servico = new Servico($_POST['descricao'],$_POST['valor']);
    $servico->setId($id);
    $controle->update($servico);
}
$servico = $controle->selectFromId($id);
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
    <h3 class="page-header">Visualizar Servicos</h3>

    <?php
    echo" <div class=\"row\">
    <div class=\"col-md-4\">
      <p><strong>Id</strong></p>
  	  <p>". $servico->getId() ."</p>
    </div>".
        "<div class=\"col-md-8\">
      <p><strong>Descricao</strong></p>
  	  <p>". $servico->getDescricao() ."</p>
    </div>".
        "<div class=\"col-md-4\">
      <p><strong>Valor</strong></p>
  	  <p>". $servico->getValor() ."</p>
    </div>".

        "<div class=\"col-md-4\">
      <p><strong>Permissao</strong></p>";
    if ($servico->getEhAdmin() == 1) {
        echo "<p>Administrador</p>";
    }else if ($servico->getEhAdmin() == 1) {
        echo "<p>Servico</p>";
    }

    echo"  </div>
<hr />
 <div id=\"actions\" class=\"row\">
   <div class=\"col-md-12\">
     <a href=\"index_servico.php\" class=\"btn btn-primary\">Fechar</a>
	 <a href=\"edit_servico.php?id=$id\" class=\"btn btn-default\">Editar</a>
	 <a href=\"modal_sefvico.php?id=$id\" class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#delete-modal\" name='excluir'>Excluir</a>
   </div>
 </div>";
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>