<?php
require_once('Formas.class.php')
?>
<?php
    class Triangulo extends Formas{
        private $base;
        private $lado1;
        private $lado2;
        
        public function __construct($id, $bs, $ld1, $ld2, $cr, $idT){
            parent::__construct($id, $cr, $idT);
            $this->setBase($bs);
            $this->setLado1($ld1);
            $this->setLado2($ld2);
        }

        public function getBase(){ return $this->base; }
        public function setBase($bs){ $this->base = $bs;}

        public function getLado1(){ return $this->lado1; }
        public function setLado1($ld1){ $this->lado1 = $ld1;}

        public function getLado2(){ return $this->lado2; }
        public function setLado2($ld2){ $this->lado2 = $ld2;}

        public function Area() {
            $area = sqrt(($this->base+$this->lado1+$this->lado2)*(-$this->base+$this->lado1+$this->lado2)*($this->base-$this->lado1+$this->lado2)
            *($this->base+$this->lado1-$this->lado2))/4;
            return $area;
        }

        public function insere(){
            $sql = 'INSERT INTO triangulo (base, lado1, lado2, cor, tri_idtabuleiro) 
            VALUES(:base, :lado1, :lado2, :cor, :tri_idtabuleiro)';
            $parametros = array(":base"=> $this->getBase(),
                                ":lado1"=> $this->getLado1(),
                                ":lado2"=> $this->getLado2(),
                                ":cor"=> $this->getCor(),
                                ":tri_idtabuleiro"=> $this->getIdT());

            return parent::executaComando($sql, $parametros); 
        }

        public function editar(){
            $sql = 'UPDATE triangulo SET base = :base, lado1 = :lado1, lado2 = :lado2, 
            cor = :cor,  tri_idtabuleiro =  :tri_idtabuleiro WHERE id = :id';
            $parametros = array(":base"=> $this->getBase(),
                                ":lado1"=> $this->getLado1(),
                                ":lado2"=> $this->getLado2(),
                                ":cor"=> $this->getCor(),
                                ":tri_idtabuleiro"=> $this->getIdT(),
                                ":id"=> $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        
        public function excluir(){
            $sql ='DELETE FROM triangulo WHERE id = :id';
            $parametros = array(":id" => $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        public static function listar($cnst = 0, $procurar = ""){
            $sql = "SELECT * FROM triangulo";
            if ($cnst > 0)
                switch($cnst){
                    case(1): $sql .= " WHERE id like :procurar"; $procurar .="%"; break;
                    case(2): $sql .= " WHERE cor like :procurar"; $procurar .="%"; break;
                    case(3): $sql .= " WHERE tri_idtabuleiro like :procurar"; $procurar .="%"; break;

                }
            
            $par = array();
            if ($cnst > 0)
                $par = array(':procurar'=>$procurar);
            return parent::buscar($sql, $par);
        }

        public function desenha(){
            $str = "<div style='width: 0px; height: 0px; border-left: ".$this->lado1."vw solid transparent; border-right: "
            .$this->lado2."vw solid transparent; border-bottom: ".$this->base."vw solid ".parent::getCor().";'></div><br>";
            return $str;
        }
        
        public function Tipo(){
            if ($this->getBase() == $this->getLado1() && $this->getLado1() == $this->getLado2()) {
                return "Equilátero";
            }
            elseif ($this->getBase() != $this->getLado1() && $this->getBase() != $this->getLado2() 
            && $this->getLado1() != $this->getLado2()) {
                return "Escaleno";
            }
            else{
                return "Isóceles";
            }
        }

        public function __toString(){
           $str = parent::__toString();
           $str .= "<br>Base:".$this->getBase().
           "<br>Lado 1:".$this->getLado1().
           "<br>Lado 2:".$this->getLado2().
           "<br>Área: ".round($this->Area(),2).
           "<br>Classificação:".$this->Tipo();
           return $str;
        }
    }
?>