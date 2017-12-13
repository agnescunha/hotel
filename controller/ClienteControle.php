<?php
	require_once '../../persistencia/ClientePersistencia.php';

	class ClienteControle{
		private $cliePers;

		public function ClienteControle(){
			$this->cliePers = new ClientePersistencia();
		}

		public function selectAll(){
			return $this->cliePers->selectAll();
		}

		public function selectFromId($id){
			return $this->cliePers->selectFromId($id);
		}

		public function update($cliente){
			$this->cliePers->update($cliente);
		}

		public function insert($cliente){
			$this->cliePers->insert($cliente);
		}

		public function delete($id){
			$this->cliePers->delete($id);
		}

		public function selectFromName($nome){
			return $this->cliePers->selectFromName($nome);
		}

		public function verificarRG($rg){
			return $this->cliePers->verificarRG($rg);
		}

		public function verificarCPF($cpf){
			return $this->cliePers->verificarCPF($cpf);
		}

		public function verificarEmail($email){
			return $this->cliePers->verificarEmail($email);
		}
	}
?>