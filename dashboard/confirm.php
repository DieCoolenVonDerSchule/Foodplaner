<?php

include_once ('header.php');
include_once ('functions.php');

if (isset($_POST['submit'])){

    $plandate = $_POST['date'];
    $recipe_id = $_POST['recipe_id'];

    setNewCalenderEntry($recipe_id, $plandate);
}

header('location: index.php');
exit;


?>
