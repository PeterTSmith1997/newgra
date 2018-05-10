<?php
require_once 'database_conn.php';

$lo_id = filter_has_var(INPUT_GET, 'location') ? $_GET['location'] : null;
$ty_id = filter_has_var(INPUT_GET, 'type') ? $_GET['type'] : null;
$name = filter_has_var(INPUT_GET, 'name') ? $_GET['name'] : null;
$desc = filter_has_var(INPUT_GET, 'desc') ?$_GET['desc'] : null;
$link = filter_has_var(INPUT_GET, 'link') ?$_GET['link'] : null;
$errors = array();

if (!filter_var($link, FILTER_VALIDATE_URL)){
    $errors[] = "Link is not a URL";
}
if (!filter_var($lo_id, FILTER_VALIDATE_INT)){
    $errors[] = "Error with location/type";
}
if (!filter_var($ty_id, FILTER_VALIDATE_INT)){
    $errors[] = "Error with location/type";
}
if (strlen($desc) <10){
    $errors[] = "Description to short";
}
if (strlen($name) <5){
    $errors[] = "Name to short";
}
if ($errors){
    foreach ($errors as $error){
        echo $error;
    }
}
else {

    $desc = filter_var($desc, FILTER_SANITIZE_STRING);
    $link = filter_var($link, FILTER_SANITIZE_STRING);
    $id = 0;
    $dbConn = getConnetionLinks();
    foreach ($lo_id as $location) {
        $sql = "INSERT INTO `siteInfo`(`ref`, `Link`, `Typeinfo`, `Location`, `sitename`, `Disc`) VALUES (:id, :link, :ty_id, :location,                                  :Sname, :Sdesc)";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute(array(':id' => $id, ':link' => $link, ':ty_id' => $ty_id, ':location' => $lo_id, ':Sname' => $name, ':Sdesc' => $desc));


    }
// close db link
    $dbConn = close();
    // display info to users
    echo "<p>Added  $name with link of $link</p>";
    include 'database_conn.php';
    echo "<p>The description was $desc</p>";
    foreach ($lo_id as $location) {
        $dbConn = getConnetionLinks();
        $sql = "SELECT Lo_Name 
                    FROM location
                    WHERE Lo_ID = $location";
        $queryResult = $dbConn->query($sql);
        $rowObj = $queryResult->fetchObject();
        $lo_name = $rowObj->Lo_Name;
        echo "Location is $lo_name<br/>";
    }
    $sql = "SELECT Typename 
                    FROM type_tab
                    WHERE TypeID = $ty_id";
    $queryResult = $dbConn->query($sql);
    $rowObj = $queryResult->fetch_object();
    $type = $rowObj->Typename;
    echo "Type of $type";
    $dbConn = close();

}
?>