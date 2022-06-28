<!DOCTYPE html>
<?php
    $title = "Usuário";
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once "classes/Usuario.class.php";
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

        .container{
            margin: 20px;
        }

        .tab{
            width: 100%;
            border: 4px solid #9178af;
            background-color: #b4a0cd;
        }

        input{
            background-color: #b4a0cd;
            border-radius: 10px;
            border: none;
        }

        .bs{
            width: 100%;
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
        <h3>Procurar Usuário:</h3>
        <input type="text" name="procurar" id="procurar" class="bs" size="25" placeholder="pesquisar"
        value="<?php echo $procurar;?>"><br><br>
    <center><button name="acao" id="acao" type="submit">Procurar</button></center>
    <br><br>
    <fieldset>
    <p> Ordernar e pesquisar por:</p><br>
        <form method="post" action="">
            <input type="radio" name="cnst" value="1" <?php if ($cnst == "1") echo "checked" ?>> ID<br>
            <input type="radio" name="cnst" value="2" <?php if ($cnst == "2") echo "checked" ?>> Nome<br>
            <input type="radio" name="cnst" value="3" <?php if ($cnst == "2") echo "checked" ?>> Login<br>
    <br><br>
    </form>
    <table class="tab">
        <tr>
            <td><b>ID</b></td>
            <td><b>Nome</b></td>
            <td><b>Login</b></td>
            <td><b>Senha</b></td>
            <td><b>Editar</b></td>
            <td><b>Excluir</b></td>
    </tr> 
    <tr>
    <?php
    $lista = Usuario::listar($cnst, $procurar);
    foreach ($lista as $linha) {
        
        ?>
            <td><?php echo $linha['idUsuario'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo $linha['user'];?></td>
            <td><?php echo $linha['senha'];?></td>
            
            <td><a href='cadUs.php?acao=editar&idUsuario=<?php echo $linha['idUsuario'];?>'><img src='img/edit.svg'></a></td>
            <td><?php echo " <a href=javascript:excluirRegistro('acaoU.php?acao=excluir&idUsuario={$linha['idUsuario']}')>
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