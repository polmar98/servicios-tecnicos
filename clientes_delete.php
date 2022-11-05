<?php
   include "Generales/database.php";
   if(isset($_POST['id'])) {
      $id = $_POST['id'];
      $query1="delete from gnr_tercero where id='$id' ";
      $result = mysqli_query($conexion, $query1);
      if(!$result) {
         die("Query fallido");
      }
      echo "Cliente eliminado-ok";
   }
?>