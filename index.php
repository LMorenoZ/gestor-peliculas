<?php
   include 'shared/header.php';
   include 'db.php';
   
?>

<div class="container">
   <div class="row">
      <?php
         $query = "SELECT * FROM `peliculas`";
         $result = mysqli_query($conn, $query);

         while ($peli = mysqli_fetch_array($result)) { ?>

            <div class="card m-3" style="width: 18rem;" data-bs-toggle="modal" data-bs-target="#peli-<?= $peli['id_peli'] ?>" role="button">
               <img src="<?= $peli['url_poster'] ?>" class="card-img-top">
               <div class="card-body">
                  <p class="card-text"><?= $peli['peli_nombre'] ?></p>
                  <div class="d-flex justify-content-between">
                     <p class="fw-light"><?= $peli['duracion'] ?> min</p>
                     <p class="fw-light"><?= $peli['estreno'] ?></p>
                  </div>
               </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="peli-<?= $peli['id_peli'] ?>" tabindex="-1" aria-hidden="true">
               <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                     <div class="modal-header">
                     <h1 class="modal-title fs-5 text-center"><?= $peli['peli_nombre'] ?></h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-sm-6">
                              <img class="img-fluid" src="<?= $peli['url_poster'] ?>" alt="peli"> 
                           </div>
                           <div class="col-sm-6">
                              <div><p><strong>Genero: </strong><?= $peli['gen_id'] ?></p></div>
                              <hr>
                              <div><p><strong>Director:</strong> <?= $peli['dir_id'] ?></p></div>
                              <hr>
                              <div><p><strong>Duracion:</strong> <?= $peli['duracion'] ?> minutos</p></div>
                              <hr><div><p><strong>Estreno:</strong> <?= $peli['estreno'] ?></p></div>
                              <hr>
                              <div><p><strong>Sinopsis:</strong> <?= $peli['sinopsis'] ?></p></div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     </div>
                  </div>
               </div>
            </div>
      <?php } ?>
   </div>
</div>
   
<?php include 'shared/footer.php'; ?>