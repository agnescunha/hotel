<?php
	require_once '../../model/Banco.php';
	require_once '../../model/Cliente.php';

	class ClienteControle{
		private $banco;
	    private $conn;


		public function selectAll(){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$sql = "select*from cliente";
			$result = mysqli_query($conn,$sql);
			$clientes=array();
			if (mysqli_num_rows($result) > 0) {
   				 while($linha = mysqli_fetch_assoc($result)) {
					$cliente = new Cliente($linha['nome'],$linha['rg'],$linha['cpf'],$linha['endereco'],$linha['data_nascimento'],$linha['telefone1'],
					$linha['telefone2'],$linha['email'],$linha['senha']);
				 $cliente->setId($linha['id']);
				 array_push($clientes, $cliente);
				}	
			}else{

			}
			return $clientes;
		}

		public function selectFromId($id){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$sql = "select*from cliente where id = '$id'";
			$result = mysqli_query($conn,$sql);
			$cliente= null;
			if (mysqli_num_rows($result) > 0) {
   				$linha = mysqli_fetch_assoc($result);
					$cliente = new Cliente($linha['nome'],$linha['rg'],$linha['cpf'],$linha['endereco'],$linha['data_nascimento'],$linha['telefone1'],
					$linha['telefone2'],$linha['email'],$linha['senha']);
				 	$cliente->setId($linha['id']);		
			}else{

			}
			return $cliente;
		}

		public function update($cliente){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$id = $cliente->getId();
			$nome = $cliente->getNome();
			$cpf = $cliente->getCpf();
			$rg = $cliente->getRg();
 			$telefone1 = $cliente->getTelefone1();
			$telefone2 = $cliente->getTelefone2();
			$aniversario = $cliente->getAniversario();
			$email = $cliente->getEmail();
			$senha = $cliente->getSenha();
			$endereco = $cliente->getEndereco();
			$sql = "update cliente set nome='$nome', rg='$rg', cpf='$cpf', endereco='$endereco', data_nascimento='$aniversario',
			telefone1='$telefone1', telefone2='$telefone2',email='$email',senha='$senha' where id = '$id'";
			mysqli_query($conn, $sql);
		}

		public function insert($cliente){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$nome = $cliente->getNome();
			$cpf = $cliente->getCpf();
			$rg = $cliente->getRg();
 			$telefone1 = $cliente->getTelefone1();
			$telefone2 = $cliente->getTelefone2();
			$aniversario = $cliente->getAniversario();
			$email = $cliente->getEmail();
			$senha = $cliente->getSenha();
			$endereco = $cliente->getEndereco();
			$sql = "insert into `cliente`( `nome`, `rg`, `cpf`, `endereco`, `data_nascimento`, `telefone1`, `telefone2`, `email`, `senha`) values 
						('$nome', '$rg', '$cpf','$endereco', '$aniversario','$telefone1', '$telefone2','$email','$senha')";
			mysqli_query($conn, $sql);
		}

		public function delete($id){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$sql = "delete from cliente where id = '$id'";
			mysqli_query($conn, $sql);
		}

		public function selectFromName($nome){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$sql = "select*from cliente where nome like '%$nome%'";
			$result = mysqli_query($conn,$sql);
			$clientes=array();
			if (mysqli_num_rows($result) > 0) {
   				while($linha = mysqli_fetch_assoc($result)) {
					$cliente = new Cliente($linha['nome'],$linha['rg'],$linha['cpf'],$linha['endereco'],$linha['data_nascimento'],$linha['telefone1'],
					$linha['telefone2'],$linha['email'],$linha['senha']);
				 $cliente->setId($linha['id']);
				 array_push($clientes, $cliente);
				}		
			}else{

			}
			return $clientes;
		}

		public function verificarRG($rg){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$sql = "select*from cliente where rg = '$rg'";
			$result = mysqli_query($conn,$sql);
			return mysqli_num_rows($result);
		}

		public function verificarCPF($cpf){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$sql = "select*from cliente where cpf = '$cpf'";
			$result = mysqli_query($conn,$sql);
			return mysqli_num_rows($result);
		}

		public function verificarEmail($email){
			$banco = new Banco();
			$banco->abrirConexao();
			$conn = $banco->getConexao();
			$sql = "select*from cliente where email = '$email'";
			$result = mysqli_query($conn,$sql);
			return mysqli_num_rows($result);
		}
	}
?>