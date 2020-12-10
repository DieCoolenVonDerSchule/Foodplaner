<?php
session_start();

include_once ('header.php');

include_once('functions.php');

if(!isset($_SESSION['user_id'])){
  header('location: login.php');
  exit;
}

$sql='SELECT  calender_entry_id, recipe_name, calender_entry_date, datediff(calender_entry_date, CURDATE()) as Daydiff
FROM calender_entry
JOIN recipes ON (calender_entry.recipe_id = recipes.recipe_id)
JOIN users_groups ON (calender_entry.group_id = users_groups.group_id)
JOIN users ON (users_groups.user_id = users.user_id)
WHERE calender_entry_date >= CURDATE()
AND calender_entry_date < DATE_ADD(CURDATE(), INTERVAL 7 DAY)
AND users.user_id = '.$_SESSION['user_id'];

$con = getConnection();
$query = mysqli_query($con, $sql);

$sorted = array();

for($i = 0; $i<7; $i++){
  array_push($sorted, array(array(), array()));
}

while ($data = mysqli_fetch_array($query)) {
  array_push($sorted[$data['Daydiff']][0], $data['calender_entry_id']);
  array_push($sorted[$data['Daydiff']][1], $data['recipe_name']);
}

$dayNames = array("Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag", "Sonntag");

?>
<div class="col-sm-12">
  <h2> Kalender </h2>
</div>
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
            if(!empty($sortedData[1])){
              $entry = "";
              for($i = 0; $i<count($sortedData[1]); $i++){
                $entry = $entry.$sortedData[1][$i].'<a href="deleteEntry.php?id='.$sortedData[0][$i].'"><img src="https://p7.hiclipart.com/preview/915/325/315/rubbish-bins-waste-paper-baskets-computer-icons-recycling-bin-trash-can-icons-no-attribution.jpg" style="width:32px;height:32px"></a><br>';
              }
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
