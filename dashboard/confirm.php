<?php

include_once ('header.php');
include_once ('functions.php');

if (isset($_POST['submit'])){

    $plandate = $_POST['date'];
    $recipe_id = $_POST['recipe_id'];
    $group_id = $_POST['group'];

    setNewCalenderEntry($recipe_id, $plandate, $group_id);
}

header('location: index.php');
exit;


?>
