<?php
	require_once '../model/Banco.php';
	require_once '../model/funcionario.php';
	$banco = new Banco();
	$banco->abrirConexao();
	$conn = $banco->getConexao();
	if (isset($_POST['entrar'])) {
		if(!empty($usuario) || !empty($senha)){
			echo "<script type=\"text/javascript\">alert(\"ERRO: Campo em branco!\") </script>";
		}else{
			$usuario = $_POST['usuario'];
			$senha = $_POST['senha'];
			$sql = "select*from funcionario where login = '$usuario' && senha = '$senha'";
			if ($exe = mysqli_query($conn,$sql)) {
				$result = mysqli_fetch_array($exe,MYSQLI_ASSOC);
				if((strcmp($usuario,$result['login']) == 0) && (strcmp($senha,$result['senha'])==0)){
					$funcionario = new Funcionario($result['nome'],$result['funcao'],$result['cpf'],$result['rg'],$result['celular'],$result['salario'],$result['admissao'],$result['demissao'],$result['endereco'],$result['login'],$result['senha'],$result['eh_admin']);
					$funcionario->setId($result['id']);
					session_start();
					$_SESSION['logado'] = TRUE;
					$_SESSION['funcionario'] = $funcionario;
					header("Location: ../view/telas/index_restrito.php");
				}else{
				echo "<script type=\"text/javascript\">alert(\"ERRO: Nome de usuario ou senha incorreto!\") </script>";
				header("Location: ../view/telas/login_restrito.php");
			}
		}
	}
}
?>