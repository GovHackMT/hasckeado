<?php

class campanhaVo{

  private $id;
  private $nome;
  private $descricao;
  private $dataInicio;
  private $dataFim;
  private $id_hemocentro;

  public function __construct($row) {
      $this->setId($row['id']);
      $this->setNome($row['nome']);
      $this->setDescricao($row['descricao']);
      $this->setDataInicio($row['dataInicio']);
      $this->setDataFim($row['dataFim']);
      $this->setId_hemocentro($row['id_hemocentro']);
  }

  function getId(){
    return $this->id;
  }

  function getNome(){
    return $this->nome;
  }

  function getDescricao(){
    return $this->descricao;
  }

  function getDataInicio(){
    return $this->dataInicio;
  }

  function getDataFim(){
    return $this->dataFim;
  }

  function getId_hemocentro(){
    return $this->id_hemocentro;
  }

  function setId($id){
    $this->id = $id;
  }

  function setNome($nome) {
    $this->nome = $nome;
  }

  function setDescricao($descricao){
    $this->descricao = $descricao;
  }

  function setDataInicio($dataInicio){
    $this->dataInicio = $dataInicio;
  }

  function setDataFim($dataFim){
    $this->dataFim = $dataFim;
  }

  function setId_hemocentro($id_hemocentro){
    $this->id_hemocentro = $id_hemocentro;
  }

}

 ?>
