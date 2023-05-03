<?php
include '../db.php';
include '../shared/header.php';

if (isset($_POST['crear_genero'])) {
   $genero_nombre = $_POST['genero_nombre'];
   $query = "INSERT INTO `generos`(`genero`) VALUES ('$genero_nombre')";

   $resultado_crear = mysqli_query($conn, $query);
   if (!$resultado_crear) {
      die("Ocurrio un erro al intentar crear un genero");
   }

   header('Location: crear_genero.php');
}

?>

<div class="container">
   <h1 class="h1">Generos</h1>
   <div class="row">
      <div class="col-sm-6">
         <form action="crear_genero.php" method="POST">
            <div class="mb-3">
               <label for="gen_name" class="form-label">Genero cinematografico</label>
               <input type="text" class="form-control" id="gen_name"" name="genero_nombre">
            </div>
            <button type="submit" class="btn btn-primary" name="crear_genero">Crear genero</button>
         </form>
      </div>
      <div class="col-sm-6">
         <table class="table table-striped table-hover">
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Genero</th>
                  <th>Acciones</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $query_select = "SELECT * FROM `generos`";
               $resultados_generos = mysqli_query($conn, $query_select);

               while ($genero = mysqli_fetch_array($resultados_generos)) { ?>

                  <tr>
                     <td>
                        <?= $genero['id_gen'] ?>
                     </td>
                     <td>
                        <?= $genero['genero'] ?>
                     </td>
                     <td>
                        <a href="edit_genero.php?id=<?= $genero['id_gen'] ?>" class="btn btn-secondary">
                           <i class="fas fa-solid fa-pencil"></i>
                        </a>
                        <a href="bor_genero.php?id=<?= $genero['id_gen'] ?>" class="btn btn-danger">
                           <i class="fa-solid fa-trash" style="color: #fff;"></i>
                        </a>
                     </td>
                  </tr>

               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>

<?php include '../shared/footer.php'; ?>