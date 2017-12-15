<?php
    require_once 'Cliente.php';

    class Banco{
        var $endereco = 'localhost';
        var $username = 'root';
        //var $senha = '';
        var $senha = 'heinke1985'; //Senha MySQL Agnes(casa)
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

            $cliente = new Cliente();
            
            foreach($retorno as $a){
                $cliente->setId($a['id']);
                $cliente->setNome($a['nome']);
                $cliente->setRg($a['rg']);
                $cliente->setCpf($a['cpf']);
                $cliente->setEndereco($a['endereco']);
                $aniversario = $a['data_nascimento'];
                    $ano = substr($aniversario,0,4);
                    $mes = substr(substr($aniversario,5,7),0,2); //2 substr pois está repetindo o dia
                    $dia = substr($aniversario,8,10);
                    echo $ano."<br>".$mes."<br>".$dia."<br>";
                $cliente->setAniversario($dia."/".$mes."/".$ano);
                $cliente->setTelefone1($a['telefone1']);
                $cliente->setTelefone2($a['telefone2']);
                $cliente->setEmail($a['email']);
                $cliente->setSexo($a['sexo']);
                $cliente->setSenha($a['senha']);
            }
            return $cliente;
        }
        
        public function cadastrarCliente($cliente){

            $_aniversario = $cliente->getAniversario();

            $dia = substr($_aniversario,0,2);
            $mes = substr($_aniversario,3,2);
            $ano = substr($_aniversario,6,9);
            $aniversario = $ano."/".$mes."/".$dia;

            $a = strtolower($cliente->getSexo());
            switch($a){
                case ("feminino" || 'f') : 
                    $sexo = "F";
                    break;
                case ("masculino" || 'm'):
                    $sexo = "M";
                    break;
                case ("outros" || 'o'):
                    $sexo = "O";
                    break;
            }
            
            $sql = "INSERT INTO cliente (nome,rg,cpf,endereco,data_nascimento,telefone1,telefone2,email,senha,sexo) 
                    VALUES ( '".$cliente->getNome()."'
                            ,'".$cliente->getRg()."'
                            ,'".$cliente->getCpf()."'
                            ,'".$cliente->getEndereco()."'
                            ,'".$aniversario."'
                            ,'".$cliente->getTelefone1()."'
                            ,'".$cliente->getTelefone2()."'
                            ,'".$cliente->getEmail()."'
                            ,'".$cliente->getSenha()."'
                            ,'".$sexo."');";
            
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
            
            if(mysqli_num_rows($retorno) > 0){
                foreach($retorno as $a){
                    $email = $a['email'];
                }
                return $email;
            }
            else{
                return '0';
            }
        }

        public function pesquisaReserva($idCliente, $status){
        }

        public function atualizarCliente($cliente){

            $dia = substr($cliente->getAniversario(),0,2);
            $mes = substr($cliente->getAniversario(),3,2);
            $ano = substr($cliente->getAniversario(),6,9);
            $aniversario = $ano."/".$mes."/".$dia;


            $a = strtolower($cliente->getSexo());
            switch($a){
                case ("feminino" || 'f') : 
                    $sexo = "F";
                    break;
                case ("masculino" || 'm'):
                    $sexo = "M";
                    break;
                case ("outros" || 'o'):
                    $sexo = "O";
                    break;
            }

            $sql = "UPDATE cliente 
                    SET   nome = '".$cliente->getNome()."' 
                        , rg = '".$cliente->getRg()."' 
                        , cpf ='".$cliente->getCpf()."' 
                        , endereco = '".$cliente->getEndereco()."' 
                        , data_nascimento = '".$aniversario."' 
                        , telefone1 = '".$cliente->getTelefone1()."' 
                        , telefone2 = '".$cliente->getTelefone2()."' 
                        , email = '".$cliente->getEmail()."' 
                        , senha = '".$cliente->getSenha()."' 
                        , sexo = '".$sexo."' 
                    WHERE cpf = '".$cliente->getCpf()."';";          
            $this->abrirConexao();
            $retorno = $this->conexao->query($sql);
            $this->fecharConexao();
            return $retorno;
        }   
    }
?>
