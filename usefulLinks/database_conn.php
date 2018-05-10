<?php
    $dbConn = new mysqli('localhost', 'gra_geust', '{RIobHxP%6()', 'gra_Links');

if ($dbConn->connect_error) {
    echo "<p>Connection failed: ".$dbConn->connect_error."</p>\n";
    exit;
}
?>
