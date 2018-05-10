<?php
function getURL(){
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

    return $pageURL;
}

function getNext($url){

    try {
        $servername = 'localhost';
        $dbname = 'gra_nextPages';
        $username = 'gra_geust';
        $password = '{RIobHxP%6()';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }

    $sql = "select next_url
            from pages
            WHERE curr_url = :url";
    $query = $conn->prepare($sql);
    $query->execute(array(':url'=>$url));

    $result =$query->fetchObject();
    $link = $result->next_url;

    $next = "<p id='nxt'><a href='$link'>Next page</a></p>";

    return $next;

}

function makeList (array $list){
    $listOut = "";

    foreach ($list as $item){
        $listOut .= "<li> $item </li>";
    }
    return $listOut;
}