<?php

include "../includes/header.php";

if (!isset($_SESSION['usuario'])) {
    header("location: ../index.php");
}

if (isset($_GET['acao']) && isset($_GET['hemocentro'])) {
    require_once "../controller/controllerUsuario.php";

    $acao = $_GET['acao'];
    $id_hemocentro = $_GET['hemocentro'];
    $id_usuario = $_SESSION['usuario'];

    $controller = new ControllerUsuario();

    switch ($acao) {
        case 1:
            echo 'add';
            $controller->removerAdmHemocentro($id_usuario, $id_hemocentro);
            $controller->adicionarAdmHemocentro($id_usuario, $id_hemocentro);
            break;
        case 0:
            echo 'remove';
            $controller->removerAdmHemocentro($id_usuario, $id_hemocentro);

            break;
    }

    header("location: hemocentro.php");
} else {

    header("location: hemocentro.php");
}
include "../includes/footer.php";
?>
