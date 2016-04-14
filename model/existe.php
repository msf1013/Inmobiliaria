<?php
/**
 * Created by PhpStorm.
 * User: FUENTES
 * Date: 13/04/2016
 * Time: 11:36 AM
 */
function existe($usuario, $password){


    try{
        $dbh=new PDO("mysql:host=localhost;port=3306;dbname=babel","root","root");
        $query="select * from usuarios where usuario='$usuario' and password='$password'";
        $resultado=$dbh->query($query);

        foreach($resultado as $row){
            return 1;
        }

        return 0;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>