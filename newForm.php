<?php

include './database.php';

$q = \intval($_GET['table']);

$con = mysqli_connect($host, $user, $password, 'etterem');
if (!$con) {
	die('Could not connect: ' . mysqli_error($con));
}

$table = $tables[$q];
print '<input type="hidden" class="form-control" name="table" value="'. $q .'">';
$query="select * from " . $table;
$result = $con -> query($query);

$numfields = $result->field_count;

for ($i=0; $i < $numfields; $i++) // Header
{ 
    $s = $result->fetch_field();
    $name = $s->name;
    print '<div class="form-group">' .
          '<label>' . $name . '</label>' .
          '<input type="textfield" class="form-control" name="'.$name.'">' .
          '</div>';   
}
print '<input type="submit" class="btn btn-default" value="Küldés" id="sendForm">';