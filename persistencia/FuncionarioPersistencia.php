<?php
	require_once '../../model/Banco.php';
	require_once '../../model/Funcionario.php';

	class FuncionarioPersistencia{
		private $banco;
	    private $conn;


		public function selectAll(){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$sql = "select*from funcionario";
			$result = mysqli_query($conn,$sql);
			$funcionarios=array();
			if (mysqli_num_rows($result) > 0) {
   				 while($linha = mysqli_fetch_assoc($result)) {
					$funcionario = new Funcionario($linha['nome'],$linha['funcao'],$linha['cpf'],$linha['rg'],$linha['celular'],$linha['salario'],$linha['admissao'],$linha['demissao'],$linha['endereco'],$linha['login'],$linha['senha'],$linha['eh_admin']);
				 $funcionario->setId($linha['id']);
				 array_push($funcionarios, $funcionario);
				}	
			}else{

			}
			return $funcionarios;
		}

		public function selectFromId($id){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$sql = "select*from funcionario where id = '$id'";
			$result = mysqli_query($conn,$sql);
			$funcionario= null;
			if (mysqli_num_rows($result) > 0) {
   				$linha = mysqli_fetch_assoc($result);
					$funcionario = new Funcionario($linha['nome'],$linha['funcao'],$linha['cpf'],$linha['rg'],$linha['celular'],$linha['salario'],$linha['admissao'],$linha['demissao'],$linha['endereco'],$linha['login'],$linha['senha'],$linha['eh_admin']);
				 $funcionario->setId($linha['id']);	
			}else{

			}
			return $funcionario;
		}

		public function update($funcionario){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$id = $funcionario->getId();
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
			$sql = "update funcionario set nome='$nome', rg='$rg', cpf='$cpf', endereco='$endereco', salario = '$salario',funcao='$funcao', celular='$celular',login='$login',senha='$senha',admissao='admissao',demissao='demissao',eh_admin = 'eh_admin' where id = '$id'";
			mysqli_query($conn, $sql);
		}

		public function insert($funcionario){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
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
			$sql = "insert into `funcionario`( `nome`, `funcao`, `cpf`, `rg`, `celular`, `salario`, `admissao`, `demissao`, `endereco`, `login`, `senha`, `eh_admin`) values ('$nome','$funcao', '$cpf', '$rg','$celular','$salario', '$admissao','$demissao', '$endereco','$login','$senha','$eh_admin')";
			mysqli_query($conn, $sql);
		}

		public function delete($id){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$sql = "delete from funcionario where id = '$id'";
			mysqli_query($conn, $sql);
		}

		public function selectFromName($nome){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$sql = "select*from funcionario where nome like '%$nome%'";
			$result = mysqli_query($conn,$sql);
			$funcionarios=array();
			if (mysqli_num_rows($result) > 0) {
   				while($linha = mysqli_fetch_assoc($result)) {
					$funcionario = new Funcionario($linha['nome'],$linha['funcao'],$linha['cpf'],$linha['rg'],$linha['celular'],$linha['salario'],$linha['admissao'],$linha['demissao'],$linha['endereco'],$linha['login'],$linha['senha'],$linha['eh_admin']);
				 $funcionario->setId($linha['id']);
				 array_push($funcionarios, $funcionario);
				}		
			}else{

			}
			return $funcionarios;
		}

		public function verificarRG($rg){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$sql = "select*from funcionario where rg = '$rg'";
			$result = mysqli_query($conn,$sql);
			return mysqli_num_rows($result);
		}

		public function verificarCPF($cpf){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$sql = "select*from funcionario where cpf = '$cpf'";
			$result = mysqli_query($conn,$sql);
			return mysqli_num_rows($result);
		}

		public function verificarLogin($login){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$sql = "select*from funcionario where login = '$login'";
			$result = mysqli_query($conn,$sql);
			return mysqli_num_rows($result);
		}
	}
?>