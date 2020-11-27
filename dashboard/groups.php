<?php

include_once ('header.php');
include_once ('functions.php');
?>
<ul class="list-group mb-3">

    <?php
    $query = getAllGroups();

    while ($data = mysqli_fetch_array($query)) { ?>

        <li class="list-group-item d-flex justify-content-between lh-condensed"><?php echo $data['group_name']; ?> <a type="button" class="btn btn-sm btn-outline-success" href="deleteGame.php?id=<?php echo $data['game_id']; ?>">beitreten</a></li>



    <?php } ?>
  </li>
</ul>
