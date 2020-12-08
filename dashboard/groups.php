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

          echo '<li class="list-group-item d-flex justify-content-between lh-condensed">'.$data['group_name'].'
            <a type="button" class="btn btn-sm btn-outline-danger" href="groupLeave.php?group_id='.$data['group_id'].'&user_id='.$_SESSION['user_id'].'">austreten</a></li>';

        } else {

          echo '<li class="list-group-item d-flex justify-content-between lh-condensed">'.$data['group_name'].'
            <a type="button" class="btn btn-sm btn-outline-success" href="groupJoin.php?group_id='.$data['group_id'].'&user_id='.$_SESSION['user_id'].'">beitreten</a></li>';
        }
        ?>

    <?php } ?>
  </li>
</ul>
