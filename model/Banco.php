<?php
    require_once 'Cliente.php';

    class Banco{
        var $endereco = 'localhost';
        var $username = 'root';
        var $senha = 'heinke1985';
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

        public function loginCliente($email, $senha){
            $sql = "SELECT * FROM cliente WHERE email = '".$email."' AND senha = '".$senha."';";
            
            $this->abrirConexao();
            $retorno = $this->conexao->query($sql);
            $this->fecharConexao();

            $cliente = new Cliente();

            foreach($retorno as $a){
                $cliente->setId($a['id']);
                $cliente->setNome($a['nome']);
                $cliente->setRg($a['rg']);
                $cliente->setCpf($a['cpf']);
                $cliente->setEndereco($a['endereco']);
                $cliente->setAniversario($a['data_nascimento']);
                $cliente->setTelefone1($a['telefone1']);
                $cliente->setTelefone2($a['telefone2']);
                $cliente->setEmail($a['email']);
                $cliente->setSexo($a['sexo']);
            }
            if(mysqli_num_rows($retorno) > 0){
                return $cliente;
            }
            else{
                return 0;
            }
            
        }

        public function pesquisaReserva($idCliente, $status){

        }
    }
?>
