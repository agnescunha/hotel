<?php
    require_once 'Cliente.php';

    class Banco{
        var $endereco = 'localhost';
        var $username = 'root';
        var $senha = '';
        var $database = 'hotel';
        
        private $conexao;

        public function getConexao(){
            return $this->conexao;
        }

        public function abrirConexao(){
            $this->conexao = mysqli_connect($this->endereco, $this->username, $this->senha, $this->database);
            //echo 'abriu conexão.<br>';
        }

        public function fecharConexao(){
            $this->conexao->close();
            //echo 'fechou conexão.<br>';
        }

        public function pesquisarCliente($chave, $valor){
            $sql = 'SELECT * FROM cliente WHERE '.$chave.' LIKE \'%'.$valor.'%\'';
            
            $this->abrirConexao();
            $retorno = $this->conexao->query($sql);
            $this->fecharConexao();
            return $retorno;
        }
        
        public function cadastrarCliente($cliente){
            
            $sql = "INSERT INTO cliente (nome,rg,cpf,endereco,data_nascimento,telefone1,telefone2,email,senha,sexo) 
                    VALUES ( '".$cliente->getNome()."'
                            ,'".$cliente->getRg()."'
                            ,'".$cliente->getCpf()."'
                            ,'".$cliente->getEndereco()."'
                            ,'".$cliente->getAniversario()."'
                            ,'".$cliente->getTelefone1()."'
                            ,'".$cliente->getTelefone2()."'
                            ,'".$cliente->getEmail()."'
                            ,'".$cliente->getSenha()."'
                            ,'".$cliente->getSexo()."');";
            
            //echo $sql."<br>";
            $this->abrirConexao();
            $retorno = $this->conexao->query($sql);
            $this->fecharConexao();
            return $retorno;
        }

        public function pesquisaReserva($idCliente, $status){

        }
    }
?>
