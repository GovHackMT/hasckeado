<?php

require_once "../conexao.php";
require_once "../vo/campanhaVo.php";

Class modelCampanha {

    public static $instance;

    public function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new modelCampanha();

        return self::$instance;
    }

    public function BuscarTodosPorUsuario($id) {
        try {
            $sql = "select distinct c.id, c.nome campanha, c.descricao, c.dataInicio, c.dataFim, h.nome as hemocentro from campanha c
                        inner join hemocentro h on h.id = c.id_hemocentro 
                        inner join usuario_hemocentro uh on uh.id_hemocentro = h.id
                        where uh.id_usuario = :id_usuario 
                        order by c.dataInicio, c.dataFim, c.nome desc";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id_usuario", $id);
            $p_sql->execute();

            while ($row = $p_sql->fetch(PDO::FETCH_ASSOC)) {
                $resultado[] = $row;
            }
            return $resultado;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
      um LOG do mesmo, tente novamente mais tarde.";
            print_r($e);
        }
    }

    public function BuscarTodos() {
        try {
            $sql = "SELECT * FROM campanha order by id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();

            $resultado = array();

            while ($row = $p_sql->fetch(PDO::FETCH_ASSOC)) {
                $vo = new campanhaVo($row);
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
            $sql = "SELECT * FROM campanha WHERE id = :id limit 1";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            $resultado = new campanhaVo($p_sql->fetch(PDO::FETCH_ASSOC));

            return $resultado;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
      um LOG do mesmo, tente novamente mais tarde.";
            print_r($e);
        }
    }

    public function Inserir(campanhaVo $campanha) {
        try {
            $sql = "INSERT INTO campanha (
        id,
        nome,
        descricao,
        dataInicio,
        dataFim,
        id_hemocentro,
        meta_doador)
        VALUES (
          :id,
          :nome,
          :descricao,
          :dataInicio,
          :dataFim,
          :id_hemocentro,
          :meta_doador)";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":id", $campanha->getId());
            $p_sql->bindValue(":nome", $campanha->getNome());
            $p_sql->bindValue(":descricao", $campanha->getDescricao());
            $p_sql->bindValue(":dataInicio", $campanha->getDataInicio());
            $p_sql->bindValue(":dataFim", $campanha->getDataFim());
            $p_sql->bindValue(":id_hemocentro", $campanha->getId_hemocentro());
            $p_sql->bindValue(":meta_doador", $campanha->getMeta_doador());


            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
          um LOG do mesmo, tente novamente mais tarde.";

            print_r($e);
        }
    }

    public function Atualizar(campanhaVo $campanha) {
        try {
            $sql = "UPDATE campanha SET
          nome = :nome,
          descricao = :descricao,
          dataInicio = :dataInicio,
          dataFim = :dataFim,
          id_hemocentro = :id_hemocentro,
          meta_doador = :meta_doador
          WHERE id = :id";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":id", $campanha->getId());
            $p_sql->bindValue(":nome", $campanha->getNome());
            $p_sql->bindValue(":descricao", $campanha->getDescricao());
            $p_sql->bindValue(":dataInicio", $campanha->getDataInicio());
            $p_sql->bindValue(":dataFim", $campanha->getDataFim());
            $p_sql->bindValue(":id_hemocentro", $campanha->getId_hemocentro());
            $p_sql->bindValue(":meta_doador", $campanha->getMeta_doador());


            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
          um LOG do mesmo, tente novamente mais tarde.";

            print_r($e);
        }
    }

}

?>
