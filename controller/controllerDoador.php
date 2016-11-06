<?php
require_once __DIR__ ."/../model/modelDoador.php";

class ControllerDoador {
	public function __construct() {
	}
	public function BuscarTodos() {
		return ModelDoador::getInstance()->BuscarTodos();
	}

	public function Inserir(DoadorVO $doador) {
            ModelDoador::getInstance()->Inserir($doador);
	}
}

?>