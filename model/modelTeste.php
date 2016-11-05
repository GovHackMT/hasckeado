<?php
require_once "conexao.php";
require_once "geralog.php";
require_once "pojo/pojoTeste.php";

class ModelTeste {

    public static $instance;

    public function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ModelTeste();

        return self::$instance;
    }

    public function Inserir(Pojoteste $teste) {
        try {
            $sql = "INSERT INTO teste (		
            id,
            nome) 
            VALUES ( null,
            :nome,
            :email)";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":nome", $teste->getNome());


            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . 
                $e->getCode() . " Mensagem: " . $e->getMessage());
        }
    }

    public function Editar(Pojoteste $teste) {
        try {
            $sql = "UPDATE teste set
            nome = :nome WHERE id = :id";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":nome", $teste->getNome());
            $p_sql->bindValue(":cod_teste", $teste->getId());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
                getCode() . " Mensagem: " . $e->getMessage());
        }
    }

    public function Deletar($id) {
        try {
            $sql = "DELETE FROM teste WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
                getCode() . " Mensagem: " . $e->getMessage());
        }
    }

    public function BuscarPorID($id) {
        try {
            $sql = "SELECT * FROM teste WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            $p_sql->execute();
            $resultado = new PojoTeste($p_sql->fetch(PDO::FETCH_ASSOC));
            
            return $resultado;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
                getCode() . " Mensagem: " . $e->getMessage());
        }
    }

    public function BuscarTodos() {
        try {
            $sql = "SELECT * FROM teste";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();

            $resultado[] = array();

            while ($row = $p_sql->fetch(PDO::FETCH_ASSOC)) {
                $pojo = new PojoTeste($row);
                $resultado[] =  $pojo;
            }
            return $resultado;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
                getCode() . " Mensagem: " . $e->getMessage());
        }
    }
}

?>