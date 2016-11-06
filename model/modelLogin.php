<?php

require_once "../conexao.php";
require_once "../vo/usuarioVO.php";

class ModelLogin {

    public static $instance;

    public function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ModelLogin();

        return self::$instance;
    }

    public function BuscarPorLogin($email, $senha) {

        try {
            $sql = "SELECT * FROM usuario WHERE email = :email and md5(:senha) = senha limit 1";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":email", $email);
            $p_sql->bindValue(":senha", $senha);
            $p_sql->execute();
            
            $resultado = new UsuarioVO($p_sql->fetch(PDO::FETCH_ASSOC));

            return $resultado;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";
            print_r($e);
        }
    }

}

?>