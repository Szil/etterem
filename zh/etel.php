<?php
include './database.php';

$from = $_GET;

$tipus = \intval($from['tipus']);

$q = "SELECT azonosito, elnevezes FROM etlap WHERE tipus='" . $tipus . "';";
$res = doQuery($q);
//print_r($res);

print '<select class="btn btn-default">';
print '<option value="">Étel választása</option>';
while ($row = mysqli_fetch_row($res)) {
    //var_dump($row);
    print '<option name="azonosito" id="etel" value="'.$row[0].'">'.$row[1].'</option>';
}
print '</select>';
print "<input type='submit' class='btn btn-default' value='Választás' id='kivalaszt' />";