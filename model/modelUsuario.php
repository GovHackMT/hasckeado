<?php

require_once __DIR__ . "/../conexao.php";
require_once __DIR__ . "/../vo/usuarioVO.php";

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

    public function BuscarPorEmail($email) {
         try {
            $sql = "SELECT * FROM usuario 
                    WHERE email = :email
                    limit 1";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":email", $email);
            $p_sql->execute();

            $resultado = new UsuarioVO($p_sql->fetch(PDO::FETCH_ASSOC));

            if ($resultado->getId() == null)
                return null;

            return $resultado;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";
            print_r($e);
        }
    }

    public function BuscarPorHemocentro($idHemocentro) {

        try {
            $sql = "SELECT u.* FROM usuario u
                    inner join usuario_hemocentro uh on u.id = uh.id_usuario
                    WHERE uh.id_hemocentro= :id_hemocentro
                    and uh.status = 1
                    limit 1";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id_hemocentro", $idHemocentro);
            $p_sql->execute();

            $resultado = new UsuarioVO($p_sql->fetch(PDO::FETCH_ASSOC));

            if ($resultado->getId() == null)
                return null;

            return $resultado;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";
            print_r($e);
        }
    }

    public function removerAdmHemocentro($id_usuario, $id_hemocentro) {
        try {
            $sql = "UPDATE usuario_hemocentro set
                        data_atualizacao = now(),
                        status = 0
                    WHERE  id_usuario = :id_usuario and
                        id_hemocentro = :id_hemocentro and
                        status = 1";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":id_usuario", $id_usuario);
            $p_sql->bindValue(":id_hemocentro", $id_hemocentro);

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";
            print_r($e);
        }
    }

    public function adicionarAdmHemocentro($id_usuario, $id_hemocentro) {
        try {
            $sql = "INSERT INTO usuario_hemocentro (
                id, 
                id_usuario, 
                id_hemocentro,
                data_cadastro, 
                status, 
                data_atualizacao)
                VALUES(
                :id,
                :id_usuario,
                :id_hemocentro,
                now(),
                :status,
                :data_atualizacao)";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":id", null);
            $p_sql->bindValue(":id_usuario", $id_usuario);
            $p_sql->bindValue(":id_hemocentro", $id_hemocentro);
            $p_sql->bindValue(":data_atualizacao", null);
            $p_sql->bindValue(":status", 1);
            var_dump($p_sql);
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";
            print_r($e);
        }
    }

}

?>