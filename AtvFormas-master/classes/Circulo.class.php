<?php
require_once('Formas.class.php')
?>
<?php
    class Circulo extends Formas{
        private $raio;
        
        public function __construct($id, $ra, $cr, $idT){
            parent::__construct($id, $cr, $idT);
            $this->setRaio($ra);
        }

        public function getRaio(){ return $this->raio; }
        public function setRaio($ra){ $this->raio = $ra;}

        public function Area() {
            $area = pi() * pow($this->raio, 2);
            return $area;
        }


        public function Circunferencia() {
            $circ = 2 * pi() * $this->raio;
            return $circ;
        }

        public function Diametro() {
            $di = 2 * $this->raio;
            return $di;
        }

        public function insere(){
            $sql = 'INSERT INTO circulo (raio, cor, circ_idtab) 
            VALUES(:raio, :cor, :circ_idtab)';
            $parametros = array(":raio"=> $this->getRaio(),
                                ":cor"=> $this->getCor(),
                                ":circ_idtab"=> $this->getIdT());

            return parent::executaComando($sql, $parametros); 
        }

        public function editar(){
            $sql = 'UPDATE circulo SET raio = :raio, cor = :cor, circ_idtab = :circ_idtab WHERE id = :id';
            $parametros = array(":raio"=> $this->getRaio(),
                                ":cor"=> $this->getCor(),
                                ":circ_idtab"=> $this->getIdT(),
                                ":id"=> $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        public function excluir(){
            $sql ='DELETE FROM circulo WHERE id = :id';
            $parametros = array(":id" => $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        public static function listar($cnst = 0, $procurar = ""){
            $sql = "SELECT * FROM circulo";
            if ($cnst > 0)
                switch($cnst){
                    case(1): $sql .= " WHERE raio like :procurar"; $procurar .="%"; break;
                    case(2): $sql .= " WHERE raio like :procurar"; $procurar .="%"; break;
                    case(3): $sql .= " WHERE cor like :procurar"; $procurar .="%"; break;
                    case(4): $sql .= " WHERE circ_idtab = :procurar"; break;
                }

            $par = array();
            if ($cnst > 0)
                $par = array(':procurar'=>$procurar);
            return parent::buscar($sql, $par);
        }

        public function desenha(){
            $str = "<div style='border-radius: 50%; display: inline-block; width: ".$this->Diametro()."vw; 
            height: ".$this->Diametro()."vw; background: ".$this->getcor().";border: 5px solid".$this->getcor().";'></div><br>";
            return $str;
        }

        public function __toString(){
            $str = parent::__toString();
            $str .= "Raio: ".$this->getRaio().
            "<br>Área: ".round($this->Area(),2).
            "<br>Circunferência: ".round($this->Circunferencia(),2).
            "<br>Diâmetro: ".round($this->Diametro(),2);
            return $str;
        }
    }
?>