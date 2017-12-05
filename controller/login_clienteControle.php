<?php
	require_once '../model/Banco.php';
	require_once '../model/Cliente.php';
	$banco = new Banco();
	$banco->abrirConexao();
	$conn = $banco->getConexao();
	if (isset($_POST['entrar'])) {
		if(!empty($email) || !empty($senha)){
			echo "<script type=\"text/javascript\">alert(\"ERRO: Campo em branco!\") </script>";
		}else{
			$email = $_POST['email'];
			$senha = $_POST['senha'];
			$sql = "select*from cliente where login = '$email' && senha = '$senha'";
			if ($exe = mysqli_query($conn,$sql)) {
				$result = mysqli_fetch_array($exe,MYSQLI_ASSOC);
				if((strcmp($email,$result['email']) == 0) && (strcmp($senha,$result['senha'])==0)){
					$cliente = new Cliente($result['nome'],$result['rg'],$result['cpf'],$result['endereco'],$result['data_nascimento'],$result['telefone1'],$result['telefone2'],$result['email'],$result['senha']);
					$cliente->setId($result['id']);
					session_start();
					$_SESSION['logado'] = TRUE;
					$_SESSION['cliente'] = $cliente;
					header("Location: ../view/telas/area_cliente.php");
				}else{
				echo "<script type=\"text/javascript\">alert(\"ERRO: Nome de usuario ou senha incorreto!\") </script>";
				header("Location: ../view/telas/login.php");
			}
		}
	}
}
?>