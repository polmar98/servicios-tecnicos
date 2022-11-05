<?php
      include "Generales/cabecera.php" ;
?> 
<body>
   <div class="container-fluid row">   
      <h1 class="text-center p-2">Ingreso al Sistema</h1> 
      <div class="col-5 p-2">
          <img src="imagenes/login.png" class="d-block w-100" alt="400">
      </div>
      <div class="col-4 p-2">
      <div class="card">
           <div class="card-body">
               <form id="login-form">
                   <div class="form-group">
                      <input type="text" id="usuario" placeholder="Usuario" class="form-control">
                   </div>
                   <div class="form-group">
                      <input type="password" id="clave" placeholder="Contraseña" class="form-control">
                   </div>   
                   <div class="row form-group p-2">
                        <button type="submit" class="btn btn-primary d-grid gap-2 text-center">Ingresar</button>
                   </div> 
                   <div class="container" id="invalida">
                      <h5 class="text-warning">¡ Usuario y/o contraseña no validos !</h5>
                   </div>   
               </form>
           </div>          
         </div>        
      </div>
   </div>
   <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
 

<?php
   include "Generales/piepaginaInicial.php" ;
?> 