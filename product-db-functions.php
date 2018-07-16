<?php
include("dbconnect.php");

function updateUserID($baseball, $basketball, $football, $hockey, $soccer, $user) {
$products = array();

$whereStatement = "UPDATE user SET isFirstTimeLogin=0, Baseball = $baseball, Basketball = $basketball, Football = $football, IceHockey = $hockey, Soccer = $soccer WHERE email='$user'";

$con = mysqli_connect('179.188.16.39','mygamematchdb','senha123', 'mygamematchdb') or die(mysql_error());

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $resultSet = mysqli_query($con, $whereStatement);

  //debug
  //echo $whereStatement;
   return $resultSet;
}


/*Functions to use as reference, After the CRUD I will delete all of them*/
function createOrderItems($orderID, $itemsConcat) {
$products = array();
$dateCreated = date("Y/m/d");

$itemLists = explode(';', $itemsConcat);

echo "ORDERID: " .$orderID;

foreach ($itemLists as $item){
  //echo $item;
  //echo "<br>";
  //echo $item;
  $itemDataExploded = explode(',', $item);

    echo "<br>";
    $whereStatement = "insert into ordersitens(ID, productID, quantity, OrderID) VALUES (null, $itemDataExploded[0], $itemDataExploded[2], $orderID)";
echo $whereStatement;

    //por que ele nao acha o connection pelo db-connect.php?
    $connection = mysqli_connect("caiouechidb.mysql.dbaas.com.br", "caiouechidb", "senha123", "caiouechidb");

    $resultSet = mysqli_query($connection, $whereStatement);

    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
};




     return $resultSet;
}

function getLatestOrder($userID){
  $products = array();
  $whereStatement = "SELECT * FROM `orders` where userid = $userID order by id desc";

echo $whereStatement;
  //por que ele nao acha o connection pelo db-connect.php?
  $connection = mysqli_connect("caiouechidb.mysql.dbaas.com.br", "caiouechidb", "senha123", "caiouechidb");

  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $resultSet = mysqli_query($connection, $whereStatement);
    while($product = mysqli_fetch_assoc($resultSet)) {
        array_push($products,$product);
     };

     mysqli_close($connection);

echo "ORDERID IS: " . $products[0]["ID"];
     return $products[0]["ID"];
}

function createOrder($userID, $hdnFinal, $StoreSelected) {
$products = array();
$dateCreated = date("Y/m/d");

$whereStatement = "insert into orders(ID, userID, TotalValue, DateCreated, StoreSelected) VALUES (NULL, $userID, $hdnFinal, $dateCreated, '$StoreSelected')";
echo $whereStatement;
//por que ele nao acha o connection pelo db-connect.php?
$connection = mysqli_connect("caiouechidb.mysql.dbaas.com.br", "caiouechidb", "senha123", "caiouechidb");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $resultSet = mysqli_query($connection, $whereStatement);

     return $resultSet;
}

function selectUserID($userID) {
$products = array();
$whereStatement = "select * from users where ID ='$userID'";

//por que ele nao acha o connection pelo db-connect.php?
$connection = mysqli_connect("caiouechidb.mysql.dbaas.com.br", "caiouechidb", "senha123", "caiouechidb");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $resultSet = mysqli_query($connection, $whereStatement);
  while($product = mysqli_fetch_assoc($resultSet)) {
      array_push($products,$product);
   };

   mysqli_close($connection);

   return $products;
}

function onePercentTotalAmount($userID) {
$products = array();
$whereStatement = "select * from orders where userID ='$userID'";

//por que ele nao acha o connection pelo db-connect.php?
$connection = mysqli_connect("caiouechidb.mysql.dbaas.com.br", "caiouechidb", "senha123", "caiouechidb");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $resultSet = mysqli_query($connection, $whereStatement);
  while($product = mysqli_fetch_assoc($resultSet)) {
      array_push($products,$product);
   };

   mysqli_close($connection);

   return $products;
}


function selectUsername($username, $password) {
$products = array();
//$whereStatement = "select * from DBUSERS where username =" + $username + " and password = " + $password;
$whereStatement = "select * from users where Email ='$username' and password = '$password'";

//por que ele nao acha o connection pelo db-connect.php?
$connection = mysqli_connect("caiouechidb.mysql.dbaas.com.br", "caiouechidb", "senha123", "caiouechidb");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $resultSet = mysqli_query($connection, $whereStatement);
  while($product = mysqli_fetch_assoc($resultSet)) {
      array_push($products,$product);
   };

   mysqli_close($connection);

   return $products;
}

