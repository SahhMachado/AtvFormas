<?php
require_once('Formas.class.php')
?>
<?php
    class Quadrado extends Formas{
        private $lado;
        
        public function __construct($id, $ld, $cr, $idT){
            parent::__construct($id, $cr, $idT);
            $this->setLado($ld);
        }

        public function getLado(){ return $this->lado; }
        public function setLado($ld){ $this->lado = $ld;}

        public function area(){
            return $this->lado * $this->lado;
        }

        public function perimetro(){
            return $this->lado * 4;
        }

        public function diagonal(){
            return $this->lado * 1.4;
        }

        public function insere(){
            $sql = 'INSERT INTO quadrado (lado, cor, quad_idTabuleiro) 
            VALUES(:lado, :cor, :quad_idTabuleiro)';
            $parametros = array(":lado"=> $this->getLado(),
                                ":cor"=> $this->getCor(),
                                ":quad_idTabuleiro"=> $this->getIdT());

            return parent::executaComando($sql, $parametros); 
        }

        public function editar(){
            $sql = 'UPDATE quadrado SET lado = :lado, cor = :cor, quad_idTabuleiro = :quad_idTabuleiro WHERE id = :id';
            $parametros = array(":lado"=> $this->getLado(),
                                ":cor"=> $this->getCor(),
                                ":quad_idTabuleiro"=> $this->getIdT(),
                                ":id"=> $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        public function excluir(){
            $sql ='DELETE FROM quadrado WHERE id = :id';
            $parametros = array(":id" => $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        public static function listar($cnst = 0, $procurar = ""){
            $sql = "SELECT * FROM quadrado";
            if ($cnst > 0)
                switch($cnst){
                    case(1): $sql .= " WHERE id like :procurar"; $procurar .= "%";break;
                    case(2): $sql .= " WHERE lado like :procurar"; $procurar .="%"; break;
                    case(3): $sql .= " WHERE cor like :procurar"; $procurar .="%"; break;
                    case(4): $sql .= " WHERE quad_idTabuleiro = :procurar"; break;
                }

            $par = array();
            if ($cnst > 0)
                $par = array(':procurar'=>$procurar);
            return parent::buscar($sql, $par);
        }

        public function desenha(){
            $x = "<div style='height: ".$this->getLado()."vw; width: ".$this->getLado()."vw; background-color:".$this->getCor().";'></div>";
            return $x;
        }

        public function __toString(){
            $str = parent::__toString();
            $str .= "Lado: ".$this->getLado().
            "<br>Área: ".$this->area().
            "<br>Perímetro: ".$this->perimetro().
            "<br>Diagonal: ".$this->diagonal();
            return $str;
        }
    }
?>