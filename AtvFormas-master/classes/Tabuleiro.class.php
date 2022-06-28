<?php
    class Tabuleiro{
        private $idTabuleiro;
        private $lado;
        
        public function __construct($id, $ld){
            
            $this->setId($id);
            $this->setLado($ld);
        }

        public function getId(){ return $this->idTabuleiro; }
        public function setId($id){ $this->idTabuleiro = $id;}

        public function getLado(){ return $this->lado; }
        public function setLado($ld){ $this->lado = $ld;}
        

        public function area(){
            return $this->lado * $this->lado;
        }

        public function perimetro(){
            return $this->lado * 4;
        }

        public static function insere($lado){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO tabuleiro (lado) 
            VALUES(:lado)');

            $stmt->bindValue(':lado', $lado);

            return $stmt->execute(); 
        }

        public static function editar($idTabuleiro, $lado){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('UPDATE tabuleiro SET lado = :lado
            WHERE idTabuleiro = :idTabuleiro');

            $stmt->bindValue(':idTabuleiro', $idTabuleiro);
            $stmt->bindValue(':lado', $lado);

            return $stmt->execute();
        }

        public  static function excluir($idTabuleiro){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM tabuleiro WHERE idTabuleiro = :idTabuleiro');
            $stmt->bindValue(':idTabuleiro', $idTabuleiro);
            
            return $stmt->execute();
        }

        public static function listar($cnst = 0, $procurar = ""){
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM tabuleiro";
            if ($cnst > 0)
                switch($cnst){
                    case(1): $sql .= " WHERE idTabuleiro like :procurar"; $procurar .="%"; break;
                    case(2): $sql .= " WHERE lado like :procurar"; $procurar .="%"; break;
                }
            $stmt = $pdo->prepare($sql);
            if ($cnst > 0)
                $stmt->bindValue(':procurar', $procurar, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function buscar($id){
            require_once("conf/Conexao.php");

            $conexao = Conexao::getInstance();

            $query = 'SELECT * FROM tabuleiro';
            if($id > 0){
                $query .= ' WHERE idTabuleiro = :Id';
                $stmt->bindParam(':Id', $id);
            }
                $stmt = $conexao->prepare($query);
                if($stmt->execute())
                    return $stmt->fetchAll();
        
                return false;
        }

        public function desenha(){
            $x = "<div style='height: ".$this->getLado()."vw; width: ".$this->getLado()."vw; background-color: #e5ddee; border: 5px solid #b4a0cd'></div>";
            return $x;
        }

        public function __toString(){
            return "<br>[Tabuleiro]<br>Lado: ".$this->getLado().
            "<br>Área: ".$this->area().
            "<br>Perímetro: ".$this->perimetro();
        }
    }
?>