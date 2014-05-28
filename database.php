<?php

$host = "localhost";
$user = "root";
$password = "oathK33pER";

$tables = array(
    1 => "fajta",
    2 => "anyag",
    3 => "etlap",
    4 => "recept",
    5 => "beszerzes"
);

function doQuery($qString) {
    global $host, $user, $password;
    $con = mysqli_connect($host, $user, $password, 'etterem');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    
    $result = $con -> query($qString);
    
    $con->close();
    
    return $result;
}
