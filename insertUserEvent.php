<?php

include("dbconnect.php");
include("db-functions.php");

$data = array();

if(isset($_GET['user'])){
  $user = $_GET['user'];
  $event = $_GET['event'];
  $priority = $_GET['priority'];

  $sql = "INSERT INTO userevent (user, event, priority) VALUES ((SELECT id FROM user WHERE email = '$user'), '$event', '$priority')";

  $result = mysqli_query($con, $sql);

  /*$outp = array();

  $outp = mysqli_fetch_all($result, MYSQLI_ASSOC);*/
  
  echo json_encode($result);
}
?>