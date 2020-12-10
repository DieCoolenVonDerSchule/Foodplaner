<?php

include_once ('header.php');
include_once ('functions.php');

session_start();
?>
<div class="col-sm-12">
<h2> Einkaufsliste </h2>
<ul class="list-group mb-3">

    <?php
    $query = getShoppingListData($_SESSION['user_id']);

    while ($data = mysqli_fetch_array($query)) { ?>

        <li class="list-group-item col-md-3"><?php echo $data['quantity'].' '.$data['recipe_unit'].' '.$data['ingredients_name']; ?></li>
          <?php } ?>
  </li>
</ul>
</div>

<?php
  include_once ('footer.php');
?>
