<?php
require_once '../../model/Banco.php';
require_once '../../model/Reserva.php';

class ReservaPersistencia{
    private $banco;
    private $conn;


    public function selectAll(){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "select*from reserva";
        $result = mysqli_query($conn,$sql);
        $reserva =array();
        if (mysqli_num_rows($result) > 0) {
            while($linha = mysqli_fetch_assoc($result)) {
                $reserva = new Reserva($linha['id_cliente'],$linha['id_comanda'],$linha['inicio'],$linha['saida'],$linha['motivo'],$linha['status_reserva']);
                $reserva->setId($linha['id']);
                array_push($reservas, $reserva);
            }
        }else{

        }
        return $reservas;
    }

    public function selectFromId($id){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "select*from reserva where id = '$id'";
        $result = mysqli_query($conn,$sql);
        $reserva= null;
        if (mysqli_num_rows($result) > 0) {
            $linha = mysqli_fetch_assoc($result);
            $reserva = new Reserva($linha['id_cliente'],$linha['id_comanda'],$linha['inicio'],$linha['saida'],$linha['motivo'],$linha['status_reserva']);
            $reserva->setId($linha['id']);
        }else{

        }
        return $reserva;
    }

    public function update($reserva){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $id = $reserva->getId();
        $id_cliente = $reserva->getCliente();
        $id_comanda = $reserva->getComanda();
        $inicio = $reserva->getInicio();
        $saida = $reserva->getSaida();
        $motivo = $reserva->getMotivo();
        $status_reserva = $reserva->getStatusReserva();
        $sql = "update reserva set id_cliente='$id_cliente', id_comanda='$id_comanda', inicio='$inicio', saida='$saida', motivo='$motivo',
			status_reserva='$status_reserva' where id = '$id'";
        mysqli_query($conn, $sql);
    }

    public function insert($reserva){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $id = $reserva->getId();
        $id_cliente = $reserva->getCliente();
        $id_comanda = $reserva->getComanda();
        $inicio = $reserva->getInicio();
        $saida = $reserva->getSaida();
        $motivo = $reserva->getMotivo();
        $status_reserva = $reserva->getStatusReserva();
        $sql = "insert into `reserva`( `id`, `id_cliente`, `id_comanda`, `inicio`, `saida`, `motivo`, `status_reserva`) values 
						(' ', '$id_cliente', '$id_comanda','$inicio', '$saida','$motivo', '$status_reserva')";
        mysqli_query($conn, $sql);
    }

    public function delete($id){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "delete from reserva where id = '$id'";
        mysqli_query($conn, $sql);
    }

    public function verificarEntrada($inicio){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "select*from reserva where inicio = '$inicio'";
        $result = mysqli_query($conn,$sql);
        return mysqli_num_rows($result);
    }

    public function verificarSaida($saida){
        $banco = new Banco();
        $banco->abrirConexao();
        $conn = $banco->getConexao();
        $sql = "select*from reserva where saida = '$saida'";
        $result = mysqli_query($conn,$sql);
        return mysqli_num_rows($result);
    }

   }
?>