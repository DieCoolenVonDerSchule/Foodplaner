<?php

function getConnection(){
$mysqlhost="localhost";
$mysqluser="root";
$mysqlpwd="";
$mysqldb="foodplaner";

$connection=mysqli_connect($mysqlhost, $mysqluser, $mysqlpwd, $mysqldb)
    or die("DB Conneciton ERROR!");
    return $connection;
}


function getRecipes() {
  $con = getConnection();
  $sql = 'SELECT * FROM recipes';
  $query = mysqli_query($con,$sql);
  return $query;
}

function getRecipeByID($id){
    $con = getConnection();
    $sql = "SELECT * FROM recipes WHERE recipe_id = $id";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($query);
    return $data;
}

function setNewCalenderEntry($recipe_id, $plandate) { // Group_id muss noch ergänzt werden
  $con = getConnection();
  echo $recipe_id;
  $sql = "INSERT INTO `calender_entry` (`calender_entry_id`, `calender_entry_date`, `group_id`, `recipe_id`) VALUES (NULL, '{$plandate}', '1', {$recipe_id});";
  $query = mysqli_query($con, $sql);
  return $query;
}

?>
