<?php
    class Usuario{
        private $idUsuario;
        private $nome;
        private $user;
        private $senha;
        
        public function __construct($id, $nm, $us, $sn){
            
            $this->setId($id);
            $this->setNome($nm);
            $this->setUser($us);
            $this->setSenha($sn);
        }

        public function getId(){ return $this->idUsuario; }
        public function setId($id){ $this->idUsuario = $id;}

        public function getNome(){ return $this->nome; }
        public function setNome($nm){ $this->nome = $nm;}

        public function getUser(){ return $this->user; }
        public function setUser($us){ $this->user = $us; }
        
        public function getSenha(){ return $this->senha; }
        public function setSenha($sn){ $this->senha = $sn;}

        public static function insere($nome, $user, $senha){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO usuario (nome, user, senha) 
            VALUES(:nome, :user, :senha)');

            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':user', $user);
            $stmt->bindValue(':senha', $senha);

            return $stmt->execute(); 
        }

        public static function editar($idUsuario, $nome, $user, $senha){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('UPDATE usuario SET nome = :nome, user = :user, senha = :senha
            WHERE idUsuario = :idUsuario');

            $stmt->bindValue(':idUsuario', $idUsuario);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':user', $user);
            $stmt->bindValue(':senha', $senha);

            return $stmt->execute();
        }

        public static function excluir($idUsuario){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM usuario WHERE idUsuario = :idUsuario');
            $stmt->bindValue(':idUsuario', $idUsuario);
            
            return $stmt->execute();
        }

        public static function listar($cnst = 0, $procurar = ""){
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM usuario";
            if ($cnst > 0)
                switch($cnst){
                    case(1): $sql .= " WHERE idUsuario like :procurar;"; $procurar .="%"; break;
                    case(2): $sql .= " WHERE nome like :procurar"; $procurar .="%"; break;
                    case(3): $sql .= " WHERE user like :procurar"; $procurar .="%"; break;
                    case(3): $sql .= " WHERE user like :procurar"; $procurar .="%"; break;
                }
            $stmt = $pdo->prepare($sql);
            if ($cnst > 0)
                $stmt->bindValue(':procurar', $procurar, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public static function efetuaLogin($us, $sn){
            $pdo = Conexao::getInstance();
            $sql = "SELECT nome FROM usuario WHERE user = '$us' AND senha = '$sn';";
            $resultado = $pdo->query($sql)->fetchAll();
            if($resultado){
                $_SESSION['nome'] = $resultado[0]['nome'];
                return true;
            } else {
                $_SESSION['nome'] = null;
                return false;
            }
        
        }

        public function __toString(){
            return "[Usuário]<br>Nome: ".$this->getNome().
            "<br>user: ".$this->getUser().
            "<br>Senha: ".$this->getSenha();
        }
    }
?>