<?php include("dbconnect.php");

function listEvents($conection){
  $listEvents = array();
  $query = "SELECT * FROM events";
  $resultSet = mysqli_query($conection, $query);
  
  while($list = mysqli_fetch_assoc($resultSet)) {
      array_push($listEvents, $list);
   }
   mysqli_close($conection);
   return $listEvents;
}

function listUserEvents($conection, $user){
  $listEvents = array();

  $query = "SELECT * FROM userevent WHERE user = (SELECT id FROM user WHERE email = {'$user'})";
  //SELECT * FROM userevent WHERE user = (SELECT id FROM user WHERE email = 'carol@gmail.com')
  $resultSet = mysqli_query($conection, $query);
  
  while($list = mysqli_fetch_assoc($resultSet)) {
      array_push($listEvents, $list);
   }
   mysqli_close($conection);
   return $listEvents;

}

function saveUserEvents($conection, $user, $event, $priority){
  $listEvents = array();

  $query = "INSERT INTO userevent (user, event, priority) VALUES ((SELECT id FROM user WHERE email = {'$user'}), {'$event'}, {'$priority'})";
  $resultSet = mysqli_query($conection, $query);

  mysqli_close($conection);
  return $listEvents;

}


/*function discount($conection, $useremail){
  $query = "SELECT COUNT(*) as count FROM PAYMENTS WHERE email = '{$useremail}'";
  $resultSet = mysqli_query($conection, $query);
  $lista = mysqli_fetch_assoc($resultSet);
  
   mysqli_close($conection);

  $help = $lista["count"];
  if($help >= 1 && $help < 15){
    $result = $help;
  }else if ($help >= 15){
    $result = 15;
  }else{
    $result = 0;
  }
  return $help;
}

function listStores($conection){
  $listStores = array();
  $query = "SELECT * FROM STORES";
  $resultSet = mysqli_query($conection, $query);
  
  while($list = mysqli_fetch_assoc($resultSet)) {
      array_push($listStores, $list);
   }
   mysqli_close($conection);
   return $listStores;
}

function listProducts($conection){
  $listProducts = array();
  $query = "SELECT * FROM PRODUCTS";
  $resultSet = mysqli_query($conection, $query);
  
  while($list = mysqli_fetch_assoc($resultSet)) {
      array_push($listProducts, $list);
   }
   mysqli_close($conection);
   return $listProducts;
}

function validatePassword($conection, $user, $password){
  $query = "SELECT * FROM USER WHERE email = '{$user}'";
  $resultSet = mysqli_query($conection, $query);
  $row = mysqli_fetch_array($resultSet);

  if (!$row){
    return false;
  }else{
    return $row;
  }  
  mysqli_close($conection);
}


function executeQuery($conection, $query){
  //return mysqli_query($conection, $query);
  $result = mysqli_query($conection, $query);
    while($row = mysqli_fetch_assoc($result)) {
      $resultset[] = $row;
    }   
    if(!empty($resultset)){
      return $resultset;
        
    }
      mysqli_close($conection);
}

function insertUser($conection, $uname, $email, $password, $phone, $birth, $gender, $address){
  $query = "INSERT INTO USER (name, phone, gender, birth, address, email, password) VALUES ('{$uname}', '{$phone}', '{$gender}', '{$birth}', '{$address}', '{$email}', '{$password}')";
  $result = mysqli_query($conection, $query);
  return $result;
}

function insertPayment($conection, $email, $datePay, $discount, $total){
  $query = "INSERT INTO PAYMENTS (email, datePay, discount, total) VALUES ('{$email}', '{$datePay}', '{$discount}', '{$total}')";
  //echo "<br>query=".$query;
  $result = mysqli_query($conection, $query);
  //echo "<br> executo a query=".mysqli_fetch_assoc($result);
  //return executeQuery($conection, $query);//$result;
  return $result;
}


function listTables($conection) {
  $tables = array();
  $query = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='northwind'";
  $resultSet = mysqli_query($conection, $query);
  while($table = mysqli_fetch_assoc($resultSet)) {
      array_push($tables, $table);
   }
   return $tables;
}

function listUsers($conection){
  $users = array();
  $query = "SELECT * FROM LOGIN";
  $resultSet = mysqli_query($conection, $query);
  /*while($user = mysqli_fetch_assoc($resultSet)) {
      array_push($users, $user);
   }
   return $users;/
   return $resultSet;
}

function listColumns($conection, $tableName){
  $columns = array();
  $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '{$tableName}' AND TABLE_SCHEMA = 'NORTHWIND' ORDER BY TABLE_NAME,ORDINAL_POSITION";
  $resultSet = mysqli_query($conection, $query);
  while($column = mysqli_fetch_assoc($resultSet)) {
      array_push($columns, $column);
   }
   return $columns;
}


*/

?>
