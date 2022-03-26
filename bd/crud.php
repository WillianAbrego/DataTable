<?php
include_once "../bd/conexion.php";
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//recepcion de los datos enviados mediante post desde js

$nombre=(isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$pais=(isset($_POST['pais'])) ? $_POST['pais'] : '';
$edad=(isset($_POST['edad'])) ? $_POST['edad'] : '';

$consulta = "INSERT INTO personas(nombre, pais, edad) VALUES ('$nombre','$pais','$edad')";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

$consulta = "SELECT id,nombre, pais, edad  from personas ORDER BY id DESC LIMIT 1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

$data=$resultado->fetchALL(PDO::FETCH_ASSOC);
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json

$conexion=null;