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

function getAllGroups($id) {
  $con = getConnection();
  $sql = "SELECT groups.group_name, groups.group_id, (dunno.user_id = $id AND dunno.user_id IS NOT NULL) as joined
From groups LEFT Join (SELECT * From users_groups WHERE user_id = $id) as dunno ON groups.group_id = dunno.group_id
GROUP By groups.group_id";
  $query = mysqli_query($con,$sql);
  return $query;
}

function joinGroup($user_id, $group_id) {
  $con = getConnection();
  $sql = "INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES ('{$user_id}', {$group_id});";
  $query = mysqli_query($con, $sql);
  return $query;
}

function leaveGroup($user_id, $group_id) {
  $con = getConnection();
  $sql = "DELETE FROM `users_groups` WHERE `users_groups`.`user_id` = $user_id AND `users_groups`.`group_id` = $group_id";
  $query = mysqli_query($con, $sql);
  return $query;
}

function getRecipeByID($id){
    $con = getConnection();
    $sql = "SELECT * FROM recipes WHERE recipe_id = $id";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($query);
    return $data;
}

function getShoppingListData($user_id){
    $con = getConnection();
    $sql = "SELECT ingredients.ingredients_name, SUM(ingredients_recipes.quantity) as quantity, ingredients_recipes.recipe_unit
            FROM ingredients_recipes JOIN ingredients
            ON ingredients_recipes.ingredient_id = ingredients.ingredients_id JOIN recipes
            ON recipes.recipe_id = ingredients_recipes.recipe_id JOIN calender_entry
            ON calender_entry.recipe_id = recipes.recipe_id JOIN groups
            ON calender_entry.group_id = groups.group_id JOIN users_groups
            ON groups.group_id = users_groups.group_id
            WHERE calender_entry.calender_entry_date <= NOW() + INTERVAL 7 DAY AND calender_entry.calender_entry_date >= NOW() AND users_groups.user_id = $user_id
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

function setNewCalenderEntry($recipe_id, $plandate, $group_id) { // Group_id muss noch ergänzt werden
  $con = getConnection();
  echo $recipe_id;
  $sql = "INSERT INTO `calender_entry` (`calender_entry_id`, `calender_entry_date`, `group_id`, `recipe_id`) VALUES (NULL, '{$plandate}', '{$group_id}', {$recipe_id});";
  $query = mysqli_query($con, $sql);
  return $query;
}



?>
