<?php

include './database.php';

$form = $_POST;
$q = $_POST['table'];
$table = $tables[$q];
    printf("Table name: %s \n", $table);
unset($form['table']);
foreach ($form as $column => $value) {
    printf("Column name: %s and it's value: %s \n", $column, $value);
}

$query = "INSERT INTO " . $table;
$colNames = "";
$values = "";
$len = count($form);
foreach ($form as $column => $value) {
    if ($len > 1) {
        $colNames = $colNames . " " . $column . ",";
        $values = $values . " '" . $value . "',";
    } else {
        $colNames = $colNames . " " . $column;
        $values = $values . " '" . $value . "'";
    }

    $len--;
}
//print "<br/>";
//print $colNames . "<br/>";
//print $values;

$query = $query . " ( " . $colNames . " ) VALUES ( " . $values . " );";
doQuery($query);
print "Query done with: " . $query;
