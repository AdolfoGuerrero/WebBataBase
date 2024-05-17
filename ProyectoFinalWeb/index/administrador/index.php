<?php
include '../../conn.php';
include '../sesion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Principal - Proyecto UPSLP</title>
    <meta name="description" content="Proyecto de Programación Web">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-school"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>UPSLP</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="index.php"><i class="fas fa-home"></i><span>Principal</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Perfil</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1"></li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown show no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="true" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $_SESSION["usuario"] ?></span></a>
                                    <div class="dropdown-menu show shadow dropdown-menu-end animated--grow-in" data-bs-popper="none"><a class="dropdown-item" href="profile.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Perfil</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Cerrar Sesión</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Principal</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-12">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Acciones como Administrado</h6>
                                </div>
                                <div class="card shadow">
                                    <h4>Alumnos</h4><br>
                                    <?php
                                        $sql = "SELECT user_alumn, correo_alumn, ape_mater_alumn, ape_pater_alumn, nom_alu, status_alumn FROM alumnos";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                        echo'<table border="1">';
                                        echo "<td bgcolor=#4E4EEF style=color:black>Matricula</td>";
                                        echo "<td bgcolor=#4E4EEF style=color:black>Apellido Paterno</td>";
                                        echo "<td bgcolor=#4E4EEF style=color:black>Apellido Materno</td>";
                                        echo "<td bgcolor=#4E4EEF style=color:black>Nombre</td>";
                                        echo "<td bgcolor=#4E4EEF style=color:black>Correo</td>";
                                        echo "<td bgcolor=#4E4EEF style=color:black>Estado</td>";
                                        echo "<tr>";
                                        while($row = $result->fetch_assoc()) { 
                                            echo'<tr>'; 
                                            echo"<td>".$row["user_alumn"]."</td>";
                                            echo"<td>".$row["ape_pater_alumn"]."</td>";
                                            echo"<td>".$row["ape_mater_alumn"]."</td>";
                                            echo"<td>".$row["nom_alu"]."</td>";
                                            echo"<td>".$row["correo_alumn"]."</td>";
                                            echo"<td>".$row["status_alumn"]."</td>";
                                            echo"</tr>";
                                            }
                                        }
                                        echo '</table><br>';
                                        
                                        echo "<form action='altasbajas.php' method='post'>";
                                        echo "Matricula: <input type'text' name='matricula'><br><br>";
                                        echo "<p>Actualiza el estado<p>";
                                        echo "<input type='radio' name='gender' value='0'> Activo";
                                        echo "<br><input type='radio' name='gender' value='1'> Inactivo";
                                        echo "<br><br><input type='submit'><br>";
                                        echo "</form>";
                                    ?>
                                    <br>
                                    </div><br>
                                    <div class="card shadow">                              
                                    <h4>Docentes</h4><br>
                                    <?php
                                        $sql = "SELECT id_doce ,nom_doce, ape_pater_doce, ape_mater_doce, correo_doce FROM docente";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                        echo'<table border="1">';
                                        echo "<td bgcolor=#4E4EEF style=color:black>Id</td>";
                                        echo "<td bgcolor=#4E4EEF style=color:black>Apellido Paterno</td>";
                                        echo "<td bgcolor=#4E4EEF style=color:black>Apellido Materno</td>";
                                        echo "<td bgcolor=#4E4EEF style=color:black>Nombre</td>";
                                        echo "<td bgcolor=#4E4EEF style=color:black>Correo</td>";
                                        echo "<tr>";
                                            while($row = $result->fetch_assoc()) { 
                                                echo'<tr>'; 
                                                echo"<td>".$row["id_doce"]."</td>";
                                                echo"<td>".$row["ape_pater_doce"]."</td>";
                                                echo"<td>".$row["ape_mater_doce"]."</td>";
                                                echo"<td>".$row["nom_doce"]."</td>";
                                                echo"<td>".$row["correo_doce"]."</td>";
                                                echo"</tr>";
                                            }
                                        }
                                        echo '</table><br>';
                                    ?>
                                     <div class="card shadow">
                                     <h4> Cargar Planes de estudios</h4>
                                        <form action='<?php echo $_SERVER['PHP_SELF'] ?>' method="post" enctype="multipart/form-data">
                                        <input type="file" name="archivo">
                                        <input type="submit" name="submit" value="Cargar archivo">
                                        </form>
                                        <?php
                                        $ruta="img/"; // Indicar ruta
                                        if (isset($_FILES['archivo']) && $_FILES['archivo']['size'] > 0) {
                                        $tamanyomax = 200000; // Indicar tama�o en bytes
                                        $nombretemp = $_FILES['archivo']['tmp_name'];
                                        $nombrearchivo = $_FILES['archivo']['name'];
                                        $tamanyoarchivo = $_FILES['archivo']['size'];
                                        $tipoarchivo = GetImageSize( $nombretemp );
                                        if ($tipoarchivo[2] == 1 || $tipoarchivo[2] == 2) { //Gif o Jpg?
                                        if (tamanyoarchivo <= $tamanyomax) { // Archivo demasiado grande?
                                        if (move_uploaded_file($nombretemp, $ruta.$nombrearchivo)) {
                                        echo "<p>El archivo se ha cargado <b>con exito</b>.
                                        Tama�o de archivo: <b>$tamanyoarchivo</b> bytes,
                                        Nombre de imagen: <b>$nombrearchivo</b><br></p>";
                                        } else {
                                        echo "<p>No se ha podido cargar el archivo.</p>";
                                        }
                                        } else {
                                        echo "<p>El archivo tiene mas de <b>$tamanyomax bytes</b> y es demasiado grande.</p>";
                                        }
                                        } else {
                                        echo "<p>No es un archivo GIF o JPG valido.</p>";
                                        }
                                        echo "<form action='{$_SERVER['PHP_SELF']}' method='post'>
                                        <input type='submit' value='OK'></form>";
                                        }
                                        $filehandle = opendir($ruta); // Abrir archivos
                                        while ($file=readdir($filehandle)) {
                                        if ($file != "." && $file != "..") {
                                        $tamanyo = GetImageSize($ruta.$file);
                                        echo "<p><img src='$ruta$file' $tamanyo[3]><br></p>";
                                        }
                                        }
                                        closedir($filehandle); // Fin lectura de archivos
                                        ?>
                                    </div>
                                </div>
                            </div>                            
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <p class="m-0">En esta sección el usuario administrador podrá realizar las acciones:</p>
                                </div>
                                <div class="card-header py-3">
                                    <li>
                                    Alta, baja, modificación y consulta de usuarios de la plataforma (preferentemente para usuarios de tipo estudiante, utilizar la matricula como usuario)
                                    </li>
                                    <li>
                                    Alta y consulta del plan de estudios
                                    </li>
                                    <li>
                                    Importar plan de estudios
                                    </li>
                                    <li>
                                    Importar kardex por alumno
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Proyecto Adolfo UPSLP 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/script.min.js"></script>
    <script src="../assets/js/chart.min.min.js"></script>
</body>

</html>