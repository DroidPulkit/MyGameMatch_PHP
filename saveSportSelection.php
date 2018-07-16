<?php
include("product-db-functions.php");

$football = intval($_POST["football"]);
$baseball = intval($_POST["baseball"]);
$basketball = intval($_POST["basketball"]);
$hockey = intval($_POST["hockey"]);
$soccer = intval($_POST["soccer"]);
$user = $_POST["user"];

//$sql = "UPDATE user SET isFirstTimeLogin=0, Baseball = $baseball, Basketball = $basketball, Football = $football, Ice Hockey = $hockey, Soccer = $soccer WHERE email=$user"

updateUserID($baseball, $basketball, $football, $hockey, $soccer, $user);

//Do mysqli update here and if it is update instead of below echo $sql do echo "success" if fail do echo "fail", then check that in sports_selection.php in the success function if data == "success" then move header to home.php ok?
//echo $sql;

//if (is_ajax()) {
  //Pulkit, I took out the code from here, because for some reason this function is not working.
 //else {
  //  echo "football not set";
  //}
//}
//else {
    //echo "Not ajax";
//}

//Function to check if the request is an AJAX request
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

?>
