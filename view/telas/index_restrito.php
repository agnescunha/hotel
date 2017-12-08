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
 
 	<div id="top" class="row">
		<div class="col-sm-3">
			<h2>Clientes</h2>
		</div>
		<div class="col-sm-6">
			
			<div class="input-group h2">
				<input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Clientes">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
			
		</div>
		<div class="col-sm-3">
			<a href="add_cliente.php" class="btn btn-primary pull-right h2">Cadastrar</a>
		</div>
	</div> <!-- /#top -->
 
 
 	<hr />
 	<div id="list" class="row">
	
	<div class="table-responsive col-md-12">
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>CPF</th>
					<th>Telefone</th>
					<th>Email</th>
					<th class="actions">Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$controle = new ClienteControle();
				$resul = $controle->selectAll();

				foreach ($resul as $cliente) {
					$id = $cliente->getId();
	 				echo "<tr>
						<td>" . $cliente->getId() . "</td>".
						"<td>". $cliente->getNome() ."</td>".
						"<td>". $cliente->getCpf() ."</td>".
						"<td>". $cliente->getTelefone1() ."</td>".
						"<td>". $cliente->getEmail() ."</td>".
						"<td class=\"actions\">
						<a class=\"btn btn-success btn-xs\" href=\"view_cliente.php?id=$id\" value=\"$id\">Visualizar</a>
						<a class=\"btn btn-warning btn-xs\" href=\"edit_cliente.php\" value=\"$id\">Editar</a>
						<a class=\"btn btn-danger btn-xs\"  href=\"#\" data-toggle=\"modal\" data-target=\"#delete-modal\" value=\"$id\">Excluir</a>
					</td>
				</tr>";
					
	 			} 
			?>		
					
			</tbody>
		</table>
	</div>
	
	</div> <!-- /#list -->
	
	<div id="bottom" class="row">
		<div class="col-md-12">
			<ul class="pagination">
				<li class="disabled"><a>&lt; Anterior</a></li>
				<li class="disabled"><a>1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
			</ul><!-- /.pagination -->
		</div>
	</div> <!-- /#bottom -->
 </div> <!-- /#main -->

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

 <script src="../vendor/jquery/jquery.min.js"></script>
 <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>