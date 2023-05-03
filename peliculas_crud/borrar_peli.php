<?php 
   include '../db.php';

   if(isset($_GET['id'])) {
      $id_peli = $_GET['id'];
      $query = "DELETE FROM `peliculas` WHERE id_peli = '$id_peli'";

      $result = mysqli_query($conn, $query);

      if(!$result) {
         die("Ocurrio un error al intentar borrar");
      }

      header('Location: crear_peli.php');
   } 

?>