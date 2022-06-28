<?php  
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";
require_once("classes/Quadrado.class.php");

$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $quad = new Quadrado($id, $_POST['lado'], $_POST['cor'], $_POST['quad_idTabuleiro']);     
        $quad->excluir();
        header("location:show.php");
    }

$acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";

        try{
        if ($id == 0){
            $quad = new Quadrado("", $_POST['lado'], $_POST['cor'], $_POST['quad_idTabuleiro']);     
            $quad->insere();
            header("location:show.php");
        }else {
            $quad = new Quadrado($_POST['id'], $_POST['lado'], $_POST['cor'], $_POST['quad_idTabuleiro']);
            $quad->editar();
        }    
        header("location:show.php");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar o Quadrado.<h1>
        <br> Erro: <br>".$e->getMessage();
    }     
}

function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM quadrado WHERE id = $id");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['lado'] = $linha['lado'];
        $dados['cor'] = $linha['cor'];
        $dados['quad_idTabuleiro'] = $linha['quad_idTabuleiro'];
    }
    return $dados;
}
?>