<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6a0dc6dea4.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<nav class="navbar navbar-expand-lg bg-danger">

<ul class="nav nav-pills">
  <li class="nav-item p-2">
     <a class="navbar-brand" href="#">BEESOFT</a>
  </li>
  <li class="nav-item">
     <a class="nav-link active text-warning bg-dark" aria-current="page" href="index.php">Inicio</a>
  </li>
  <?php
      session_start();
      if(isset($_SESSION['idusuario'])) {
         echo '<li class="nav-item dropdown">';
         echo '<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Consultas</a>';
         echo '<ul class="dropdown-menu">';
            echo '<li><a class="dropdown-item" href="maestro_clientes.php">Maestro de Clientes</a></li>';
            echo '<li><a class="dropdown-item" href="maestro_tecnicos.php">Maestro de Tecnicos</a></li>';
            echo '<li><a class="dropdown-item" href="#">Opcion3</a></li>';
            echo '<li><a class="dropdown-item" href="#">Opcion4</a></li>';
        echo '</ul>';
        echo '</li>';
        echo '<li class="nav-item dropdown">';
            echo '<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Procesos</a>';
            echo '<ul class="dropdown-menu">';
                echo '<li><a class="dropdown-item" href="servicios_tecnicos.php">Servicios Tecnicos</a></li>';
                echo '<li><a class="dropdown-item" href="#">Opcion2</a></li>';
                echo '<li><a class="dropdown-item" href="#">Opcion3</a></li>';
            echo '</ul>';
        echo '</li>';
      }

      echo '<li class="nav-item">';
      if(!isset($_SESSION['idusuario'])) {
          echo '<a class="nav-link" href="login.php">Login</a></li>';
      } else {
          $idusuario = $_SESSION['idusuario'];
          echo '<a class="nav-link" href="logout.php">Logout</a></li>';
          echo '<li class="nav-item"><a class="nav-link" href="#">UserId :'.$idusuario.'</a></li>';

      }  
  ?>
</ul>
</nav>