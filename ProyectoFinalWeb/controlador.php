<?php
include 'conn.php';

if(!empty($_POST["btningresar"])){  
    
    if(empty($_POST["user"]) && empty($_POST["pass"])){
        $mensaje1 = "Los campos estan vacios";
    }else{
        $u=$_POST["user"];
        $p=$_POST["pass"];

        $sql = "SELECT * FROM administrativos where user_admin='".$u."'and pass_admin='".$p."'";
        $sql1 = "SELECT * FROM alumnos where user_alumn='".$u."'and pass_alumn='".$p."'";
        $sql2 = "SELECT * FROM docente where user_doce='".$u."'and pass_doce='".$p."'";

        $result = $conn->query($sql);
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);

        if($result->num_rows > 0){
            $datos = $result->fetch_assoc();
            session_start();
            $_SESSION["idusu"] = $datos["id_admin"];
            $_SESSION["nom"] = $datos["nom_admin"];
            $_SESSION["apep"] = $datos["ape_pater_admin"];
            $_SESSION["apem"] = $datos["ape_mater_admin	"];
            $_SESSION["usuario"] = $datos["user_admin"];
            $_SESSION["tipo"] = "administrador";
            header("Location:index\administrador\index.php");
            exit;
        }else if($result1->num_rows > 0){
            $datos1 = $result1->fetch_assoc();
            session_start();
            $_SESSION["idusu"] = $datos1["id_alumn"];
            $_SESSION["nom"] = $datos1["nom_alu"];
            $_SESSION["apep"] = $datos1["ape_pater_alumn"];
            $_SESSION["apem"] = $datos1["ape_mater_alumn"];
            $_SESSION["mail"] = $datos1["correo_alumn"];
            $_SESSION["status"] = $datos1["status_alumn"];
            $_SESSION["usuario"] = $datos1["user_alumn"];
            $_SESSION["tipo"] = "alumno";
            header("Location:index\alumnos\index.php");
            exit;
        }else if($result2->num_rows > 0){
            $datos2 = $result2->fetch_assoc();
            session_start();
            $_SESSION["idusu"] = $datos2["id_doce"];
            $_SESSION["nom"] = $datos2["nom_doce"];
            $_SESSION["apep"] = $datos2["ape_pater_doce"];
            $_SESSION["apem"] = $datos2["ape_mater_doce"];
            $_SESSION["mail"] = $datos2["correo_doce"];
            $_SESSION["usuario"] = $datos2["user_doce"];
            $_SESSION["tipo"] = "docente";
            header("Location:index\docentes\index.php");
            exit;
        }else{
            $mensaje = "Acceso denegado";
        }
    }
}    

?>