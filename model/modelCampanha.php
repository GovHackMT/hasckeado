<?php

require_once "../conexao.php";
require_once "../vo/campanhaVo.php";

Class modelCampanha{

  public static $instance;

  public function __construct() {
    //
  }

  public static function getInstance(){
    if (!isset(self::$instance))
    self::$instance = new modelCampanha();

    return self::$instance;
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
    try{
      $sql = "INSERT INTO campanha (
        id,
        nome,
        descricao,
        dataInicio,
        dataFim,
        id_hemocentro)
        VALUES (
          :id,
          :nome,
          :descricao,
          :dataInicio,
          :dataFim,
          :id_hemocentro)";

          $p_sql = Conexao::getInstance()->prepare($sql);

          $p_sql->bindValue(":id", $campanha->getId());
          $p_sql->bindValue(":nome", $campanha->getNome());
          $p_sql->bindValue(":descricao", $campanha->getDescricao());
          $p_sql->bindValue(":dataInicio", $campanha->getDataInicio());
          $p_sql->bindValue(":dataFim", $campanha->getDataFim());
          $p_sql->bindValue(":id_hemocentro", $campanha->getId_hemocentro());


          return $p_sql->execute();
        } catch (Exception $e) {
          print "Ocorreu um erro ao tentar executar esta ação, foi gerado
          um LOG do mesmo, tente novamente mais tarde.";

          print_r($e);
        }
      }

      public function Atualizar(campanhaVo $campanha) {
        try{
          $sql = "UPDATE campanha SET
          nome = :nome,
          descricao = :descricao,
          dataInicio = :dataInicio,
          dataFim = :dataFim,
          id_hemocentro = :id_hemocentro
          WHERE id = :id";

          $p_sql = Conexao::getInstance()->prepare($sql);

          $p_sql->bindValue(":id", $campanha->getId());
          $p_sql->bindValue(":nome", $campanha->getNome());
          $p_sql->bindValue(":descricao", $campanha->getDescricao());
          $p_sql->bindValue(":dataInicio", $campanha->getDataInicio());
          $p_sql->bindValue(":dataFim", $campanha->getDataFim());
          $p_sql->bindValue(":id_hemocentro", $campanha->getId_hemocentro());


          return $p_sql->execute();
        } catch (Exception $e) {
          print "Ocorreu um erro ao tentar executar esta ação, foi gerado
          um LOG do mesmo, tente novamente mais tarde.";

          print_r($e);
        }
      }

  }


    ?>
