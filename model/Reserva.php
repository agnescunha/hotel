<?php
class Reserva{
    private $id;
    private $id_cliente;
    private $id_comanda;
    private $inicio;
    private $saida;
    private $motivo;
    private $status_reserva;

    public function Reserva($id_cliente,$id_comanda,$inicio,$saida,$motivo,$status_reserva){
        $this->setCliente($id_cliente);
        $this->setComanda($id_comanda);
        $this->setInicio($inicio);
        $this->setSaida($saida);
        $this->setMotivo($motivo);
        $this->setStatusReserva($status_reserva);

    }

    public function getId(){
        return $this->id;
    }

    public function setId($_id){
        $this->id = $_id;
    }

    public function getCliente(){
        return $this->id_cliente;
    }

    public function setCliente($_cliente){
        $this->id_cliente = $_cliente;
    }

    public function getComanda(){
        return $this->id_comanda;
    }

    public function setComanda($_comanda){
        $this->id_comanda = $_comanda;
    }

    public function getInicio(){
        return $this->inicio;
    }

    public function setInicio($_inicio){
        $this->inicio = $_inicio;
    }

    public function getSaida(){
        return $this->saida;
    }

    public function setSaida($_saida){
        $this->saida = $_saida;
    }

    public function getMotivo(){
        return $this->motivo;
    }

    public function setMotivo($_motivo){
        $this->saida = $_motivo;
    }

    public function getStatusReserva(){
        return $this->status_reserva;
    }

    public function setStatusReserva($_saida){
        $this->saida = $_saida;
    }
}
?>