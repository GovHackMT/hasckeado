<?php
require_once "model/modelTipoSanguineo.php";

class ControllerTipoSanguineo {
	public function __construct() {
	}
	public function BuscarTodos() {
		return ModelTipoSanguineo::getInstance()->BuscarTodos();
	}
}

?>