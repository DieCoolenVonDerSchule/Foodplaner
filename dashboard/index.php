<?php
session_start();

include_once ('header.php');

include_once('functions.php');

$sql='SELECT recipe_name, calender_entry_date, datediff(calender_entry_date, CURDATE()) as Daydiff FROM calender_entry JOIN recipes ON (calender_entry.recipe_id = recipes.recipe_id) WHERE calender_entry_date >= CURDATE() AND calender_entry_date < DATE_ADD(CURDATE(), INTERVAL 7 DAY)';

$con = getConnection();
$query = mysqli_query($con, $sql);

$sorted = array();

for($i = 0; $i<7; $i++){
  array_push($sorted, array());
}

while ($data = mysqli_fetch_array($query)) {
  array_push($sorted[$data['Daydiff']], $data['recipe_name']);
}

$dayNames = array("Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag", "Sonntag");

?>

<h2> Kalender </h2>
<form method="post" class="form-group form-control-lg ">
  

<table class="table table-striped table-bordered" style="width:100%">

<thead>
  <tr>
    <?php

      for($i = 0; $i<7; $i++) { ?>

            <td><?php  echo $dayNames[(date('w', strtotime(date("Y-m-d"). ' + '.$i.' days'))+6)%7];?></td>

      <?php } ?>
  </tr>
  </thead>

  <tbody>
<?php


foreach($sorted as $sortedData) { ?>

            <td><?php
            if(!empty($sortedData)){
              $entry = "";
              foreach($sortedData as $point) $entry = $entry.$point."<br>";
               echo $entry;
            }
            ?></td>

      <?php } ?>
      </tbody>

  </table>


  <button type="submit"  class="btn btn-primary mb-3" formaction="recipes.php">Gericht hinzufügen</button>

</form>





<?php
 include_once ('footer.php');
?>
