<!DOCTYPE html>
<?php
    $title = "Retângulo";
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once "classes/Retangulo.class.php";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $cnst = isset($_POST['cnst']) ? $_POST['cnst'] : 1;
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title><?php echo $title ?></title>
    <script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>
    <style>
        body{
            background-image:  linear-gradient( to bottom, #e5ddee, #b4a0cd, #e5ddee);
            font-family: "roboto";
            margin: 0%;
        }

        button{
            background-color: #9178af;
            border-radius: 10px;
            border: none;
            font-weight: bold;
        }

        header{
            background-color: #b4a0cd;
            padding-top: 10px;
        }

        input{
            background-color: #b4a0cd;
            border-radius: 10px;
            border: none;
        }

        h3{
            font-family: "amithen";
            font-size: 25px;
            font-weight: lighter;
        }

        @font-face {
        font-family: "roboto";
        src: url(font/roboto/rbcl.ttf);
        }

        @font-face {
        font-family: "amithen";
        src: url(font/amithen/amithen.ttf);
        }

        .bs{
            width: 100%;
        }

        .container{
            margin: 20px;
        }

        .tab{
            width: 100%;
            border: 4px solid #9178af;
            background-color: #b4a0cd;
        }

        td{
            padding-right: 15px;
        }

        a{
            text-decoration: none;
            color: black;
        }

        a:hover{
            color: #9178af;
        }
    </style>
</head>
<body>
    <header>
        <?php
        include_once "menu.php";
        ?>
    </header>
    <br>
    <div class="container">
        <form method="post">
        <h3>Procurar Retângulo:</h3>
        <input type="text" name="procurar" id="procurar" class="bs" size="25" placeholder="pesquisar"
        value="<?php echo $procurar;?>"><br><br>
    <center><button name="acao" id="acao" type="submit">Procurar</button></center>
    <br><br>
    <fieldset>
    <p> Ordernar e pesquisar por:</p><br>
        <form method="post" action="">
            <input type="radio" name="cnst" value="1" <?php if ($cnst == "1") echo "checked" ?>> ID<br>
            <input type="radio" name="cnst" value="2" <?php if ($cnst == "2") echo "checked" ?>> Altura<br>
            <input type="radio" name="cnst" value="3" <?php if ($cnst == "3") echo "checked" ?>> Base<br>
            <input type="radio" name="cnst" value="4" <?php if ($cnst == "4") echo "checked" ?>> Cor<br>
            <input type="radio" name="cnst" value="5" <?php if ($cnst == "5") echo "checked" ?>> ID Tabuleiro<br>
    <br><br>
    </form>
<table class="tab">
            <tr>
                <td><b>ID</b></td>
                <td><b>Altura</b></td>
                <td><b>Base</b></td>
                <td><b>Cor</b></td>
                <td><b>ID Tabuleiro</b></td>
                <td><b>Listar</b></td>
                <td><b>Editar</b></td>
                <td><b>Excluir</b></td>
    </tr> 
    <tr>
    <?php
        $lista = Retangulo::listar($cnst, $procurar);
        foreach ($lista as $linha) {

        $cor = str_replace("#","%23",$linha['cor']);
    ?>
            <td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['altura'];?></td>
            <td><?php echo $linha['base'];?></td>
            <td style="color: <?php echo $linha['cor'];?>; float: left;"><?php echo $linha['cor'];?>
            <div style="width: 10px; height: 10px; background-color:<?php echo $linha['cor'];?>; 
            border-radius: 50%; float: left; display: table-cell; margin-top: 6px; margin-right: 14px;"></div></td>
            <td><?php echo $linha['ret_idtab'];?></td>
            
            <td><a href='listarRet.php?id=<?php echo $linha['id'];?>&altura=<?php echo $linha['altura'];?>&base=<?php echo $linha['base'];?>&cor=<?php echo $cor;?>&ret_idtab=<?php echo $linha['ret_idtab'];?>'>
            <img src='img/listar.svg'></a></td>
            <td><a href='cadRet.php?acao=editar&id=<?php echo $linha['id'];?>'><img src='img/edit.svg'></a></td>
            <td><?php echo " <a href=javascript:excluirRegistro('acaoRet.php?acao=excluir&id={$linha['id']}')>
            <img src='img/excluir.svg'></a><br>"; ?></td>
        </tr>   
        <?php } ?>    
    </table>
    </fieldset>
    </form>
    </div>
    <br>
</body>
</html>