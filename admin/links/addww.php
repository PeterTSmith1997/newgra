<?php
include 'database_conn.php';      // make db connection
$ty_id = isset($_REQUEST['type']) ? $_REQUEST['type']: null;
$name =  isset($_REQUEST['name']) ? $_REQUEST['name']: null;
$desc = isset($_REQUEST['desc']) ? $_REQUEST['desc']: null;
$link = isset($_REQUEST['link']) ? $_REQUEST['link']: null;

$sql = "SELECT Lo_ID, Lo_Name
                FROM location";
$losql = $dbConn->query($sql);
$num = $losql->num_rows;
$dbConn->close();
$currentlo = 1;

while ($currentlo < $num){
include 'database_conn.php';
    $sql = "INSERT INTO `siteInfo`(`ref`, `Link`, `Typeinfo`, `Location`, `sitename`, `Disc`) VALUES ('$id', '$link', '$ty_id', '$currentlo', '$name', '$desc')";

    $queryResult = $dbConn->query($sql);
    $dbConn->close();
    $currentlo = $currentlo+1;
}
$dbConn->close();

    include "database_conn.php";
    echo "<p>Added  $name with link of $link</p>";
    echo "<p>The description was $desc</p>";
    echo "Location is all";

    include 'database_conn.php';
    $sql = "SELECT Typename 
                    FROM type_tab
                    WHERE TypeID = $ty_id";
    $queryResult = $dbConn->query($sql);
    $rowObj = $queryResult->fetch_object();
    $type = $rowObj->Typename;
    echo "Type of $type";
    $dbConn->close();

?>
