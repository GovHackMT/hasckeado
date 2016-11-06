<?php

require_once "../conexao.php";
require_once "../vo/usuarioVO.php";

class ModelHemocentro {

    public static $instance;

    public function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ModelHemocentro();

        return self::$instance;
    }

    public function BuscarTodos() {
        try {
            $sql = "SELECT * FROM hemocentro order by nome";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();

            $resultado = array();

            while ($row = $p_sql->fetch(PDO::FETCH_ASSOC)) {
                $vo = new HemocentroVO($row);
                $resultado[] = $vo;
            }
            return $resultado;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";

            print_r($e);
        }
    }

    public function BuscarPorId($id) {

        try {
            $sql = "SELECT * FROM hemocentro WHERE id = :id limit 1";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            $resultado = new HemocentroVO($p_sql->fetch(PDO::FETCH_ASSOC));

            return $resultado;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";
            print_r($e);
        }
    }

    public function Inserir(HemocentroVO $hemocentro) {
        try {
            $sql = "INSERT INTO hemocentro (     
               id,
               nome,
               telefone,
               latitude,
               longitude,
               endereco,
               data_cadastro,
               data_atualizacao,
               id_usuario,
               status) 
            VALUES ( 
                :id,
                :nome,
                :telefone,
                :latitude,
                :longitude,
                :endereco,
                :data_cadastro,
                :data_atualizacao,
                :id_usuario,
                :status)";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":id", $hemocentro->getId());
            $p_sql->bindValue(":nome", $hemocentro->getNome());
            $p_sql->bindValue(":telefone", $hemocentro->getTelefone());
            $p_sql->bindValue(":latitude", $hemocentro->getLatitude());
            $p_sql->bindValue(":longitude", $hemocentro->getLongitude());
            $p_sql->bindValue(":endereco", $hemocentro->getEndereco());
            $p_sql->bindValue(":data_cadastro", $hemocentro->getData_cadastro());
            $p_sql->bindValue(":data_atualizacao", $hemocentro->getData_atualizacao());
            $p_sql->bindValue(":id_usuario", $hemocentro->getId_usuario());
            $p_sql->bindValue(":status", $hemocentro->getStatus());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";

            print_r($e);
        }
    }
    
    public function Atualizar(HemocentroVO $hemocentro) {
           try {
            $sql = "UPDATE hemocentro set
                        nome = :nome,
                        telefone = :telefone,
                        latitude = :latitude,
                        longitude = :longitude,
                        endereco = :endereco,
                        data_cadastro = :data_cadastro,
                        data_atualizacao = now(),
                        id_usuario = :id_usuario,
                        status = :status
                    WHERE id = :id";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":id", $hemocentro->getId());
            $p_sql->bindValue(":nome", $hemocentro->getNome());
            $p_sql->bindValue(":telefone", $hemocentro->getTelefone());
            $p_sql->bindValue(":latitude", $hemocentro->getLatitude());
            $p_sql->bindValue(":longitude", $hemocentro->getLongitude());
            $p_sql->bindValue(":endereco", $hemocentro->getEndereco());
            $p_sql->bindValue(":data_cadastro", $hemocentro->getData_cadastro());
            $p_sql->bindValue(":id_usuario", $hemocentro->getId_usuario());
            $p_sql->bindValue(":status", $hemocentro->getStatus());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";
            print_r($e);
        }
    }

}

?>