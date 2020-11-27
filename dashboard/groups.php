<?php

include_once ('header.php');
include_once ('functions.php');
session_start();
?>
<ul class="list-group mb-3">

    <?php
    $query = getAllGroups($_SESSION['user_id']);

    while ($data = mysqli_fetch_array($query)) {

        if($data['joined']) {
          ?>
          <li class="list-group-item d-flex justify-content-between lh-condensed"><?php echo $data['group_name']; ?>
            <a type="button" class="btn btn-sm btn-outline-danger" href="deleteGame.php?id=<?php echo $data['group_id']; ?>">austreten</a></li>
          <?php
        } else {
          ?>
          <li class="list-group-item d-flex justify-content-between lh-condensed"><?php echo $data['group_name']; ?>
            <a type="button" class="btn btn-sm btn-outline-success" href="deleteGame.php?id=<?php echo $data['group_id']; ?>">beitreten</a></li>
          <?php
        }
        ?>

    <?php } ?>
  </li>
</ul>
