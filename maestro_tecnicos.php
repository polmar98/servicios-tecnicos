<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecnicos</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6a0dc6dea4.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SAST</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        </li>

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Busqueda" aria-label="Search" id="search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>

<div class="container p-2">
<h1>Maestro de Tecnicos</h1>
 
    <div class="row">
        <div class="col-md-4">
           <div class="card">
               <div class="card-body">
                  <form id="cliente-form">
                     <div class="form-group">
                        <input type="text" id="apellidos" placeholder="Apellidos" class="form-control">
                     </div>
                     <div class="form-group">
                        <input type="text" id="nombres" placeholder="Nombres" class="form-control">
                     </div>
                     <div class="form-group">
                        <input type="text" id="nit" placeholder="Documento" class="form-control">
                     </div>
                     <div class="form-group">
                        <input type="text" id="direccion" placeholder="Direccion" class="form-control">
                     </div>
                     <div class="form-group">
                        <input type="text" id="telefono" placeholder="Telefono" class="form-control">
                     </div>
                     <div class="form-group">
                        <input type="text" id="email" placeholder="Email" class="form-control">
                     </div>
                     <div class="form-group">
                        <input type="date" id="vinculacion" placeholder="Vinculacion" class="form-control">
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="activo" checked name="activo">
                        <label class="form-check-label" for="flexCheckChecked">
                         Activo
                     </div>   
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="interno" checked name="interno">
                        <label class="form-check-label" for="flexCheckChecked">
                         Interno
                     </div>   
                     <div class="row form-group p-2">
                        <button type="submit" class="btn btn-primary d-grid gap-2 text-center">Actualizar Datos</button>
                     </div>
                    </form>
               </div>
           </div>
        </div>
        <div class="col-md-8">

           <table class="table table-striped table-sm ">
               <thead>
                  <tr>
                      <td>Id</td>
                      <td>Cliente</td>
                      <td>Documento</td>
                      <td>Direccion</td>
                      <td>Telefono</td> 
                      <td>Accion</td>
                  </tr>
               </thead>
               <tbody id="clientes"></tbody>
           </table>

        </div>
    </div>  
</div>
   <!-- JavaScript Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   <script
			  src="https://code.jquery.com/jquery-3.6.1.js"
			  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
			  crossorigin="anonymous">
   </script>
   <script src="tecnicos.js"></script>
<?php
      include "Generales/piepagina.php" ;
?>  