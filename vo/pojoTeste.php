<?php
class PojoTeste {
    private $id;
    private $nome;

    public function __construct($row){
        $this->setId($row['id']);
        $this->setNome($row['nome']);
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
}

?>