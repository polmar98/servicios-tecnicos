<?php
   session_start();
   $idregistro = 0;
   if(!isset($_POST['usuario']) || !isset($_POST['clave'])) {
   } else {
       $usuario = $_POST['usuario'];
       $clave = $_POST['clave'];
       $pass = md5($clave);
       //echo $pass;
       include "Generales/database.php";
       $query1 = "select A.*,B.id as xtecnico from gnr_usuario A left join ser_tecnicos B ";
       $query1 = $query1."on B.terceroid=A.usu_terceroid where A.usu_login='$usuario' and A.usu_password='$pass' ";
       $result = mysqli_query($conexion, $query1);
       $idregistro = 0;
       $usutecnico = 0;
       while($row = mysqli_fetch_array($result)) {
          $idregistro = $row['id'];
          $usutecnico = $row['xtecnico'];
          if(is_null($usutecnico)) $usutecnico = 0;
          $_SESSION['idusuario'] = $idregistro;
          $_SESSION['administrador'] = $row['usu_administrador'];
          $_SESSION['usutecnicoid'] = $usutecnico;
       } 
   }
   echo $idregistro;

?>