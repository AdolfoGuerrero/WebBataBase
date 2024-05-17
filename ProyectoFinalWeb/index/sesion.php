<?php

session_start();
if(isset($_SESSION["idusu"])){

$session_idusu = $_SESSION["idusu"];
$session_tipo = $_SESSION["tipo"];
$session_un = $_SESSION["usuario"];

if($session_tipo == "administrador"){
    
    $sql = $conn->query("SELECT * FROM administrativos where id_admin=".$session_idusu);
    if(!$sql){
        header("Location:../login.php");
        exit;
    }
}

if($session_tipo == "alumno"){
    
    $sql = $conn->query("SELECT * FROM alumnos where id_alumn=".$session_idusu);
    if(!$sql){
        header("Location:../login.php");
        exit;
    }
}

if($session_tipo == "docente"){
    
    $sql = $conn->query("SELECT * FROM docente where id_doce=".$session_idusu);
    if(!$sql){
        header("Location:../login.php");
        exit;
    }
}

}else{
    session_destroy();
    header('Location: ../../login.php');
    die();
}

?>