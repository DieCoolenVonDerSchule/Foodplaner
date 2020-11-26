<?php

include_once ('header.php');
include_once ('functions.php');

$recipe_id = $_GET['id'];



?>

<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">

    <!-- Form code begins -->
    <form class="needs-validation" novalidate action="confirm.php" method="POST">
      <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">Date</label>
        <input class="form-control" id="date" name="date" placeholder="DD/MM/YYY" type="text"/>
         <input type="hidden" name='recipe_id' value='<?php echo $recipe_id ?>' />
      </div>
      <div class="form-group"> <!-- Submit button -->
        <button class="btn btn-primary " name="submit" type="submit">Submit</button>
      </div>
     </form>
     <!-- Form code ends -->

    </div>
  </div>
 </div>
</div>

<script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
