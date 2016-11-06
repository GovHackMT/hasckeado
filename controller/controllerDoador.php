<?php

require_once __DIR__ . "/../model/modelDoador.php";

class ControllerDoador {

    public function __construct() {
        
    }

    public function BuscarTodos() {
        return ModelDoador::getInstance()->BuscarTodos();
    }

    public function BuscarTodosView() {
        return ModelDoador::getInstance()->BuscarTodosView();
    }

    public function Inserir(DoadorVO $doador) {
        ModelDoador::getInstance()->Inserir($doador);
    }

    public function BuscarTodasDoacoes($id_doador) {
        return ModelDoador::getInstance()->BuscarTodasDoacoes($id_doador);
    }

}

?>