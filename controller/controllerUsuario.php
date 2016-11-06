<?php

require_once __DIR__."/../model/modelUsuario.php";

class ControllerUsuario {

    public function __construct() {
        
    }

    public function BuscarTodos() {
        return ModelUsuario::getInstance()->BuscarTodos();
    }

    public function BuscarPorHemocentro($idHemocentro) {
        return ModelUsuario::getInstance()->BuscarPorHemocentro($idHemocentro);
    }
    public function BuscarPorEmail($email) {
        return ModelUsuario::getInstance()->BuscarPorEmail($email);
    }

    public function Inserir(usuarioVO $usuario) {
        ModelUsuario::getInstance()->Inserir($usuario);
    }

    public function removerAdmHemocentro($id_usuario, $id_hemocentro) {
        ModelUsuario::getInstance()->removerAdmHemocentro($id_usuario, $id_hemocentro);
    }
    public function adicionarAdmHemocentro($id_usuario, $id_hemocentro) {
        ModelUsuario::getInstance()->adicionarAdmHemocentro($id_usuario, $id_hemocentro);
    }

}

?>