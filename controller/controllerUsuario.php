<?php
require_once "model/modelUsuario.php";

class ControllerUsuario {
	public function __construct() {
	}
	public function BuscarTodos() {
		return ModelUsuario::getInstance()->BuscarTodos();
	}

	public function Inserir(usuarioVO $usuario) {
		ModelUsuario::getInstance()->Inserir($usuario);
	}
}

?>