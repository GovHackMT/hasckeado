<?php

require_once "../model/modelHemocentro.php";
require_once "../vo/hemocentroVO.php";

class ControllerHemocentro {

    public function __construct() {
        
    }

    public function BuscarTodos() {
        return ModelHemocentro::getInstance()->BuscarTodos();
    }

    public function BuscarPorId($id) {
        return ModelHemocentro::getInstance()->BuscarPorId($id);
    }

    public function Atualizar(HemocentroVO $hemocentro) {
        return ModelHemocentro::getInstance()->Atualizar($hemocentro);
    }

    public function Inserir(HemocentroVO $hemocentro) {
        return ModelHemocentro::getInstance()->Inserir($hemocentro);
    }

}

?>