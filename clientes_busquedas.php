<?php
   include "Generales/database.php";
   $search = $_POST['search'];
   if(!empty($search)){
      $query1="select * from gnr_tercero where ter_tercero like '$search%' order by ter_tercero";
   } else {
      $query1="select * from gnr_tercero order by ter_tercero";
   }

   $result = mysqli_query($conexion, $query1);
   $json = array();
   while($row = mysqli_fetch_array($result)) {
         $json[] = array(
            'id'=>$row['id'],
            'apellido1'=>$row['ter_apellido1'],
            'apellido2'=>$row['ter_apellido2'],
            'nombre1'=>$row['ter_nombre1'],
            'nombre2'=>$row['ter_nombre2'],
            'razon'=>$row['ter_tercero'],
            'documento'=>$row['ter_documento'],
            'direccion'=>$row['ter_direccion'],
            'telefono'=>$row['ter_telefono'],
            'email'=>$row['ter_email']
         );
   }
   $jsonstring = json_encode($json);
   echo $jsonstring;
    
?>