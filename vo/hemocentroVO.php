<?php

class HemocentroVO {

    private $id;
    private $nome;
    private $telefone;
    private $latitude;
    private $longitude;
    private $endereco;
    private $data_cadastro;
    private $data_atualizacao;
    private $id_usuario;
    private $status;

    public function __construct($row) {
        $this->setId($row['id']);
        $this->setNome($row['nome']);
        $this->setTelefone($row['telefone']);
        $this->setLatitude($row['latitude']);
        $this->setLongitude($row['longitude']);
        $this->setEndereco($row['endereco']);
        $this->setData_cadastro($row['data_cadastro']);
        $this->setData_atualizacao($row['data_atualizacao']);
        $this->setId_usuario($row['id_usuario']);
        $this->setStatus($row['status']);
    }

    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getLatitude() {
        return $this->latitude;
    }

    function getLongitude() {
        return $this->longitude;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getData_cadastro() {
        return $this->data_cadastro;
    }

    function getData_atualizacao() {
        return $this->data_atualizacao;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setData_cadastro($data_cadastro) {
        $this->data_cadastro = $data_cadastro;
    }

    function setData_atualizacao($data_atualizacao) {
        $this->data_atualizacao = $data_atualizacao;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

}

?>