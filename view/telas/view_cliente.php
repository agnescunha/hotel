﻿<?php
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


 <div id="main" class="container-fluid" style="margin-top: 50px">
  <h3 class="page-header">Visualizar Cliente</h3>
  
  <div class="row">
    <div class="col-md-4">
      <p><strong>Campo Um</strong></p>
  	  <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
    </div>
	
	<div class="col-md-4">
      <p><strong>Campo Dois</strong></p>
  	  <p>Lorem ipsum dolor</p>
    </div>
	
	<div class="col-md-4">
      <p><strong>Campo Três</strong></p>
  	  <p>123.456.789-0</p>
    </div>

    <div class="col-md-4">
      <p><strong>Campo Quatro</strong></p>
  	  <p>In vel sollicitudin leo, id fermentum augue.</p>
    </div>
	
	<div class="col-md-4">
      <p><strong>Campo Cinco</strong></p>
  	  <p>(00) 234-5678</p>
    </div>
	
	<div class="col-md-4">
      <p><strong>Campo Seis</strong></p>
  	  <p>Nullam ultrices elit ante.</p>
    </div>
	
    <div class="col-md-4">
      <p><strong>Campo Sete</strong></p>
  	  <p>Integer finibus in ligula vitae aliquet.</p>
    </div>
	
	<div class="col-md-4">
      <p><strong>Campo Oito</strong></p>
  	  <p>Jes</p>
    </div>
	
	<div class="col-md-4">
      <p><strong>Campo Nove</strong></p>
  	  <p>Lundo, Merkredo, Vendredo</p>
    </div>
 
    <div class="col-md-8">
      <p><strong>Campo Dez</strong></p>
  	  <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
	  In bibendum nunc urna, at vestibulum neque pellentesque eget. 
	  Maecenas lacinia velit ante, vitae fermentum ex interdum et. 
	  In vel sollicitudin leo, id fermentum augue. </p>
    </div>
 </div>
 
 <hr />
 <div id="actions" class="row">
   <div class="col-md-12">
     <a href="index_restrito.php" class="btn btn-primary">Fechar</a>
	 <a href="edit_cliente.php" class="btn btn-default">Editar</a>
	 <a href="#" class="btn btn-default" data-toggle="modal" data-target="#delete-modal">Excluir</a>
   </div>
 </div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>