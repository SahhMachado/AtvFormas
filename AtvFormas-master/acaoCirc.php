<?php  
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";
require_once("classes/Circulo.class.php");

$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $quad = new Circulo($id, $_POST['raio'], $_POST['cor'], $_POST['circ_idtab']);     
        $quad->excluir();
        header("location:showCirc.php");
    }

$acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";

        try{
        if ($id == 0){
            $quad = new Circulo("", $_POST['raio'], $_POST['cor'], $_POST['circ_idtab']);     
            $quad->insere();
            header("location:showCirc.php");
        }else {
            $quad = new Circulo($_POST['id'], $_POST['raio'], $_POST['cor'], $_POST['circ_idtab']);
            $quad->editar();
        }    
        header("location:showCirc.php");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar o Círculo.<h1>
        <br> Erro: <br>".$e->getMessage();
    }     
}

function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM circulo WHERE id = $id");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['raio'] = $linha['raio'];
        $dados['cor'] = $linha['cor'];
        $dados['circ_idtab'] = $linha['circ_idtab'];
    }
    return $dados;
}
?>