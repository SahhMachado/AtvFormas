<?php
session_start();
?>
<!DOCTYPE html>
<?php
    $title = "Login";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $user = isset($_POST['user']) ? $_POST['user'] : "";
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
    require_once "conf/Conexao.php";
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
            font-family: Arial, Helvetica, sans-serif;
            font-family: "roboto";
            font-weight: bold;
        }

        button{
            background-color: #b4a0cd;
            border-radius: 10px;
            border: none;
            font-weight: bold;
        }

        input{
            background-color: #b4a0cd;
            border-radius: 10px;
            border: none;
        }

        div{
            background-color: #9178af;
            padding: 50px;
            margin-top: 150px;
        }
        
        h3{
            font-family: "amithen";
            font-size: 30px;
            font-weight: lighter;
        }

        h1{
            font-family: "amithen";
            font-size: 30px;
            font-weight: lighter;
        }

        a{
            text-decoration: none;
            color: black;
        }

        a:hover{
            color: #b4a0cd;
        }

        @font-face {
        font-family: "roboto";
        src: url(font/roboto/rbcl.ttf);
        }

        @font-face {
        font-family: "amithen";
        src: url(font/amithen/amithen.ttf);
        }
    </style>
</head>
<body>
    <center>
        <div>
        <h3>Insira seus dados</h3>
            <form method="post" action="login.php?acao=login">

            <p>Login:</p>
                <input required="true" name="user" id="user" type="text" required="true" placeholder="Digite o login"
                value="<?php echo $user ?>"><br>    
            
            <p>Senha:</p>
                <input required="true" name="senha" id="senha" type="password" required="true" placeholder="Digite a senha" 
                value="<?php echo $senha ?>"><br><br><br>

                <button name="acao" value="salvar" id="acao" type="submit">Salvar</button>
            </form>
        </div>
    </center>
            <br> 
            <?php
            if($acao == 'login'){
                require_once "classes/Usuario.class.php";
               
                if (Usuario::efetuaLogin($user, $senha) == true){
                    echo "<center><h1>Login efetuado!</h1></center>";
                }else {
                echo "<center><h1>Erro</h1></center>";
            }
        }
            ?>
</body>
</html>