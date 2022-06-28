<?php
require_once('Formas.class.php')
?>
<?php
    class Retangulo extends Formas{
        private $altura;
        private $base;
        
        public function __construct($id, $alt, $bs, $cr, $idT){
            parent::__construct($id, $cr, $idT);
            $this->setAlt($alt);
            $this->setBase($bs);
        }

        public function getAlt(){ return $this->altura; }
        public function setAlt($alt){ $this->altura = $alt;}

        public function getBase(){ return $this->base; }
        public function setBase($bs){ $this->base = $bs;}

        public function Area() {
            $area = $this->base * $this->altura;
            return $area;
        }

        public function insere(){
            $sql = 'INSERT INTO quad.retangulo (altura, base, cor, ret_idtab) 
            VALUES(:altura, :base, :cor, :ret_idtab)';
            $parametros = array(":altura"=>$this->getAlt(), 
                                ":base"=>$this->getBase(), 
                                ":cor"=>$this->getCor(),
                                ":ret_idtab"=>$this->getIdT());
            return parent::executaComando($sql,$parametros);
        }

        public function excluir(){
            $sql = 'DELETE FROM quad.retangulo WHERE id = :id';
            $parametros = array(":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public function editar(){
            $sql = 'UPDATE quad.retangulo 
            SET altura = :altura, base = :base, cor = :cor, ret_idtab = :ret_idtab
            WHERE id = :id';
            $parametros = array(":altura"=>$this->getAlt(),
                                ":base"=>$this->getBase(),
                                ":cor"=>$this->getCor(),
                                ":ret_idtab"=>$this->getIdT(),
                                ":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public static function listar($cnst = 0, $procurar = ""){
            $sql = "SELECT * FROM retangulo";
            if ($cnst > 0)
                switch($cnst){
                    case(1): $sql .= " WHERE id like :procurar"; $procurar .= "%";break;
                    case(2): $sql .= " WHERE altura like :procurar"; $procurar .= "%";break;
                    case(3): $sql .= " WHERE base like :procurar"; $procurar .= "%";break;
                    case(4): $sql .= " WHERE cor like :procurar"; $procurar .= "%";break;
                    case(5): $sql .= " WHERE ret_idtab like :procurar"; $procurar .= "%";break;
                }

            $par = array();
            if ($cnst > 0)
                $par = array(':procurar'=>$procurar);
            return parent::buscar($sql, $par);
        }

        public function desenha(){
            $str = "<div style='width: ".$this->getBase()."vw; height: ".$this->getAlt()."vw; 
            background: ".$this->getcor().";border: 1px solid".$this->getcor().";'></div><br>";
            return $str;
        }


        public function __toString(){
           $str = parent::__toString();
           $str .= "<br>Altura:".$this->getAlt().
           "<br>Base:".$this->getBase().
           "<br>Área: ".round($this->Area(),2);
           return $str;
        }
    }
?>