function selectProducts() {
$products = array();
$whereStatement = "select * from products";

//por que ele nao acha o connection pelo db-connect.php?
$connection = mysqli_connect("caiouechidb.mysql.dbaas.com.br", "caiouechidb", "senha123", "caiouechidb");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $resultSet = mysqli_query($connection, $whereStatement);
  while($product = mysqli_fetch_assoc($resultSet)) {
      array_push($products,$product);
   };

   mysqli_close($connection);

   return $products;
}

function showTables() {
  $results = array();
  //$whereStatement = "select * from DBUSERS where username =" + $username + " and password = " + $password;
  $queryStatement = "show tables from northwind";

  //por que ele nao acha o connection pelo db-connect.php?
  $connection = mysqli_connect("caiouechidb.mysql.dbaas.com.br", "caiouechidb", "", "Northwind");

  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $resultSet = mysqli_query($connection, $queryStatement);
    while($result = mysqli_fetch_assoc($resultSet)) {
        array_push($results, $result);
     };

     mysqli_close($connection);

     return $results;
}

function selectColumnData($selectStatement) {
  $results = array();
  //$whereStatement = "select * from DBUSERS where username =" + $username + " and password = " + $password;
  $queryStatement = $selectStatement;

  //por que ele nao acha o connection pelo db-connect.php?
  $connection = mysqli_connect("caiouechidb.mysql.dbaas.com.br", "caiouechidb", "", "Northwind");

  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  };

    $sql= $selectStatement;

    if ($result=mysqli_query($connection,$sql))
      {

$row = mysqli_fetch_assoc($result);
      // Get field information for all fields
$x = array_keys($row);
      // Free result set
      mysqli_free_result($result);
    }

    mysqli_close($connection);
    return $x;
}

function executeQuery($query) {
  $results = array();
  //$whereStatement = "select * from DBUSERS where username =" + $username + " and password = " + $password;
  $queryStatement = $query;

  //por que ele nao acha o connection pelo db-connect.php?
  $connection = mysqli_connect("caiouechidb.mysql.dbaas.com.br", "caiouechidb", "senha123", "caiouechidb");

  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

//echo $queryStatement;
    $resultSet = mysqli_query($connection, $queryStatement);

if ($resultSet != null){
  while($result = mysqli_fetch_assoc($resultSet)) {
      array_push($results, $result);
   };
}


       mysqli_close($connection);

if ($resultSet == true){
  echo "<h3 style='color:blue'>executed succesfully.</h3>";
}else{
  echo "<h3 style='color:red'>query error.</h3>";
}
//echo "query: <span style='color:blue'>$query </span><br>";

       return $results;
}

function selectData($selectStatement) {
  $results = array();
  //$whereStatement = "select * from DBUSERS where username =" + $username + " and password = " + $password;
  $queryStatement = $selectStatement;

  //por que ele nao acha o connection pelo db-connect.php?
  $connection = mysqli_connect("caiouechidb.mysql.dbaas.com.br", "caiouechidb", "", "Northwind");

  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $resultSet = mysqli_query($connection, $queryStatement);
    while($result = mysqli_fetch_assoc($resultSet)) {
        array_push($results, $result);
     };

     mysqli_close($connection);

     return $results;
}

function descTable($tableName) {
  $results = array();
  //$whereStatement = "select * from DBUSERS where username =" + $username + " and password = " + $password;
  $queryStatement = "desc $tableName";

  //por que ele nao acha o connection pelo db-connect.php?
  $connection = mysqli_connect("caiouechidb.mysql.dbaas.com.br", "caiouechidb", "", "Northwind");

  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $resultSet = mysqli_query($connection, $queryStatement);
    while($result = mysqli_fetch_assoc($resultSet)) {
        array_push($results, $result);
     };

     mysqli_close($connection);

     return $results;
}


function listProducts($conection) {
  $products = array();
  $resultSet = mysqli_query($conection, "select * from product");
  while($product = mysqli_fetch_assoc($resultSet)) {
      array_push($products,$product);
   }
   return $products;
}

function insertProduct($conection, $name, $price) {
    $query = "insert into product (name, price) values ('{$name}', {$price})";
    return mysqli_query($conection, $query);
}

function insertUser($email, $password, $name, $gender, $dob, $completeAddress) {
    $query = "insert into users (Email, password, name, gender, dob, CompleteAddress) values ('{$email}', '{$password}', '{$name}', '{$gender}', '{$dob}', '{$completeAddress}')";
    return executeQuery($query);
}


function removeProduct($conection, $id) {
    $query = "delete from product where id = {$id}";
    return mysqli_query($conection, $query);
}

?>
