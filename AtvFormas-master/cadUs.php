<!DOCTYPE html>
<?php
    $title = "Usuário";
    $nome = isset($_POST['nome']) ? $_POST['nome'] : 0;
    $user = isset($_POST['user']) ? $_POST['user'] : "";
    $senha = isset($_POST['senha']) ? $_POST['senha'] : 0;

    include_once "acaoU.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $idUsuario = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : "";
    if ($idUsuario > 0)
        $dados = buscarDados($idUsuario);
}
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title><?php echo $title ?></title>
    <style>
        body{
            background-image:  linear-gradient( to bottom, #e5ddee, #b4a0cd, #e5ddee);
            margin: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }

        button{
            background-color: #9178af;
            border-radius: 10px;
            border: none;
            font-weight: bold;
        }

        input{
            background-color: #b4a0cd;
            border-radius: 10px;
            border: none;
        }

        a{
            text-decoration: none;
            color: black;
        }

        a:hover{
            color: #b4a0cd;
        }
    </style>
</head>

<body>
    <br>
    <center>
        <h3>Insira seus dados</h3><hr>
            <form method="post" action="acaoU.php">

            <input readonly type="hidden" name="idUsuario" idUsuario="idUsuario" value="<?php if ($acao == "editar") echo $dados['idUsuario']; 
            else echo 0; ?>">
                
            <p>Nome:</p>
                <input require="true" type="text" name="nome" idUsuario="nome" placeholder="Insira seu nome" 
                value="<?php if ($acao == "editar") echo $dados['nome'];?>"><br>

            <p>Login:</p>
                <input required="true" name="user" id="user" type="text" required="true" placeholder="Digite o login" 
                value="<?php if ($acao == "editar") echo $dados['user'];?>" ><br>    
            
            <p>Senha:</p>
                <input required="true" name="senha" id="senha" type="password" required="true" placeholder="Digite a senha" 
                value="<?php if ($acao == "editar") echo $dados['senha'];?>" ><br>    
            <br>
            <hr>
            <br>
                <button name="acao" value="salvar" id="acao" type="submit">Salvar</button>
            </form>
            <br> 
    </center>
</body>
</html>