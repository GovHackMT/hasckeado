<?php
require_once "conexao.php";
require_once "vo/tipoSanguineoVO.php";

class ModelTipoSanguineo {

    public static $instance;

    public function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ModelTipoSanguineo();

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
                $resultado[] =  $vo;
            }
            return $resultado;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
            um LOG do mesmo, tente novamente mais tarde.";
           // GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
        }
    }
}

?>