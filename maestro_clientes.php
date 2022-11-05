<?php
   include "Generales/cabecera2.php";
?>   

<div class="container p-2">
<h1>Maestro de Clientes</h1>
 
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
                     <div class="row form-group p-2">
                        <button type="submit" class="btn btn-primary d-grid gap-2 text-center">Actualizar Datos</button>
                     </div>
                    </form>
               </div>
           </div>
        </div>
        <div class="col-md-8">
           <div class="card" my-4 id="resultado">
              <div class="card-body">
                  <ul id="contenido"></ul>
              </div>
           </div>
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
   <script
			  src="https://code.jquery.com/jquery-3.6.1.js"
			  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
			  crossorigin="anonymous">
   </script>
   <script src="app.js"></script>
<?php
      include "Generales/piepagina.php" ;
?>  