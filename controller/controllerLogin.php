<?php

require_once "../model/modelLogin.php";

class ControllerLogin {

    public function __construct() {
        
    }

    public function BuscarPorLogin($email, $senha) {
        return ModelLogin::getInstance()->BuscarPorLogin($email, $senha);
    }
}

?>