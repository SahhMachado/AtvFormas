<?php  
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";
require_once("classes/Triangulo.class.php");

$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $tri = new Triangulo($id, $_POST['base'],  $_POST['lado1'], $_POST['lado2'], $_POST['cor'], $_POST['tri_idtabuleiro']);     
        $tri->excluir();
        header("location:showTri.php");
    }

$acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";

        try{
        if ($id == 0){
            $tri = new Triangulo("", $_POST['base'], $_POST['lado1'], $_POST['lado2'], $_POST['cor'], $_POST['tri_idtabuleiro']);
            $tri->insere();
            header("location:showTri.php");
        }else {
            $tri = new Triangulo($_POST['id'], $_POST['base'], $_POST['lado1'], $_POST['lado2'], $_POST['cor'], $_POST['tri_idtabuleiro']);
            $tri->editar();
        }    
        header("location:showTri.php");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar o Triângulo.<h1>
        <br> Erro: <br>".$e->getMessage();
    }     
}

function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM triangulo WHERE id = $id");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['base'] = $linha['base'];
        $dados['lado1'] = $linha['lado1'];
        $dados['lado2'] = $linha['lado2'];
        $dados['cor'] = $linha['cor'];
        $dados['tri_idtabuleiro'] = $linha['tri_idtabuleiro'];
    }
    return $dados;
}
?>