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
        $dbname = 'gra_Links';
        $username = 'gra_geust';
        $password = '{RIobHxP%6()';
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

function getConnetionComps()
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
        $dbname = 'gra_comps';
        $username = 'gra_geust';
        $password = '{RIobHxP%6()';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
    return $conn;
}
function sqlError(){

    echo "<p>There has been an error loading your page please email webmaster@genealogyresearchassistance.co.uk and include:-</p>
        <ul>
            <li>The date " . date("d/m/Y") ." and time time " . date("h:i:sa"). "</li>";
    echo    "<li>Copy and paste web address </li>";
    echo "</ul>
        <p>We apologise for the inconvenience caused.</p>";
}

function getCompDates($comp_id){
    $sql = "select Cat_ans_post
            from cato 
            WHERE catID = $comp_id";

    $queryResult = doSqlComps($sql);
    $rowObj = $queryResult->fetchObject();
    $ansPost = $rowObj->Cat_ans_post;
    return $ansPost;
}
function compQuestion($comp_id, $date)
{
    $sql = "select question, Qu_post, Date_text
                from cato JOIN main on (catID = comid)
                WHERE comid = $comp_id";
    $num = 1;
    getLinks($comp_id, $date);
    $queryResult = doSqlComps($sql);
    while ($rowObj = $queryResult->fetchObject()) {
        $Qu_post = $rowObj->Qu_post;
        $Date_text = $rowObj->Date_text;
        if ($date >= $Qu_post) {
            $qutext = $rowObj->question;
            $qMark = "?";
            echo "<p> $Date_text, Question $num  $qutext$qMark </p>";
            $num = $num + 1;
        }

    }
}
function getLinks($comp_id, $today){
    $sql = "select Cat_link_post, cat_link
            from cato 
            WHERE catID = $comp_id";

    $queryResult = doSqlComps($sql);
    $rowObj = $queryResult->fetchObject();
    $linkPost = $rowObj->Cat_link_post;
    $link = $rowObj->cat_link;
    if ($today > $linkPost or $today == $linkPost) {
        echo "<p> You can enter <a href='$link'>here</a></p> ";
    }

}
function getWinners($comp_id){
    $sql = "select place, namew, won
            from Winner
            WHERE win_comp = $comp_id";
    $queryResult = doSqlComps($sql);
    while ($rowObj = $queryResult->fetchObject()){
        $place = $rowObj->place;
        $name = $rowObj->namew;
        $won = $rowObj->won;

        echo "<p>$place prize $won was won by $name</p>";
    }

}
function getAnswers($comp_id)
{


    $sql = "select question, ans, Date_text
                from cato JOIN main on (catID = comid)
                    JOIN answers on (main.id = answers.id)
                WHERE comid = $comp_id";
    $num = 1;
    $queryResult = doSqlComps($sql);
    while ($rowObj = $queryResult->fetchObject()) {
        $qutext = $rowObj->question;
        $Date_text = $rowObj->Date_text;
        $anstext = $rowObj->ans;

        echo "<p> $Date_text, Question $num  $qutext? </p>";
        echo "<p> Answer: $anstext";
        $num = $num + 1;
    }
}

function doSqlComps($sql){

    $dbConn = getConnetionComps();
    $queryResult = $dbConn->query($sql);
    if ($queryResult === false){
        sqlError();
    }
    return  $queryResult;
}

function setSQL($lo_idf, $ty_idf){
    $sql = "hi";
    if ($lo_idf == null && $ty_idf == null)
    {
        $sql = "Select Sitename, Disc, lo_Name, Link, Typename
        from location join siteInfo on Lo_ID = Location 
        join type_tab on (Typeinfo  = TypeID)
        WHERE TypeID <> 2
        order by Sitename";
    }
    else if ($lo_idf != null && $ty_idf == null)
    {
        $sql = "Select Sitename, Disc, lo_Name, Link, Typename
        from location join siteInfo on Lo_ID = Location 
        join type_tab on (Typeinfo  = TypeID)
        WHERE lo_ID = $lo_idf AND TypeID <> 2
        ORDER BY Sitename";
    }

    else if ($lo_idf == null && $ty_idf != null)
    {
        $sql = "Select Sitename, Disc, lo_Name, Link, Typename
        from location join siteInfo on Lo_ID = Location 
        join type_tab on (Typeinfo = TypeID)
        WHERE TypeID = $ty_idf
        ORDER BY Sitename";
    }
    else
    {
        $sql = "Select Sitename, Disc, lo_Name, Link, Typename
        from location join siteInfo on Lo_ID = Location 
        join type_tab on (Typeinfo = TypeID)
        WHERE TypeID = $ty_idf and Lo_id = $lo_idf
        ORDER BY Sitename";

    }
    return $sql;
}

