<?php
	require_once '../../persistencia/FuncionarioPersistencia.php';

	class FuncionarioControle{
		private $funcPers;

		public function FuncionarioControle(){
			$this->funcPers = new FuncionarioPersistencia();
		}

		public function selectAll(){
			return $this->funcPers->selectAll();
		}

		public function selectFromId($id){
			return $this->funcPers->selectFromId($id);
		}

		public function update($funcionario){
			$this->funcPers->update($funcionario);
		}

		public function insert($funcionario){
			$this->funcPers->insert($funcionario);
		}

		public function delete($id){
			$this->funcPers->delete($id);
		}

		public function selectFromName($nome){
			return $this->funcPers->selectFromName($nome);
		}

		public function verificarRG($rg){
			return $this->funcPers->verificarRG($rg);
		}

		public function verificarCPF($cpf){
			return $this->funcPers->verificarCPF($cpf);
		}

		public function verificarLogin($login){
			return $this->funcPers->verificarLogin($login);
		}
	}
?>