<?php
// Classe que define o que é comum para todas as formas (Classe pai)
require_once('Database.class.php');

abstract class Formas extends Database{
        private $id;
        private $cor;
        private $tabuleiro;
        private static $contador = 0;
        
        public function __construct($id, $cr, $idT){
            $this->setId($id);
            $this->setCor($cr);
            $this->setIdT($idT);
            self::$contador = self::$contador + 1;
        }

        public function getId(){ return $this->id; }
        public function setId($id){ $this->id = $id;}

        public function getCor(){ return $this->cor; }
        public function setCor($cr){ $this->cor = $cr; }
        
        public function getIdT(){ return $this->tabuleiro; }
        public function setIdT($idT){ $this->tabuleiro = $idT;}

        public abstract function desenha();
        public abstract function area();
        public abstract function insere();
        public abstract function editar();
        public abstract function excluir();
        public abstract static function listar($cnst = 0, $procurar = "");

        public function __toString(){
            return "<br>Id: ".$this->getId().
            "<br>Cor: ".$this->getCor().
            "<br>Id Tabuleiro: ".$this->getIdT().
            "<br>Contador: ".self::$contador;
        }
    }
?>