<?php

include_once ('header.php');
include_once ('functions.php');

session_start();
?>

<h2> Einkaufsliste </h2>
<ul class="list-group mb-3">

    <?php
    $query = getShoppingListData($_SESSION['user_id']);

    while ($data = mysqli_fetch_array($query)) { ?>

        <li class="list-group-item d-flex justify-content-between lh-condensed"><?php echo $data['quantity'].' '.$data['recipe_unit'].' '.$data['ingredients_name']; ?></li>



          <?php } ?>
  </li>
</ul>

<?php
  include_once ('footer.php');
?>
