<?php
/**
 * Created by PhpStorm.
 * User: dvdDelgadillo
 * Date: 4/13/2016
 * Time: 11:12 AM
 */
// Start the session

session_start();

if (! isset($_SESSION["usuario"]) ){
    //header("Location: ../controller/login.php");
    header("Location: ../view/login.php");
    exit();
}