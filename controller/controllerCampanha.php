<?php

require_once "../model/modelCampanha.php";
require_once "../vo/campanhaVo.php";

class controllerCampanha{

  public function __construct() {

  }

  public function BuscarTodos() {
      return modelCampanha::getInstance()->BuscarTodos();
  }

  public function BuscarPorId($id) {
      return modelCampanha::getInstance()->BuscarPorId($id);
  }
  
  public function BuscarTodosPorUsuario($id) {
      return modelCampanha::getInstance()->BuscarTodosPorUsuario($id);
  }
    

  public function Atualizar(campanhaVo $campanha) {
      return modelCampanha::getInstance()->Atualizar($campanha);
  }

  public function Inserir(campanhaVo $campanha) {
      return modelCampanha::getInstance()->Inserir($campanha);
  }

}

 ?>
