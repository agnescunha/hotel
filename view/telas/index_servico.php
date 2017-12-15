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
function listar($ini,$fim,$total){
    for ($i=$ini ; $i<$fim;$i++) {
        $id = $total[$i]->getId();
        echo "<tr>
				<td>" . $total[$i]->getId() . "</td>".
                "<td>". $total[$i]->getDescricao() ."</td>".
                "<td>". $total[$i]->getValor() ."</td>".
                     "<td class=\"actions\">
						<a class=\"btn btn-success btn-xs\" href=\"view_servico.php?id=$id\" value=\"$id\">Visualizar</a>
						<a class=\"btn btn-warning btn-xs\" href=\"edit_servico.php?id=$id\" value=\"$id\">Editar</a>
						<a href=\"modal_servico.php?id=$id\" class=\"btn btn-danger btn-xs\" data-toggle=\"modal\" data-target=\"#delete-modal\" name='excluir'>Excluir</a>
					  </td>
					</tr>";
    }
}
$controle = new ServicoControle();
if(isset($_GET['clean'])){
    header("Location: index_servico.php");
}

echo "<!DOCTYPE html>
<html lang=\"pt-br\">
<head>
 <meta charset=\"utf-8\">
 <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
 <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

 <link href=\"../vendor/bootstrap/css2/bootstrap.min.css\" rel=\"stylesheet\">
 <link href=\"../vendor/bootstrap/css2/style.css\" rel=\"stylesheet\">
</head>
<body>

 <div id=\"main\" class=\"container-fluid\" style=\"margin-top: 50px\">
 
 	<div id=\"top\" class=\"row\">
		<div class=\"col-sm-3\">
			<h2>Serviço</h2>
		</div>
		<div class=\"col-sm-6\">
			<form action=\"index_servico.php\" method=\"post\">
			<div class=\"input-group h2\">
			
				<input name=\"nome_pesq\" class=\"form-control\" type=\"text\" placeholder=\"Pesquisar Servico\">
				<span class=\"input-group-btn\">
					<button class=\"btn btn-primary\" type=\"submit\" name=\"pesquisar\">
						<span class=\"glyphicon glyphicon-search\"></span>
					</button>
				</span>
			</div>
			</form>	
		</div>
		<div class=\"col-sm-3\">
			<a href=\"add_servico.php\" class=\"btn btn-primary pull-right h2\">Cadastrar</a>
		</div>
	</div> <!-- /#top -->";

if (isset($_POST['pesquisar'])) {
    $nome_pesq = $_POST['nome_pesq'];
    echo "<div class=\"row\">
		<div class=\"col-sm-3\">
			<p>Mostrando Resultados da pesquisa: $nome_pesq <p>
		</div>
		<div class=\"col-sm-3\">
			<a href=\"index_servico.php?clean\"><button type=\"button\" class=\"btn btn-danger btn-xs\" name=\"clean\">
  				<span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>
			</button></a>
			</div>
		</div>
			";
    $resul = $controle->selectFromName($nome_pesq);
}else{
    $resul = $controle->selectAll();
}

$max = 10;
$total = sizeof($resul);
$pag = ceil($total/$max);
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
$ini = ($max*$pagina)-$max;
$fim = $ini+$max;
if($fim > $total){
    $fim = $total;
}

echo"	<hr />
 	<div id=\"list\" class=\"row\">
	
	<div class=\"table-responsive col-md-12\">
		<table class=\"table table-striped\" cellspacing=\"0\" cellpadding=\"0\">
			<thead>
				<tr>
					<th>ID</th>
					<th>DESCRIÇAO</th>
					<th>VALOR</th>					
					<th class=\"actions\">Ações</th>
				</tr>
			<tbody>";

listar($ini,$fim,$resul);

echo "</tbody>
		</table>
	</div>
	</div> <!-- /#list -->
	<div id=\"bottom\" class=\"row\">
		<div class=\"col-md-12\">
			<ul class=\"pagination\">";

if ($pagina <=1) {
    echo "<li class=\"disabled\"><a>&lt; Anterior</a></li>";
}else{
    $aux = $pagina-1;
    echo "<li class=\"\"><a href='index_servico.php?pagina=$aux'>&lt; Anterior</a></li>";
}

for ($i=1; $i < $pag+1; $i++) {
    echo"	<li class=\"\"><a href='index_servico.php?pagina=$i' >$i</a></li>";
}

if ($pagina < $pag) {
    $aux = $pagina+1;
    echo "<li class=\"next\"><a href=\"index_servico.php?pagina=$aux\" rel=\"next\">Próximo &gt;</a></li>";
}else{
    echo "<li class=\"next disabled\"><a rel=\"next\">Próximo &gt;</a></li>";
}

echo"	</ul><!-- /.pagination -->
		</div>
	</div> <!-- /#bottom -->
 </div> <!-- /#main -->

<!-- Modal -->
<div class=\"modal fade\" id=\"delete-modal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"modalLabel\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      </div>
  </div>
  </div>
 <script src=\"../vendor/jquery/jquery.min.js\"></script>
 <script src=\"../vendor/bootstrap/js/bootstrap.min.js\"></script>
 <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js\"></script>
</body>
</html>";
?>