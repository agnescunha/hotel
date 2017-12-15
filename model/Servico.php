<?php
    class Servico{
        private $id;
        private $descricao;
        private $valor;

        public function getId(){
            return $this->id;
        }

        public function setId($_id){
            $this->id = $_id;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function setDescricao($_descricao){
            $this->descricao = $_descricao;
        }

        public function getValor(){
            return $this->valor;
        }

        public function setValor($_valor){
            $this->valor = $_valor;
        }
    }
?>