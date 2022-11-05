<?php
   include "Generales/database.php";
   if(isset($_POST['id'])) {
      $id = $_POST['id'];
      $query1="select * from gnr_tercero where id='$id' ";
      $result = mysqli_query($conexion, $query1);
      $json = array();
      while($row = mysqli_fetch_array($result)) {
         $apellidos = trim($row['ter_apellido1']).' '.trim($row['ter_apellido2']);
         $nombres =  trim($row['ter_nombre1']).' '.trim($row['ter_nombre2']);
         $apellidos = trim($apellidos);
         $nombre = trim($nombres);
         $json[] = array(
            'id'=>$row['id'],
            'apellidos'=>$apellidos,
            'nombres'=>$nombres,
            'razon'=>$row['ter_tercero'],
            'documento'=>$row['ter_documento'],
            'direccion'=>$row['ter_direccion'],
            'telefono'=>$row['ter_telefono'],
            'email'=>$row['ter_email']
         );
      }
      $jsonstring = json_encode($json[0]);
      echo $jsonstring;
   }
?>