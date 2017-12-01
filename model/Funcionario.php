<?php
    class Funcionario {
        private $id;
        private $nome;
        private $funcao;
        private $cpf;
        private $rg;
        private $celular;
        private $salario;
        private $admissao;
        private $demissao;
        private $endereco;
        private $login;
        private $senha;
        private $eh_admin;
        
        public function Funcionario($nome,$funcao,$cpf,$rg,$celular,$salario,$admissao,$demissao,$endereco,$login,$senha,$eh_admin){
            $this->setNome($nome);
            $this->setFuncao($funcao);
            $this->setCpf($cpf);
            $this->setRg($rg);
            $this->setCelular($celular);
            $this->setSalario($salario);
            $this->setAdmissao($admissao);
            $this->setDemissao($demissao);
            $this->setEndereco($endereco);
            $this->setLogin($login);
            $this->setSenha($senha);
            $this->setEhAdmin($eh_admin);
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

        public function getFuncao(){
            return $this->funcao;
        }

        public function setFuncao($_funcao){
            $this->funcao = $_funcao;
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function setCpf($_cpf){
            $this->cpf = $_cpf;
        }

        public function getRg(){
            return $this->rg;
        }

        public function setRg($_rg){
            $this->rg = $_rg;
        }

        public function getCelular(){
            return $this->celular;
        }

        public function setCelular($_celular){
            $this->celular = $_celular;
        }

        public function getSalario(){
            return $this->salario;
        }

        public function setSalario($_salario){
            $this->salario = $_salario;
        }

        public function getAdmissao(){
            return $this->admissao;
        }

        public function setAdmissao($_admissao){
            $this->admissao = $_admissao;
        }

        public function getDemissao(){
            return $this->demissao;
        }

        public function setDemissao($_demissao){
            $this->demissao = $_demissao;
        }

        public function getEndereco(){
            return $this->endereco;
        }

        public function setEndereco($_endereco){
            $this->endereco = $_endereco;
        }

        public function getLogin(){
            return $this->login;
        }

        public function setLogin($_login){
            $this->login = $_login;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function setSenha($_senha){
            $this->senha = $_senha;
        }
        
        public function getEhAdmin(){
            return $this->eh_admin;
        }

        public function setEhAdmin($_ehAdmin){
            $this->eh_admin = $_ehAdmin;
        }
    }
?>
