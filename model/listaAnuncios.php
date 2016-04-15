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
        $dbh=new PDO("mysql:host=localhost;port=3306;dbname=babel","root","root");
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
        $dbh=new PDO("mysql:host=localhost;port=3306;dbname=babel","root","root");
        foreach ($ids as $id) {
            // Obtener nombre de archivo
            $query="select imagen from anuncios where id='$id'";
            $resultado = $dbh->query($query);
            foreach ($resultado as $anuncio) {
                // Borrar archivo si es que existe
                if ($anuncio["imagen"] != "") {
                    unlink( $_SERVER['DOCUMENT_ROOT'] . "/Inmobiliaria/view/img/" . $anuncio["imagen"]);
                }
            }

            // Eliminar anuncio
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