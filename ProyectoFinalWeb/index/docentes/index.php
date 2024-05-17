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
                        <h3 class="text-dark mb-0">Principal</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-12">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Acciones de docente</h6>
                                </div>
                                <div class="container-fluid">
                                    <h3 class="text-dark mb-4">Revisar progreso del alumno</h3>
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <!--  <p class="text-primary m-0 fw-bold">Employee Info</p>  //-->
                                        </div>
                                        <div class="card-body"></div>

                                        
                                        <?php
                                            echo "<h4>Matricula: ".$_POST['Matricula']."</h4>";
                                            $sql = "SELECT materia, seccion, periodo, status_mater FROM kardex WHERE id_matricula=".$_POST['Matricula']." AND `status_mater` = 'En Curso'";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                echo "<br><h4>Materias en curso</h4>";
                                                echo'<table border="1">';
                                                echo "<td bgcolor=#4E4EEF style=color:black>Materia</td>";
                                                echo "<td bgcolor=#4E4EEF style=color:black>Seccion</td>";
                                                echo "<td bgcolor=#4E4EEF style=color:black>Periodo</td>";
                                                echo "<td bgcolor=#4E4EEF style=color:black>Status</td>";
                                                echo "<tr>";
                                                while($row = $result->fetch_assoc()) { 
                                                    echo'<tr>'; 
                                                    echo"<td>".$row["materia"]."</td>";
                                                    echo"<td>".$row["seccion"]."</td>";
                                                    echo"<td>".$row["periodo"]."</td>";
                                                    echo"<td>".$row["status_mater"]."</td>";
                                                    echo"</tr>";
                                                }
                                            }
                                            echo '</table>';
                                            ?>
                                        <?php
                                            $sql = "SELECT materia, seccion, periodo, status_mater FROM kardex WHERE id_matricula=".$_POST['Matricula']." AND `status_mater` = 'Pendiente Por Cursar' AND `sem` = '4'";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                echo "<br><br><h4>Materias recomendadas</h4>";
                                                echo'<table border="1">';
                                                echo "<td bgcolor=#4E4EEF style=color:black>Materia</td>";
                                                echo "<td bgcolor=#4E4EEF style=color:black>Seccion</td>";
                                                echo "<td bgcolor=#4E4EEF style=color:black>Periodo</td>";
                                                echo "<td bgcolor=#4E4EEF style=color:black>Status</td>";
                                                echo "<tr>";
                                                while($row = $result->fetch_assoc()) { 
                                                    echo'<tr>'; 
                                                    echo"<td>".$row["materia"]."</td>";
                                                    echo"<td>".$row["seccion"]."</td>";
                                                    echo"<td>".$row["periodo"]."</td>";
                                                    echo"<td>".$row["status_mater"]."</td>";
                                                    echo"</tr>";
                                                }
                                            }
                                            echo '</table>';
                                            ?>

                                        <?php
                                            $sql = "SELECT materia, seccion, periodo, status_mater, creditos FROM kardex WHERE id_matricula=".$_POST['Matricula']." AND `status_mater` = 'Aprobado'";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                echo "<br><br><h4>Materias ya cursadas</h4>";
                                                echo'<table border="1">';
                                                echo "<td bgcolor=#4E4EEF style=color:black>Materia</td>";
                                                echo "<td bgcolor=#4E4EEF style=color:black>Seccion</td>";
                                                echo "<td bgcolor=#4E4EEF style=color:black>Periodo</td>";
                                                echo "<td bgcolor=#4E4EEF style=color:black>Creditos</td>";
                                                echo "<td bgcolor=#4E4EEF style=color:black>Status</td>";
                                                echo "<tr>";
                                                while($row = $result->fetch_assoc()) { 
                                                    echo'<tr>'; 
                                                    echo"<td>".$row["materia"]."</td>";
                                                    echo"<td>".$row["seccion"]."</td>";
                                                    echo"<td>".$row["periodo"]."</td>";
                                                    echo"<td>".$row["creditos"]."</td>";
                                                    echo"<td>".$row["status_mater"]."</td>";
                                                    echo"</tr>";
                                                }
                                            }
                                            echo '</table>';
                                            ?>    
                                        
                                        <?php
                                            $sql = "SELECT user_alumn, correo_alumn, ape_mater_alumn, ape_pater_alumn, nom_alu, status_alumn FROM alumnos";
                                            $result = $conn->query($sql);
                                        
                                            if ($result->num_rows > 0) {
                                                $result = $conn->query($sql);
                                                //Matricula
                                                echo "<form action='table.php' method='POST'>";//----borrar sin salir de la pagina
                                                echo "<label>Matricula: ";
                                                echo "<select name='Matricula'>";

                                                while($row=$result->fetch_assoc()){
                                                    echo "<option value=".$row["user_alumn"].">".$row["user_alumn"]."</option>";
                                                }
                                                echo "</select></label>  ";
                                                //----------------------

                                                echo "<input type='submit' value='Verificar'>";
                                                echo "</form>";
                                            } ///---------------------------------------------
                                            ?>

                                    </div>
                                    <?php 
                                    $_SESSION["profmat"]=$_POST['Matricula'];
                                    if($_POST['Matricula'] != 0){
                                        echo "<form action='genrep.php'>";
                                        echo "<input type='submit' value='Generar Reporte'>";
                                        echo "</form>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <p class="m-0">En esta sección el estudiante solo podrá consultar el avance propio dado que el usuario es su matricula a localizar, deberá aparecer el mapa curricular marcando lo siguiente:</p>
                                </div>
                                <div class="card-header py-3">
                                    <li>
                                    Señalar las materias que ya se cursaron
                                    </li>
                                    <li>
                                    Señalar el número de veces que cursó una materia
                                    </li>
                                    <li>
                                    Señalar las materias que cursa en el semestre actual
                                    </li>
                                    <li>
                                    Señalar las materias que puede llevar el siguiente semestre
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