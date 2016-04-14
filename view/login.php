<?php
    session_start();

    if (isset($_SESSION["usuario"]) ){
        //header("Location: ../controller/login.php");
        header("Location: ../view/menu.php");
        exit();
    }
?>
<html>
    <head>
    </head>
    <body>
        <h1>INMOBILIARIA BABEL</h1>
        <p><b>Autenticacion</b></p>
        <form action="../controller/checarLogin.php" method="get" enctype="multipart/form-data">
            Usuario:<br>
            <input type="text" name="usuario">
            <br>
            Password:<br>
            <input type="password" name="password">
            <br>
            <br>
            <input type="submit" value="Entrar">
        </form>
    </body>
</html>