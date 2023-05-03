<?php
include '../db.php';
include '../shared/header.php';

// Guardar en la base de datos
if (isset($_POST['crear_peli'])) {
   $nombre_peli = $_POST['nombre'];
   $poster_peli = $_POST['poster_url'];
   $genero_peli = $_POST['genero'];
   $dir_peli = $_POST['director'];
   $dur_peli = $_POST['duracion'];
   $est_peli = $_POST['estreno'];
   $sin_peli = $_POST['sinopsis'];

   $query_crear_peli = "INSERT INTO `peliculas`(`peli_nombre`, `url_poster`, `gen_id`, `dir_id`, `duracion`, `estreno`, `sinopsis`) VALUES ('$nombre_peli','$poster_peli','$genero_peli','$dir_peli','$dur_peli','$est_peli','$sin_peli')";

   $result_crear_peli = mysqli_query($conn, $query_crear_peli);

   if (!$result_crear_peli) {
      die('Ocurrio un error al tratar de insertar la pelicula.');
   }

   header('Location: crear_peli.php');
}


?>

<div class="container mt-3 p-3 bg-secondary text-white" action="crear_peli.php">
   <form method="POST" >
      <h1 class="h1 text-center">Agregar pelicula</h1>
      <div class="row">
         <div class="col-sm-6">
                  <div class="mb-3">
         <label for="nom_peli" class="form-label">Nombre pelicula</label>
         <input type="text" class="form-control" id="nom_peli" placeholder="Nombre de la pelicula" name="nombre">
      </div>
      <div class="mb-3">
         <label for="poster_url" class="form-label">Poster</label>
         <input type="text" class="form-control" id="poster_url" placeholder="URL del poster" name="poster_url">   
      </div>
      <div class="mb-3">
         <label for="genero" class="form-label">Seleccione un genero</label>
         <select id="genero" class="form-select"  name="genero">
            <option selected>Genero peli</option>
            <?php 
               // Generos
               $query_gen = "SELECT * FROM `generos`";
               $result_gen = mysqli_query($conn, $query_gen);

               while ($genero = mysqli_fetch_array($result_gen)) { ?>
                  <option value="<?= $genero['id_gen'] ?>"><?= $genero['genero'] ?></option>
            <?php } ?>
         </select>
      </div>
      <div class="mb-3">
         <label for="director" class="form-label">Seleccione un director</label>
         <select id="director" class="form-select"  name="director">
            <option selected>Director peli</option>
            <?php
               // Directores
               $query_dir = "SELECT * FROM `directores`";
               $result_directores = mysqli_query($conn, $query_dir);

               while ($director = mysqli_fetch_array($result_directores)) { ?>
                  <option value="<?= $director['id_dir'] ?>"><?= $director['nombre'] ?></option>
                  >
            <?php } ?>
         </select>
      </div>
      <div class="mb-3">
         <label for="dur" class="form-label">Duracion pelicula</label>
         <input type="number" class="form-control" id="dur" name="duracion" placeholder="Duracion en minutos">
      </div>
      <div class="mb-3">
         <label for="estre" class="form-label">Estreno pelicula</label>
         <input type="number" class="form-control" id="estre" placeholder="Anio de estreno" name="estreno">
      </div>
      <div class="mb-3">
         <label for="sino" class="form-label">Sinopsis</label>
         <textarea class="form-control" id="sino" rows="3" name="sinopsis"></textarea>
      </div>
      <div class="d-grid gap-2">
         <button type="submit" class="btn btn-success ml-auto btn-lg" name="crear_peli">Submit</button>
      </div>
         </div>
         <div class="col-sm-6 bg-white">
            
         </div>
      </div>
   </form>  
</div>

<?php include '../shared/footer.php'; ?>