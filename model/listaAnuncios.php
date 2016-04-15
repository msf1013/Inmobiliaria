<?php
/**
 * Created by PhpStorm.
 * User: FUENTES
 * Date: 14/04/2016
 * Time: 09:35 AM
 */

function listaAnuncios(){
    $resultado = [];
    try{
        $dbh=new PDO("mysql:host=localhost;port=3306;dbname=babel","root","");
        $query="select * from anuncios";
        $resultado=$dbh->query($query);

        return $resultado;

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    return $resultado;
}

function borraAnuncios($ids){
    try {
        $dbh=new PDO("mysql:host=localhost;port=3306;dbname=babel","root","");
        foreach ($ids as $id) {

            $query="delete from anuncios where id='$id'";
            $dbh->query($query);
        }
        return true;
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
    return false;
}
?>