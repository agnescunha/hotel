<?php
	require_once '../model/Banco.php';
	require_once '../model/Cliente.php';

	/* caso seja necessario forçar o fim da sessao nos testes */
	/*
	session_start();
	session_destroy();
	*/
	
	session_start();
	
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$banco = new Banco();

	$cliente = $banco->loginCliente($email,$senha);
	

	if($cliente != '0'){
		$_SESSION['cliente'] = $cliente;
		header('location:../view/telas/area_cliente.php');
	}	
	else{
		unset($_SESSION['cliente']);
		header('location:../view/telas/login.php');
	}

?>