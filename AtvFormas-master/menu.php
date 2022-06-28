<meta charset="utf-8">
<nav class="drop">
    <ul>
        <li><a href="login.php" class="lg">Login</a></li>
        <li><a href="#" class="mn">Cadastrar ↷</a>
            <ul class="drop1">
                <li class="hov"><a href="cad.php" class="menu">Quadrado</a></li>
                <li class="hov"><a href="cadTri.php" class="menu">Triângulo</a></li>
                <li class="hov"><a href="cadRet.php" class="menu">Retângulo</a></li>
                <li class="hov"><a href="cadCirc.php" class="menu">Círculo</a></li>
                <li class="hov"><a href="cadTab.php" class="menu">Tabuleiro</a></li>
                <li class="hov"><a href="cadUs.php" class="menu">Usuário</a></li>
            </ul>            
        </li>
        <li><a href="#" class="mn">Consultar ↷</a>
            <ul class="drop2">
                <li class="hov"><a href="show.php" class="menu">Quadrado</a></li>
                <li class="hov"><a href="showTri.php" class="menu">Triângulo</a></li>
                <li class="hov"><a href="showRet.php" class="menu">Retângulo</a></li>
                <li class="hov"><a href="showCirc.php" class="menu">Círculo</a></li>
                <li class="hov"><a href="showT.php" class="menu">Tabuleiro</a></li>
                <li class="hov"><a href="showUs.php" class="menu">Usuário</a></li>
           </ul>
        </li>
    </ul>
</nav>
<br><br>
<style>
    @font-face {
        font-family: "amithen";
        src: url(font/amithen/amithen.ttf);
        }

    .menu{
        text-decoration: none;
        padding: 10px;
        font-size: 16px;
    }

    .lg{
        margin-left: 20px;
        font-family: "amithen";
        font-size: 25px;
    }

    .mn{
        font-family: "amithen";
        font-size: 25px;
    }

    .drop ul{
        list-style-type: none;
        padding: 0px;
        background-color: #b4a0cd;
    }

    .drop ul li{
        display: inline;
        display: relative;
    }

    .drop ul li a{
        padding: 10px;
        display: inline-block;
        transition: background .3s;
    }
    
    .drop .hov a:hover{
        background-color: #e5ddee;
    }

    /* Itens primeiro dropdown*/

    .drop ul .drop1{
        display: none;
        left: 4.5%;
        position: absolute;
        width: 125px;
    }

    .drop ul li:hover ul{
        display: block;
    }

    .drop ul ul li a{
        display: block;
    }

    /* Itens segundo dropdown*/

    .drop ul .drop2{
        display: none;
        left: 11.1%;
        position: absolute;
        width: 125px;
    }
</style>