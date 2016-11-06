<?php

class DoadorVO {

    private $id;
    private $nome;
    private $email;
    private $endereco;
    private $tipoSanguineo;

    public function __construct($row) {
        $this->setId($row['id']);
        $this->setNome($row['nome']);
        $this->setEmail($row['email']);
        $this->setEndereco($row['endereco']);
        $this->setTipoSanguineo($row['tipoSanguineo']);
        
    }
    
    function getTipoSanguineo() {
        return $this->tipoSanguineo;
    }

    function setTipoSanguineo($tipoSanguineo) {
        $this->tipoSanguineo = $tipoSanguineo;
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


}

?>