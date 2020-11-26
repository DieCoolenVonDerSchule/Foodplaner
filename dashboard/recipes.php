<?php

include_once ('header.php');
include_once('functions.php');
?>

<h2> Rezepte </h2>

  <main role="main">

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">

          <?php
          $query = getRecipes();
          while ($data = mysqli_fetch_array($query)) {
           ?>


        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img width="100%" src="<?php echo $data['recipe_image']; ?>"/>
            <div class="card-body">
              <p class="card-text">    <?php echo $data['recipe_name']; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a type="button" class="btn btn-sm btn-outline-secondary" href="plan.php?id=<?php echo $data['recipe_id']; ?>">Planen</a>
                  <a type="button" class="btn btn-sm btn-outline-secondary" href="recipe_desc.php?id=<?php echo $data['recipe_id']; ?>">Beschreibung</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    

    <?php } ?>

      </div>
    </div>
  </div>

</main>


<?php
 include_once ('footer.php');
?>
