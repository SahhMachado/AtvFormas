<?php
require_once "classes/Quadrado.class.php";
require_once "classes/Tabuleiro.class.php";

function exibir($chave, $dados, $id=null){
    $str = 0;
    foreach($dados as $linha){
        $selected = "";
        if ($id == $linha[$chave[0]]) {
            $selected = "selected";
        }
        $str .= "<option ".$selected." value='".$linha[$chave[0]]."'>".$linha[$chave[1]]."</option>";
    }
    return $str;
}

function lista_tabuleiro($idTabuleiro, $id){
    $tab = new Tabuleiro("","");
    $lista = $tab->buscar($idTabuleiro);
    return exibir(array('idTabuleiro', 'idTabuleiro'), $lista, $id);
}
?>