<?php
    class Quarto{
        private $id;
        private $numQuarto;
        private $descricao;
        private $valor;
        private $classe;

        public function getId(){
            return $this->id;
        }

        public function setId($_id){
            $this->id = $_id;
        }

        public function getNumQuarto(){
            return $this->numQuarto;
        }

        public function setNumQuarto($_numQuarto){
            $this->numQuarto = $_numQuarto;
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

        public function getClasse(){
            return $this->classe;
        }

        public function setClasse($_classe){
            $this->classe = $_classe;
        }
    }
?>