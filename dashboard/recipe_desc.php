<?php
include_once('header.php');
include_once('functions.php');


    $recipe = getRecipeByID($_GET['id']);
?>


<body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="/docs/4.5/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h2><?php echo $recipe['recipe_name']; ?></h2>
    <p class="lead"><?php echo $recipe['recipe_description']; ?></p>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Zutaten</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"><?php echo $recipe['recipe_name']; ?></h6>
          </div>
          <span class="text-muted"><?php echo $recipe['recipe_description']; ?> €</span>
        </li>
      </ul>


    </div>
  </div>



<?php include_once('footer.php'); ?>
