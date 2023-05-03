<?php
include '../db.php';
include '../shared/header.php';

if ( isset($_POST['crear_director']) ) {
   $nom_dir = $_POST['director_nombre'];
   $query = "INSERT INTO `directores`(`nombre`) VALUES ('$nom_dir')";

   $resultado_crear = mysqli_query($conn, $query);
   if (!$resultado_crear) {
      die("Ocurrio un erro al intentar crear un director");
   }

   header('Location: crear_director.php');
}

?>

<div class="container">
   <h1 class="h1">Directores</h1>
   <div class="row">
      <div class="col-sm-6">
         <form action="crear_director.php" method="POST">
            <div class="mb-3">
               <label for="dir_name" class="form-label">Nombre director</label>
               <input type="text" class="form-control" id="dir_name"" name="director_nombre">
            </div>
            <button type="submit" class="btn btn-primary" name="crear_director">Crear director</button>
         </form>
      </div>
      <div class="col-sm-6">
         <table  class="table table-striped table-hover">
            <thead>
               <tr>
                  <th>Id Director</th>
                  <th>Director</th>
                  <th>Acciones</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $query_select = "SELECT * FROM `directores`";
                  $resultados_directores = mysqli_query($conn, $query_select);

                  while($director = mysqli_fetch_array($resultados_directores)) { ?>

                  <tr>
                     <td><?= $director['id_dir']?></td>
                     <td><?= $director['nombre'] ?></td>
                     <td>
                        <a href="edit_director.php?id=<?= $director['id_dir'] ?>" class="btn btn-secondary">
                              <i class="fas fa-solid fa-pencil"></i>
                           </a>
                           <a href="bor_director.php?id=<?= $director['id_dir'] ?>" class="btn btn-danger">
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