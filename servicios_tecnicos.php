<?php
   include "Generales/cabecera.php";
?>   
<div class="container p-2">
    <h1>Servicios Tecnicos</h1>
    <div class="row">
        <table class="table table-striped table-sm ">
            <thead>
               <tr>
                   <td>Orden</td>
                   <td>item</td>
                   <td>Fecha</td>
                   <td>Cliente</td>
                   <td>Equipo</td> 
                   <td>Tecnico</td>
                   <td>Estado</td>
               </tr>
            </thead>
            <tbody id="sertecnicos"></tbody>
        </table>
    </div>  
</div>
   <!-- JavaScript Bundle with Popper -->
   <script
			  src="https://code.jquery.com/jquery-3.6.1.js"
			  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
			  crossorigin="anonymous">
   </script>
   <script src="sertecnicos.js"></script>
<?php
      include "Generales/piepagina.php" ;
?>      