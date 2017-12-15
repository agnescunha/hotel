<?php
require_once '../../persistencia/ServicoPersistencia.php';

class ServicoControle{
    private $servPers;

    public function ServicoControle(){
        $this->servPers = new ServicoPersistencia();
    }

    public function selectAll(){
        return $this->servPers->selectAll();
    }

    public function selectFromId($id){
        return $this->servPers->selectFromId($id);
    }

    public function update($servico){
        $this->servPers->update($servico);
    }

    public function insert($servico){
        $this->servPers->insert($servico);
    }

    public function delete($id){
        $this->servPers->delete($id);
    }

    public function verificarDescricao($descricao){
        return $this->servPers->verificarDescricao($descricao);
    }

    public function verificarValor($valor){
        return $this->servPers->verificarValor($valor);
    }

   }
?>