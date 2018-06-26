<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../includes/database_conn.php';
function getLastPosted(){
    $dbConn = getConnetionLinks();

    $sql = "select sitename from posted";

    $queryResult = $dbConn->query($sql);
    while ($rowObj = $queryResult->fetchObject()){
        $posted[] = $rowObj->sitename;
    }
    return $posted;
}

function getRandomLink(){
    $dbConn= getConnetionLinks();

    $sql = "SELECT sitename FROM siteInfo ORDER BY RAND() LIMIT 0,1";
    $site ="";
    $queryResult = $dbConn->query($sql);
    while ($rowObj = $queryResult->fetchObject()){
        $site = $rowObj->sitename;
    }
    return $site;
}
function getLinkDetails($link){
    $dbConn = getConnetionLinks();
    $sql = "Select Sitename, Disc, lo_Name, Link, Typename
        from location join siteInfo on Lo_ID = Location 
        join type_tab on (Typeinfo  = TypeID)
        where Sitename = '$link'
        order by RAND() LIMIT 0,1";


    $queryResult = $dbConn->query($sql);
    if ($queryResult == false){
        echo $sql;
    }
    else {
        while ($rowObj = $queryResult->fetchObject()) {
            echo "The site $rowObj->Sitename has info on $rowObj->lo_Name the records are $rowObj->Typename, more info at $rowObj->Link";
        }
    }
}
$posted = getLastPosted();
$link = getRandomLink();

while (in_array($link,$posted)){
    $link = getRandomLink();
}
if (sizeof($posted)==7){
    array_splice($posted, 0, 1);
}

$posted[] = $link;
$dbConn = getConnetionLinks();
$delsql = "DELETE FROM `posted`";
$dbConn->query($delsql);
$x=0;
foreach ($posted as $item) {
    $dbConn = getConnetionLinks();
    $stmt = "INSERT INTO `posted`(id, sitename) VALUES (:id, :link)";
    $stmt = $dbConn->prepare($stmt);
    $stmt->execute(array(':id' => $x, ':link' => $item));
    $dbConn = null;
    $x++;
}
getLinkDetails($link);

