<?php
include_once "../bd/conexion.php";
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//recepcion de los datos enviados mediante post desde js

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$pais = (isset($_POST['pais'])) ? $_POST['pais'] : '';
$edad = (isset($_POST['edad'])) ? $_POST['edad'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch ($opcion) {
    case 1:
        $consulta = "INSERT INTO personas(nombre, pais, edad) VALUES ('$nombre','$pais','$edad')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT id,nombre, pais, edad  from personas ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $data=$resultado->fetchALL(PDO::FETCH_ASSOC);
        break;
   
    case 2:
        $consulta = "UPDATE  personas SET nombre='$nombre', pais='$pais', edad='$edad' where id='$id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT id,nombre, pais, edad  from personas where id='$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $data=$resultado->fetchALL(PDO::FETCH_ASSOC);
        break;
   
    case 3:
        $consulta = "DELETE FROM personas WHERE id='$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        break;
   
}



print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json
$conexion=null;