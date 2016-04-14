<?php
/**
 * Created by PhpStorm.
 * User: FUENTES
 * Date: 13/04/2016
 * Time: 11:34 AM
 */

    $usuario  = $_GET["usuario"];
    $password = $_GET["password"];

    include("../model/existe.php");

    $existe = existe($usuario, $password);

    if ($existe == 1) {
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: ../view/menu.php");
        exit();
    } else {
        header("Location: ../view/login.php");
    }

?>