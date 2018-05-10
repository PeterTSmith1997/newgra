<?php
function getConnetionLinks()
{
    /*
    $dbConn = new mysqli('localhost', 'genealo1_geust', 'Gra123!!', 'genealo1_Links');

    if ($dbConn->connect_error) {
        echo "<p>Connection failed: " . $dbConn->connect_error . "</p>\n";
        exit;
    }*/

    $conn = '';
    try {
        $servername = 'localhost';
        $dbname = 'genealo1_Links';
        $username = 'genealo1_admin';
        $password = 'Gra123!!';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
    return $conn;
}
function close(){
    $conn = null;
    return $conn;
}


?>
