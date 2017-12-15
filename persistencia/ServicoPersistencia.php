<?php
require_once '../../model/Banco.php';
require_once '../../model/Servico.php';

class ServicoPersistencia{
    private $banco;
    private $conn;


    public function selectAll(){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "select*from servico";
        $result = mysqli_query($conn,$sql);
        $servicos=array();
        if (mysqli_num_rows($result) > 0) {
            while($linha = mysqli_fetch_assoc($result)) {
                $servico = new Servico($linha['descricao'],$linha['valor']);
                $servico->setId($linha['id']);
                array_push($servicos, $servico);
            }
        }else{

        }
        return $servicos;
    }

    public function selectFromId($id){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "select*from servico where id = '$id'";
        $result = mysqli_query($conn,$sql);
        $servico= null;
        if (mysqli_num_rows($result) > 0) {
            $linha = mysqli_fetch_assoc($result);
            $servico = new Servico($linha['descricao'],$linha['valor']);
            $servico->setId($linha['id']);
        }else{

        }
        return $servico;
    }

    public function update($servico){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $id = $servico->getId();
        $descricao = $servico->getDescricao();
        $valor = $servico->getValor();
        $sql = "update servico set descricao='$descricao', valor='$valor' where id = '$id'";
        mysqli_query($conn, $sql);
    }

    public function insert($servico){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $id = $servico->getId();
        $descricao = $servico->getDescricao();
        $valor = $servico->getValor();
        $sql = "insert into `reserva`( `id`, `descricao`, `valor`) values('$id', '$descricao', '$valor')";
        mysqli_query($conn, $sql);
    }

    public function delete($id){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "delete from servico where id = '$id'";
        mysqli_query($conn, $sql);
    }

     public function verificarDescricao($descricao){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "select*from servico where descricao = '$descricao'";
        $result = mysqli_query($conn,$sql);
        return mysqli_num_rows($result);
    }

    public function verificarValor($valor){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "select*from servico where valor = '$valor'";
        $result = mysqli_query($conn,$sql);
        return mysqli_num_rows($result);
    }
}
?>