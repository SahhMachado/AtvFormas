<!DOCTYPE html>
<?php
    $title = "Tabuleiro";
    $lado = isset($_GET['lado']) ? $_GET['lado'] : 0;
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
            background-color: #e5ddee;
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

        .seta{
            width: 30px;
        }

        .div{
            margin-top: 200px;
            background-color:  #b4a0cd;
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
    <div class="div">
        <center>
            <br><br><br>
        <?php  
            if ($acao = "salvar") {
                include_once "classes/Tabuleiro.class.php";
                $tab = new Tabuleiro("", $lado);
                echo $tab->desenha();
                echo $tab;
            }
            ?>
            <br>
            <br>
            <a href="showT.php"><img src="img/arrow.svg" alt="" class="seta"></a>
            <br><br><br>
            </center>
            </div>
    </fieldset>
    <br>
</body>
</html>