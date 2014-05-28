<?php
include './database.php';

$from = $_GET;

$tipus = $from['tipus'];

$q = "SELECT azonosito, elnevezes FROM etlap WHERE tipus = '" . $tipus . "';";
$res = doQuery($q);

print '<select class="btn btn-default">';
print '<option value="">Étel választása</option>';
while ($row = mysql_fetch_row($res)) {
    print '<option value="'.$row[0].'">'.$row[1].'</option>';
}
print '</select>';
print "<input type='submit' class='btn btn-default' value='Választás' id='kivalaszt' />";