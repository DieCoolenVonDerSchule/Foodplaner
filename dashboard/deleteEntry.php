<?php
include_once('header.php');
include_once('functions.php');


$con = getConnection();
$sql = "DELETE FROM calender_entry WHERE calender_entry_id = ".$_GET['id'];
$query = mysqli_query($con, $sql);

header('location: index.php');
exit;

?>