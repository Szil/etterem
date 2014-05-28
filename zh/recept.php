<?php

include './database.php';

$form = $_GET;

$azon = $form['azonosito'];

$q = "SELECT a.nev, r.szuksmenny, a.mertegys FROM recept r "
        . "INNER JOIN anyag a ON r.akod = a.akod "
        . "WHERE azonosito='" . $azon . "'";

$res = doQuery($q);

print "<table class='table'>" .
        "<tr><th>Alapanyag</th><th>Mennyiség</th><th>Mértékegység</th></tr>";
while ($row = mysqli_fetch_row($res)) {
    print "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
}
print "</table>" .
        "<hr/>" .
        '<a class="btn btn-default" id="reset">Újrakezd</a>';
