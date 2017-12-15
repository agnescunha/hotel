<?php
require_once '../../persistencia/ComandaPersistencia.php';

class ComandaControle{
    private $comPers;

    public function ComandaControle(){
        $this->comPers = new ComandaPersistencia();
    }

    public function selectAll(){
        return $this->comPers->selectAll();
    }

    public function selectFromId($id){
        return $this->comPers->selectFromId($id);
    }

    public function update($comanda){
        $this->comPers->update($comanda);
    }

    public function insert($comanda){
        $this->comPers->insert($comanda);
    }

    public function delete($id){
        $this->comPers->delete($id);
    }

    public function verificarQuarto($quarto){
        return $this->comPers->verificarQuarto($quarto);
    }

    public function verificarStatus($status){
        return $this->comPers->verificarStatus($status);
    }


}
?>