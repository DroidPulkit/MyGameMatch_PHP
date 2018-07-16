
<?php
$con = mysqli_connect('179.188.16.39','mygamematchdb','senha123', 'mygamematchdb') or die(mysql_error());

// Check connection
if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
} 
?>