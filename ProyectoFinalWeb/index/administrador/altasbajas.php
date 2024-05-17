<?php

include '../../conn.php';
include '../sesion.php';

$consulta = "select user_alumn FROM alumnos where user_alumn = ".$_POST['matricula'];
$result = mysqli_query($conn, $consulta);
$datos = mysqli_fetch_assoc($result);
$id_bst = $datos['user_alumn'];

$valor = "Activo";
$valor1 = "Inactivo";

$comp = $_POST['matricula'];

if($comp == $id_bst){
    if($_POST['gender'] == 0) {
    $sql = "UPDATE alumnos SET status_alumn='".$valor."' where user_alumn=".$_POST['matricula'];
    }
    if($_POST['gender'] == 1) {
    $sql = "UPDATE alumnos SET status_alumn='".$valor1."' where user_alumn=".$_POST['matricula'];
    }
    if (mysqli_query($conn, $sql)) {
        header("Location:index.php");
    }   
}else{
    header("Location:404.php");
}
?>