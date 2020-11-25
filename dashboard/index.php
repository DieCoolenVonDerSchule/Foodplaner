<?php
session_start();

include_once ('header.php');

include_once('functions.php');

$pdo = new PDO('mysql:host=localhost;dbname=foodplaner', 'root', '');

$sql='SELECT recipe_name, calender_entry_date FROM calender_entry JOIN recipes ON (calender_entry.recipe_id = recipes.recipe_id) WHERE calender_entry_date > CURRENT_TIMESTAMP AND calender_entry_date < DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 7 DAY)';

?>

<h2> Kalender </h2>
<form method="post" class="form-group form-control-lg ">
  

<table class="table table-striped table-bordered" style="width:100%">

<thead>
  <tr>
    <td>Rezept Name</td>
  </tr>
  </thead>

  <tbody>
<?php

$con = getConnection();
$query = mysqli_query($con, $sql);

while ($data = mysqli_fetch_array($query)) { ?>

          <tr>
            <td><?php echo $data['recipe_name']; ?></td>
          </tr>
      <?php } ?>
      </tbody>

  </table>


  <button formaction="recipe.php" type="submit"  class="btn btn-primary mb-3">Gericht hinzufügen</button>

</form>





<?php
 include_once ('footer.php');
?>
