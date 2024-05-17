<?php
    include 'controlador.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Proyecto UPSLP</title>
    <meta name="description" content="Proyecto de Programación Web">
    <link rel="stylesheet" href="index/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="index/assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image"
                                    style="background-image: url(&quot;index/assets/img/dogs/logo.jpg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <form class="user" action="" method="POST">
                                        <div class="text-center">
                                            <h4 class="text-dark mb-4">Bienvenido usuario</h4>
                                            <?php
                                            if(isset($mensaje1)){
                                                echo '<div class="text-center"><b>'.$mensaje1.'</b></div><br>';
                                            }
                                            if(isset($mensaje)){
                                                echo '<div class="text-center"><b>'.$mensaje.'</b></div><br>';
                                            }
                                            ?>
                                        </div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="text"
                                                id="usuario"
                                                placeholder="Ingrese su usuario" name="user"></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password"
                                                id="exampleInputPassword" placeholder="Contraseña" name="pass">
                                        </div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                            </div>
                                        </div><input class="btn btn-primary d-block btn-user w-100" name="btningresar" type="submit" value="Acceso">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <p class="m-0">Accesos disponibles</p>
            </div>
            <div class="card-header py-3">
                <li>
                Alumnos <br>
                177156 - Dagg2003<br>
                177876 - Bapl2003<br><br>
                </li>
                <li>
                Docentes<br>
                lilianagamez - 12345lili<br>
                salvadorgarcia - 12345salva<br><br>
                </li>
                <li>
                Aministradores<br>
                admin - 123admin<br><br>
                </li>
            </div>
        </div>
    </div>
    
    <script src="index/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="index/assets/js/script.min.js"></script>
</body>