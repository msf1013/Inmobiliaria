<?php
/**
 * Created by PhpStorm.
 * User: dvdDelgadillo
 * Date: 4/15/2016
 * Time: 1:41 PM
 */
    $ids_anuncios  = $_GET["borrar"];
    include("../model/listaAnuncios.php");

    if ( borraAnuncios($ids_anuncios) ){
        $_POST["letrero"] = "Anuncios borrados exitosamente";
        header("Location: ../view/menu.php");
    }
    else{
        $_POST["letrero"] = "Error con la base de datos al tratar de borrar anuncios";
        header("Location: ../view/borrar.php");
    }

    