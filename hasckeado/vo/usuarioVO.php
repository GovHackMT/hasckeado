<?php

class UsuarioVO {

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $data_cadastro;
    private $data_atualizacao;
    private $situacao;
    private $tipo;

    public function __construct($row) {
        $this->setId($row['id']);
        $this->setNome($row['nome']);
        $this->setEmail($row['email']);
        $this->setData_cadastro($row['data_cadastro']);
        $this->setData_atualizacao($row['data_atualizacao']);
        $this->setSituacao($row['situacao']);
         $this->setTipo($row['tipo']);
         $this->setSituacao($row['situacao']);
        $this->setSenha(md5($row['senha']));
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getData_cadastro() {
        return $this->data_cadastro;
    }

    function getData_atualizacao() {
        return $this->data_atualizacao;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setData_cadastro($data_cadastro) {
        $this->data_cadastro = $data_cadastro;
    }

    function setData_atualizacao($data_atualizacao) {
        $this->data_atualizacao = $data_atualizacao;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

}

?>