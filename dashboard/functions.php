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

function getShoppingListData(){
    $con = getConnection();
    $sql = "SELECT ingredients.ingredients_name, SUM(ingredients_recipes.quantity) as quantity, ingredients_recipes.recipe_unit
            FROM ingredients_recipes JOIN ingredients
            ON ingredients_recipes.ingredient_id = ingredients.ingredients_id JOIN recipes
            ON recipes.recipe_id = ingredients_recipes.recipe_id JOIN calender_entry
            ON calender_entry.recipe_id = recipes.recipe_id
            WHERE calender_entry.calender_entry_date <= NOW() + INTERVAL 7 DAY
            group BY ingredients.ingredients_id;";
    $query = mysqli_query($con, $sql);
    return $query;
}

function getRecipeByIDWithUnits($id){
    $con = getConnection();
    $sql = "SELECT * FROM ingredients_recipes JOIN ingredients ON (ingredients_recipes.ingredient_id = ingredients.ingredients_id) WHERE ingredients_recipes.recipe_id = $id;";
    $query = mysqli_query($con, $sql);
    return $query;
}

function setNewCalenderEntry($recipe_id, $plandate) { // Group_id muss noch ergänzt werden
  $con = getConnection();
  echo $recipe_id;
  $sql = "INSERT INTO `calender_entry` (`calender_entry_id`, `calender_entry_date`, `group_id`, `recipe_id`) VALUES (NULL, '{$plandate}', '1', {$recipe_id});";
  $query = mysqli_query($con, $sql);
  return $query;
}

?>
