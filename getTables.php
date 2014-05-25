<?php

include './database.php';

$q = \intval($_GET['q']);

$table = $tables[$q];
//echo $table . "<br/>";

$query="select * from " . $table;
$result = doQuery($query);
print_r($result);
print "<hr/>";

$numfields = $result->field_count;
//printf("<br/> Result has number of fileds: %s\n", $numfields);
$numrows = $result->num_rows;
//printf("<br/> Result has number of rows: %s\n", $numrows);
//print "<div class'container-fluid' hidden='true'> \n" .
//      "<form role='form'>";
//for ($i=0; $i < $numfields; $i++) // Header
//{ 
//    $s = $result->fetch_field();
//    print $s->name . '  <input type="textfield" /> <br/>'; 
//    
//}
//
//print "</form> \n" .
//      "</div>";
$iden = "";
print '<input type="hidden" name="table" value="'. $table .'">';
print "<table class='table'>\n<tr>";
print "<th>#</th>";
for ($i=0; $i < $numfields; $i++) // Header
{ 
    $d = $result->fetch_field();
    if ($i == 0) {
        $iden = $d->name;
    }
    print '<th>'. $d->name .'</th>';     
}

print "</tr>\n";

while ($row = $result->fetch_row()) {
    //
    print "<tr>";
    print "<td> <input type='radio' id='row' name='". $iden ."' value='" . $row[0] . "'/></td>";
        for ($i=0; $i < $numfields; $i++) {
            printf("<td> %s </td>\n", $row[$i]);
        }
    print "</tr>";
    }
//foreach($result as $sor) {
//    $values = array_values($sor);
//    print "<tr>";
//    for ($i=0; $i < $numfields; $i++) {
//        printf("<td> %s </td>\n", $values[$i]);
//    }
//    print "</tr>";
//}

print "</table>\n";
print '<input type="submit" value="Küldés" id="sendRow" hidden="true">';
//print "</form>";
