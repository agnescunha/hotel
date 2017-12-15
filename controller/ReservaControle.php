<?php
require_once '../../persistencia/ReservaPersistencia.php';

class ReservaControle{
    private $resPers;

    public function ReservaControle(){
        $this->resPers = new ReservaPersistencia();
    }

    public function selectAll(){
        return $this->resPers->selectAll();
    }

    public function selectFromId($id){
        return $this->resPers->selectFromId($id);
    }

    public function update($reserva){
        $this->resPers->update($reserva);
    }

    public function insert($reserva){
        $this->resPers->insert($reserva);
    }

    public function delete($id){
        $this->resPers->delete($id);
    }

    public function verificarEntrada($inicio){
        return $this->resPers->verificarEntrada($inicio);
    }

    public function verificarSaida($saida){
        return $this->resPers->verificarSaida($saida);
    }

}
?>