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

?>
