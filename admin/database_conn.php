<?php
    $dbConn = new mysqli('localhost', 'genealo1_admin', 'Gra123!!', 'genealo1_comps');

if ($dbConn->connect_error) {
    echo "<p>Connection failed: ".$dbConn->connect_error."</p>\n";
    exit;
}
?>
