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
            $this->telefone1 = $_telefone
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
    }
?>