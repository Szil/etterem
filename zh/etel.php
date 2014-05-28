<?php
include './database.php';

$from = $_GET;

$tipus = $from['tipus'];

$q = "SELECT azonosito, elnevezes FROM etlap WHERE tipus = '" . $tipus . "';";
$res = doQuery($q);
//print_r($res);
var_dump($res);
//print '<select class="btn btn-default">';
//print '<option value="">Étel választása</option>';
while ($row = mysql_fetch_row($res)) {
    print_r($row);
    //print '<option value="'.$row[0].'">'.$row[1].'</option>';
}
//print '</select>';
//print "<input type='submit' class='btn btn-default' value='Választás' id='kivalaszt' />";