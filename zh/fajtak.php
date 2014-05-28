<?php
include './database.php';

$q = "SELECT * FROM fajta";

$res = doQuery($q);

while ($row = mysqli_fetch_row($res)) {    
        print "<a id='".$row[0]."' class='fajtak'>".$row[1]."</a>" .
        "<br/>";
}