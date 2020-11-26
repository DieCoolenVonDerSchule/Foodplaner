<?php
include_once('header.php');
include_once('functions.php');


    $recipe = getRecipeByID($_GET['id']);
?>


<body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="<?php echo $recipe['recipe_image']; ?>" alt="" width="200" height="180">
    <h2><?php echo $recipe['recipe_name']; ?></h2>
    <p class="lead"><?php echo $recipe['recipe_description']; ?></p>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Zutaten</span>
      </h4>
      <ul class="list-group mb-3">

          <?php
          $query = getRecipeByIDWithUnits($_GET['id']);

          while ($data = mysqli_fetch_array($query)) { ?>

              <li class="list-group-item d-flex justify-content-between lh-condensed"><?php echo $data['quantity'].' '.$data['recipe_unit'].' '.$data['ingredients_name']; ?></li>



                <?php } ?>
        </li>
      </ul>


    </div>
  </div>



<?php include_once('footer.php'); ?>
