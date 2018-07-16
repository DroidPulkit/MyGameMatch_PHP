<?php

include("dbconnect.php");
include("db-functions.php");

$data = array();
//$user = "carol@gmail.com";//$_POST["user"];//$_SESSION["user"];

/*$listEvents = listUserEvents($conection, $user);

foreach($listEvents as $row)
{
 $data[] = array(
  'user'     => $row["user"],
  'event'    => $row["event"],
  'priority' => $row["priority"]
 );
}

echo json_encode($data);*/





if(isset($_GET['user'])){
  $user = $_GET['user'];
  $sql = "SELECT * FROM userevent WHERE user = (SELECT id FROM user WHERE email = '$user')";

  $result = mysqli_query($con, $sql);

  $outp = array();

  $outp = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
  echo json_encode($outp);
  //echo print_r($outp);
}
?>