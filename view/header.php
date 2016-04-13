<?php
/**
 * Created by PhpStorm.
 * User: dvdDelgadillo
 * Date: 4/13/2016
 * Time: 11:12 AM
 */
// Start the session
if (! isset($_SESSION["user"]) ){
    header("Location: ../controller/login.php");
    include("../view/login.php");
    exit();
}