<?php

class DoadorVO {

    private $id;
    private $nome;
    private $email;
    private $endereco;
    private $tipoSanguineoID;
    private $dataUltimaDoacao;

    public function __construct($row) {
        $this->setId($row['id']);
        $this->setNome($row['nome']);
        $this->setEmail($row['email']);
        $this->setEndereco($row['endereco']);
        $this->setTipoSanguineoID($row['tipoSanguineoID']);
        $this->setDataUltimaDoacao($row['dataUltimaDoacao']);
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

    function getEndereco() {
        return $this->endereco;
    }

    function getTipoSanguineoID() {
        return $this->tipoSanguineoID;
    }

    function getDataUltimaDoacao() {
        return $this->dataUltimaDoacao;
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

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setTipoSanguineoID($tipoSanguineoID) {
        $this->tipoSanguineoID = $tipoSanguineoID;
    }

    function setDataUltimaDoacao($dataUltimaDoacao) {
        $this->dataUltimaDoacao = $dataUltimaDoacao;
    }

}

?>