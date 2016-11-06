<?php
class TipoSanguineoVO {
    private $id;
    private $descricao;

    public function __construct($row){
        $this->setId($row['id']);
        $this->setDescricao($row['descricao']);
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
}
?>