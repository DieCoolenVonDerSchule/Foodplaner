<?php

include_once ('header.php');
include_once ('functions.php');

if (isset($_POST['submit'])){

    $plandate = $_POST['date'];
    $recipe_id = $_POST['recipe_id'];

    setNewCalenderEntry($recipe_id, $plandate);
}
var_dump($_POST);
//var_dump($plandate);
//var_dump($recipe_id);


// header('location: index.php');
//exit;


?>
