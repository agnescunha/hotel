<?php
require_once '../../model/Banco.php';
require_once '../../model/Quarto.php';

class ClientePersistencia{
    private $banco;
    private $conn;


    public function selectAll(){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "select*from quarto";
        $result = mysqli_query($conn,$sql);
        $quarto=array();
        if (mysqli_num_rows($result) > 0) {
            while($linha = mysqli_fetch_assoc($result)) {
                $quarto = new Quarto ($linha['id'],$linha['num_quarto'],$linha['descricao'],$linha['valor'],$linha['classe']);
                $quarto->setId($linha['id']);
                array_push($quartos, $quarto);
            }
        }else{

        }
        return $quartos;
    }

    public function selectFromId($id){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "select*from quarto where id = '$id'";
        $result = mysqli_query($conn,$sql);
        $quarto= null;
        if (mysqli_num_rows($result) > 0) {
            $linha = mysqli_fetch_assoc($result);
            $quarto = new Quarto ($linha['id'],$linha['num_quarto'],$linha['descricao'],$linha['valor'],$linha['classe']);
            $quarto->setId($linha['id']);
        }else{

        }
        return $quarto;
    }

    public function update($quarto){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $id = $quarto->getId();
        $num_quarto = $quarto->getNumQuarto();
        $descricao = $quarto->getDescricao();
        $valor = $quarto->getValor();
        $classe = $quarto->getClasse();
        $sql = "update quarto set numQuarto='$num_quarto', descricao='$descricao', valor='$valor', classe='$classe'";
        mysqli_query($conn, $sql);
    }

    public function insert($quarto){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $id = $quarto->getId();
        $num_quarto = $quarto->getNumQuarto();
        $descricao = $quarto->getDescricao();
        $valor = $quarto->getValor();
        $classe = $quarto->getClasse();
        $sql = "insert into `quarto`( `id`, `num_quarto`, `descricao`, `valor`, `classe`) values (' ', '$num_quarto', '$descricao','$valor', '$classe')";
        mysqli_query($conn, $sql);
    }

    public function delete($id){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "delete from quarto where id = '$id'";
        mysqli_query($conn, $sql);
    }

    public function verificarNumero($num_quarto){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "select*from quarto where rg = '$num_quarto'";
        $result = mysqli_query($conn,$sql);
        return mysqli_num_rows($result);
    }

    public function verificarClasse($classe){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "select*from quarto where cpf = '$classe'";
        $result = mysqli_query($conn,$sql);
        return mysqli_num_rows($result);
    }
}
?>