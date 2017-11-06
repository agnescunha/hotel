<?php
    class Banco{
        var $endereco = 'localhost';
        var $username = 'root';
        var $senha = '';
        var $database = 'hotel';
        private $conexao;

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
    }
?>