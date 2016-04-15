<?php
/**
 * Created by PhpStorm.
 * User: dvdDelgadillo
 * Date: 4/13/2016
 * Time: 2:09 PM
 */
 include ("header.php");
 include("../controller/cargarAnuncios.php");
?>

<html>
<head>
    <title>Inmobilario</title>
</head>
<body>
    <h1 style="color:royalblue">Sistema de anuncios</h1>
    <h3 style="font-style:italic">Mostrar anuncios</h3>
    <form action="../controller/borrarAnuncios.php">
        <table border="1">
            <tr>
                <th>Titulo</th>
                <th>Observaciones</th>
                <th>Fecha</th>
                <th>Imagen</th>
                <th>Borrar</th>
            </tr>
            <?php
            foreach ($anuncios as $anuncio){
                ?>
                <tr>
                    <td><?= $anuncio["titulo"] ?></td>
                    <td><?= $anuncio["observaciones"] ?></td>
                    <td><?= $anuncio["fecha"] ?></td>
                    <td><a href="<?= "img/".$anuncio["imagen"]?>"><?= $anuncio["imagen"] ?></td>
                    <td><input type="checkbox" name="borrar[]" value="<?= $anuncio["id"] ?>"></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <br>
        <input type="submit" value="Eliminar anuncios marcados">
    </form>
    [ <a href="../view/menu.php">Menu Principal</a> ]
</body>
</html>
