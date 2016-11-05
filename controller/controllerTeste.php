<?php
require_once "model/modelTeste.php";

class ControllerTeste {
	public function __construct() {
	}
	public function BuscarTodos() {
		return ModelTeste::getInstance()->BuscarTodos();
	}
}

?>