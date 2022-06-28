<!DOCTYPE html>
<?php
    $title = "Círculo";
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $raio = isset($_GET['raio']) ? $_GET['raio'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $circ_idtab = isset($_GET['circ_idtab']) ? $_GET['circ_idtab'] : "";
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
                include_once "classes/Circulo.class.php";
                $quad = new Circulo($id, $raio, $cor, $circ_idtab);
                echo $quad->desenha();
                echo $quad;
            }
            ?>
            <br>
            <br>
            <a href="showCirc.php"><img src="img/arrow.svg" alt="" class="seta"></a>
            <br><br><br>
        </center>
    </div>
    </fieldset>
    <br>
</body>
</html>