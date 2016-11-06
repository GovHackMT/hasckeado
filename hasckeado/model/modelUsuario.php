<?php

require_once "conexao.php";
require_once "vo/usuarioVO.php";

class ModelUsuario {

    public static $instance;

    public function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ModelUsuario();

        return self::$instance;
    }

    public function BuscarTodos() {
        try {
            $sql = "SELECT * FROM tipoSanguineo";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();

            $resultado = array();

            while ($row = $p_sql->fetch(PDO::FETCH_ASSOC)) {
                $vo = new TipoSanguineoVO($row);
                $resultado[] = $vo;
            }
            return $resultado;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";

            print_r($e);
        }
    }

    public function Inserir(usuarioVO $usuario) {
        try {
            $sql = "INSERT INTO usuario (     
            id,
            nome,
            email,
            senha,
            data_cadastro,
            data_atualizacao,
            situacao,
            tipo) 
            VALUES ( :id,
            :nome,
            :email,
            :senha,
            :data_cadastro,
            :data_atualizacao,
            :situacao,
            :tipo)";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":id", $usuario->getId());
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":email", $usuario->getEmail());
            $p_sql->bindValue(":senha", $usuario->getSenha());
            $p_sql->bindValue(":situacao", $usuario->getSituacao());
            $p_sql->bindValue(":tipo", $usuario->getTipo());
            $p_sql->bindValue(":data_cadastro", $usuario->getData_cadastro());
            $p_sql->bindValue(":data_atualizacao", $usuario->getData_atualizacao());


            return $p_sql->execute();
           
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";

            print_r($e);
        }
    }

}

?>