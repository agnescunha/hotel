<?php
require_once '../../model/Banco.php';
require_once '../../model/Comanda.php';

class ComandaPersistencia{
    private $banco;
    private $conn;


    public function selectAll(){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "select*from comanda";
        $result = mysqli_query($conn,$sql);
        $comandas=array();
        if (mysqli_num_rows($result) > 0) {
            while($linha = mysqli_fetch_assoc($result)) {
                $comanda = new Comanda($linha['id'],$linha['id_cliente'],$linha['id_funcionario'],$linha['id_servico'],$linha['id_quarto'],$linha['quantidade'], $linha['total'],$linha['status_']);
                $comanda->setId($linha['id']);
                array_push($comandas, $comanda);
            }
        }else{

        }
        return $comandas;
    }

    public function selectFromId($id){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "select*from comanda where id = '$id'";
        $result = mysqli_query($conn,$sql);
        $comanda= null;
        if (mysqli_num_rows($result) > 0) {
            $linha = mysqli_fetch_assoc($result);
            $comanda = new Comanda($linha['id'],$linha['id_cliente'],$linha['id_funcionario'],$linha['id_servico'],$linha['id_quarto'],$linha['quantidade'], $linha['total'],$linha['status_']);
            $comanda->setId($linha['id']);
        }else{

        }
        return $comanda;
    }

    public function update($comanda){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $id = $comanda->getId();
        $cliente = $comanda->getCliente();
        $funcionario = $comanda->getFuncionario();
        $servico = $comanda->getServico();
        $quarto = $comanda->getQuarto();
        $quantidade = $comanda->getQuantidade();
        $total = $comanda->getTotal();
        $status = $comanda->getStatus();
        $sql = "update comanda set cliente='$cliente', funcionario='$funcionario', servico='$servico', quarto='$quarto', quantidade='$quantidade',
			total='$total', status='$status' where id = '$id'";
        mysqli_query($conn, $sql);
    }

    public function insert($comanda){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $id = $comanda->getId();
        $cliente = $comanda->getCliente();
        $funcionario = $comanda->getFuncionario();
        $servico = $comanda->getServico();
        $quarto = $comanda->getQuarto();
        $quantidade = $comanda->getQuantidade();
        $total = $comanda->getTotal();
        $status = $comanda->getStatus();
        $sql = "insert into `comanda`( `id`, `cliente`, `funcionario`, `servico`, `quarto`, `quantidade`, `total`, `status`) values 
						(' ','$cliente', '$funcionario', '$servico','$quarto', '$quantidade','$total', '$status')";
        mysqli_query($conn, $sql);
    }

    public function delete($id){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "delete from comanda where id = '$id'";
        mysqli_query($conn, $sql);
    }

    public function verificarQuarto($quarto){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "select*from comanda where quarto = '$quarto'";
        $result = mysqli_query($conn,$sql);
        return mysqli_num_rows($result);
    }

    public function verificarStatus($status){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "select*from comanda where status = '$status'";
        $result = mysqli_query($conn,$sql);
        return mysqli_num_rows($result);
    }



}?>