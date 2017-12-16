<?php
    include 'model\Cliente';
    include 'model\Funcionario';
    include 'model\Servico';
    include 'model\Quarto';

    class Comanda{
        private $id;
        private $cliente;
        private $funcionario;
        private $servico;
        private $quarto;
        private $quantidade;
        private $total;
        private $status;

        public function __construct(){
            $this->cliente = new Cliente();
            $this->funcionario = new Funcionario();
            $this->servico = new Servico();
            $this->quarto = new Quarto();
        }

        public function getId(){
            return $this->id;
        }

        public function setId($_id){
            $this->id = $_id;
        }

        public function getCliente(){
            return $this->cliente;
        }

        public function setCliente($_cliente){
            $this->cliente = $_cliente;
        }

        public function getFuncionario(){
            return $this->funcionario;
        }

        public function setFuncionario($_funcionario){
            $this->funcionario = $_funcionario;
        }

        public function getServico(){
            return $this->servico;
        }

        public function setServico($_servico){
            $this->servico = $_servico;
        }

        public function getQuarto(){
            return $this->quarto;
        }

        public function setQuarto($_quarto){
            $this->quarto = $_quarto;
        }
        
        public function getQuantidade(){
            return $this->quantidade;
        }

        public function setQuantidade($_quantidade){
            $this->quantidade = $_quantidade;
        }
        
        public function getTotal(){
            return $this->total;
        }

        public function setTotal($_total){
            $this->total = $_total;
        }
        
        public function getStatus(){
            return $this->status;
        }

        public function setStatus($_status){
            $this->status = $_status;
        }
    }
?>