<?php

include_once ('header.php');
include_once ('functions.php');

$user_id = $_GET['user_id'];
$group_id = $_GET['group_id'];

leaveGroup($user_id, $group_id);

header('location: groups.php');
exit;

?>
