<?php

    include("dbconnect.php");

    if(isset($_GET['user'])){
        $user = $_GET['user'];
        $sql = "SELECT * FROM user WHERE email='$user'";
        $result = mysqli_query($con, $sql);

        $outp = array();

        $outp = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        echo json_encode($outp);

        // while($row = mysqli_fetch_assoc($result)) {
        //     $firstname = $row["firstname"];
        //     $lastname = $row["lastname"];
        //     $email = $row["email"];
        //     $phone = $row["phone"];
        //     $isFirstTimeLogin = $row["isFirstTimeLogin"];
        //     $Soccer = $row["Soccer"];
        //     $Basketball = $row["Basketball"];
        //     $Football = $row["Football"];
        //     $Baseball = $row["Baseball"];
        //     $IceHockey = $row["IceHockey"];
        //     $event = $row["event"];
        // }



        //echo $sql;
    } else {
        echo "Yo";
    }

?>