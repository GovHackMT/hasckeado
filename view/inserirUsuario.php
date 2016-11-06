<?php

require_once "../controller/controllerUsuario.php";

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['password1'])) {
    $controller = new ControllerUsuario();

    $existe = $controller->BuscarPorEmail($_POST['email']);
    if ($_POST['password1'] != $_POST['password2']) {
        throw new Exception("Semha inválida");
    }
    if (strlen($_POST['password1']) < 5) {
        throw new Exception("A senha precisa ter no mínimo 5 caracteres!");
    }
    if ($existe != null) {
        throw new Exception("Já existe usuário na base de dados");
    }

    $usuarioArray = array();
    $usuarioArray['id'] = null;
    $usuarioArray['nome'] = $_POST['nome'];
    $usuarioArray['email'] = $_POST['email'];
    $usuarioArray['data_cadastro'] = null;
    $usuarioArray['data_atualizacao'] = null;
    $usuarioArray['situacao'] = 1;
    $usuarioArray['tipo'] = $_POST['tipo'];
    $usuarioArray['senha'] = $_POST['password1'];

    $usuario = new UsuarioVO($usuarioArray);

    $controller->Inserir($usuario);

    header("location: login.php");
}
?>