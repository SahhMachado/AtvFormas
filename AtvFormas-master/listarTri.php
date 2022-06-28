<!DOCTYPE html>
<?php
    $title = "Triângulo";
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $base = isset($_GET['base']) ? $_GET['base'] : 0;
    $lado1 = isset($_GET['lado1']) ? $_GET['lado1'] : 0;
    $lado2 = isset($_GET['lado2']) ? $_GET['lado2'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $tri_idtabuleiro = isset($_GET['tri_idtabuleiro']) ? $_GET['tri_idtabuleiro'] : 0;
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
            margin: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }

        input{
            background-color: #b4a0cd;
            border-radius: 10px;
            border: none;
        }

        .div{
            margin-top: 100px;
            background-color:  #b4a0cd;
        }

        a{
            text-decoration: none;
            color: black;
        }

        .seta{
            width: 30px;
        }

        a:hover{
            color: #b4a0cd;
        }
    </style>
</head>
<body>
    <br>
    <div class="div">
        <center>
        <br><br><br>
        <?php  
            if ($acao = "salvar") {
                include_once "classes/Triangulo.class.php";
                $tri = new Triangulo($id, $base, $lado1, $lado2, $cor, $tri_idtabuleiro);
                echo $tri->desenha();
                echo $tri;
            }
            ?>
            <br>
            <br>
            <a href="showTri.php"><img src="img/arrow.svg" alt="" class="seta"></a>
            <br><br><br>
        </center>
    </div>
    </fieldset>
    <br>
</body>
</html>