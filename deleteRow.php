<?php

include './database.php';

$form = $_POST;
$table = $_POST['table'];

unset($form['table']);

$colName = "";
$iden = "";
foreach ($form as $column => $value) {
    $colName = $column;
    $iden = $value;
}

$query = "DELETE FROM " . $table . " WHERE " . $colName . " = " . $iden . ";";
print $query;
doQuery($query);