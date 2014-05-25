<?php

include './database.php';

$form = $_POST;
$table = $_POST['table'];

    printf("Table name: %s \n", $table);
unset($form['table']);
$query = "UPDATE " . $table;
$idRow = 0;
$len = count($form);
$set = "";
$idCol = "";
$idVal = "";
foreach ($form as $column => $value) {
    if ($idRow == 0) {
        $idCol = $column;
        $idVal = $value;
        $idRow++;
    } else {
        if ($len > 1) {
            $set = $set . $column . "='". $value ."',";
        } else {
            $set = $set . $column . "='". $value ."'";   
        } 
    }
    $len--;
}

$query = $query . " SET " . $set . " WHERE ".$idCol."='".$idVal."';";
doQuery($query);
print "Query done with: " . $query;