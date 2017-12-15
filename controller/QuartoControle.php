<?php
require_once '../../persistencia/QuartoPersistencia.php';

class QuartoControle{
    private $QuaPers;

    public function QuartoControle(){
        $this->QuaPers = new QuartoControle();
    }

    public function selectAll(){
        return $this->QuaPers->selectAll();
    }

    public function selectFromId($id){
        return $this->QuaPers->selectFromId($id);
    }

    public function update($quarto){
        $this->QuaPers->update($quarto);
    }

    public function insert($quarto){
        $this->QuaPers->insert($quarto);
    }

    public function delete($id){
        $this->QuaPers->delete($id);
    }

    public function verificarNumero($numQuarto){
        return $this->QuaPers->verificarNumero($numQuarto);
    }

    public function verificarClasse($classe){
        return $this->QuaPers->verificarClasse($classe);
    }

}
?><?php

