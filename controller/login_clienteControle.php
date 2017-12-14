<?php
	require_once '../model/Banco.php';
	require_once '../model/Cliente.php';

	session_start();

	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$banco = new Banco();

	$cliente = $banco->loginCliente($email,$senha);
	
	if($cliente != 0){
		$_SESSION['cliente'] = $cliente->getNome();
		header('location:../view/telas/area_cliente.php');
	}	
	else{
		unset($_SESSION['cliente']);
		header('location:../view/telas/login.php');
	}

	
	
	
?>