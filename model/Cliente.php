<?php
    class Cliente{
        private $id;
        private $nome;
        private $rg;
        private $cpf;
        private $endereco;
        private $aniversario;
        private $telefone1;
        private $telefone2;
        private $email;
        private $senha;
        private $sexo;

        public function Cliente($nome,$rg,$cpf,$endereco,$aniversario,$telefone1,$telefone2,$email,$senha,$sexo){
            $this->setNome($nome);
            $this->setCpf($cpf);
            $this->setRg($rg);
            $this->setEndereco($endereco);
            $this->aniversario = $aniversario;
            $this->setTelefone1($telefone1);
            $this->setTelefone2($telefone2);
            $this->setEmail($email);
            $this->setSenha($senha);
            $this->sexo = $sexo;
        }
                
        public function getId(){
            return $this->id;
        }

        public function setId($_id){
            $this->id = $_id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($_nome){
            $this->nome = $_nome;
        }

        public function getRg(){
            return $this->rg;
        }

        public function setRg($_rg){
            $this->rg = $_rg;
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function setCpf($_cpf){
            $this->cpf = $_cpf;
        }

        public function getEndereco(){
            return $this->endereco;
        }

        public function setEndereco($_endereco){
            $this->endereco = $_endereco;
        }

        public function getAniversario(){
            return $this->aniversario;
        }

        public function setAniversario($_aniversario){
            $this->aniversario = $_aniversario;
        }

        public function getTelefone1(){
            return $this->telefone1;
        }

        public function setTelefone1($_telefone){
            $this->telefone1 = $_telefone;
        }

        public function getTelefone2(){
            return $this->telefone2;
        }

        public function setTelefone2($_telefone){
            $this->telefone2 = $_telefone;
        }
        
        public function getEmail(){
            return $this->email;
        }

        public function setEmail($_email){
            $this->email = $_email;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function setSenha($_senha){
            $this->senha = $_senha;   
        }

        public function getSexo(){
            switch($this->sexo){
                case 'F' : 
                    $this->sexo = "Feminino";
                    break;
                case 'M' :
                    $this->sexo = "Masculino";
                    break;
                case 'O':
                    $this->sexo = "Outro";
                    break;
            }
            return $this->sexo;
        }

        public function setSexo($_sexo){
            $this->sexo = $_sexo;
        }
    }
?>
