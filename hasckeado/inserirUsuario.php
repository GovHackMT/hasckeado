<?php

require_once "controller/controllerUsuario.php";

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['password1'])) {
    $controller = new ControllerUsuario();
    $usuarioArray = array();
    $usuarioArray['id'] = null;
    $usuarioArray['nome'] = $_POST['nome'];
    $usuarioArray['email'] = $_POST['email'];
    $usuarioArray['data_cadastro'] = null;
    $usuarioArray['data_atualizacao'] = null;
    $usuarioArray['situacao'] = 1;
    $usuarioArray['tipo'] = 1;
    $usuarioArray['senha'] = $_POST['password1'];

    $usuario = new UsuarioVO($usuarioArray);
 
    $controller->Inserir($usuario);
}
?>