<?php

include './database.php';

$form = $_GET;
$table = $_GET['table'];

print '<input type="hidden" class="form-control" name="table" value="'. $table .'">';
unset($form['table']);

$colName = "";
$iden = "";
foreach ($form as $column => $value) {
    $colName = $column;
    $iden = $value;
}
$query="select * from " . $table . " WHERE " . $colName . " = " . $iden . ";";
$result = doQuery($query);

$numfields = $result->field_count;
$val = $result->fetch_row();
//print_r($val);
for ($i=0; $i < $numfields; $i++) // Header
{ 
    $s = $result->fetch_field();
    $name = $s->name;
    
    if ($i == 0) {
        print '<div class="form-group">' .
          '<label>' . $name . '</label>' .
          '<input type="textfield" class="form-control" name="'.$name.'" disabled="disabled" value="'.$val[$i].'">' .
          '</div>';
    } else {
        print '<div class="form-group">' .
          '<label>' . $name . '</label>' .
          '<input type="textfield" class="form-control" name="'.$name.'" value="'.$val[$i].'">' .
          '</div>'; 
    }   
}
print '<input type="submit" class="btn btn-default" value="Küldés" id="sendForm">';