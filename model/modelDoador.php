<?php

require_once __DIR__ . "/../conexao.php";
require_once __DIR__ . "/../vo/doadorVO.php";

//require_once __DIR__ ."/../vo/tipoSanguineoVO";

class ModelDoador {

    public static $instance;

    public function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ModelDoador();

        return self::$instance;
    }

    public function BuscarTodos() {
        try {
            $sql = "SELECT * FROM doador";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();

            $resultado = array();

            while ($row = $p_sql->fetch(PDO::FETCH_ASSOC)) {
                $vo = new DoadorVO($row);
                $resultado[] = $vo;
            }
            return $resultado;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";

            print_r($e);
        }
    }

    public function BuscarTodosView() {
        try {
            $sql = "SELECT d.*, t.descricao as tipoSanguineo 
                FROM doador d
                inner join tiposanguineo t on t.id = d.tipoSanguineoID 
                order by d.nome";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();

            $resultado = array();

            while ($row = $p_sql->fetch(PDO::FETCH_ASSOC)) {
                // $vo = new DoadorVO($row);
                $resultado[] = $row;
            }
            return $resultado;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";

            print_r($e);
        }
    }

    public function BuscarTodasDoacoes($id_doador) {
        try {
            $sql = "SELECT d.*, h.nome as hemocentro FROM doacao d
                    inner join campanha c on c.id = d.id_campanha
                    inner join hemocentro h on h.id = c.id_hemocentro
                    where id_doador = :id_doador 
                    order by data desc";
            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":id_doador", $id_doador);

            $p_sql->execute();

            $resultado = array();

            while ($row = $p_sql->fetch(PDO::FETCH_ASSOC)) {
//                $vo = new DoadorVO($row);
                $resultado[] = $row;
            }
            return $resultado;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";

            print_r($e);
        }
    }

    public function Inserir(DoadorVO $doador) {
        try {
            $sql = "INSERT INTO doador (     
            id,
            nome,
            email,
            endereco,
            tipoSanguineoID
            ) 
            VALUES ( :id,
            :nome,
            :email,
            :endereco,
            :tipoSanguineoID
         )";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":id", $doador->getId());
            $p_sql->bindValue(":nome", $doador->getNome());
            $p_sql->bindValue(":email", $doador->getEmail());
            $p_sql->bindValue(":endereco", $doador->getEndereco());
            $p_sql->bindValue(":tipoSanguineoID", $doador->getTipoSanguineo());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";

            print_r($e);
        }
    }

}

?>