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
function sqlError($link){
    $message = "There was an error on $link at ". date("d-m-Y H:i:s"). "go fix it";
    $message = wordwrap($message, 70);
    $email = "peter.t.smith@outlook.com";
    $subject = "GRA error";

    mail($email,$subject,$message);
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
    $sql = "select question, Qu_post, Date_text, id
                from cato JOIN main on (catID = comid)
                WHERE comid = $comp_id";
    $num = 1;
    getLinks($comp_id, $date);
    $queryResult = doSqlComps($sql);
    while ($rowObj = $queryResult->fetchObject()) {
        $Qu_post = $rowObj->Qu_post;
        $Date_text = $rowObj->Date_text;
        $id =  $rowObj->id;
        if ($date >= $Qu_post) {

            $qutext = $rowObj->question;
            if ($id == 13 ){
                $qutext = "Fabergé created 50 Imperial Easter Eggs for the Russian Royal Family from 1885 -  1916 when the company was run by Peter Carl Fabergé. When and where is he buried";
            }
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
        echo "<p id='enter'> You can enter <a href='$link'>here</a></p> ";
    }

}
/**
function getWinners($comp_id){
    $sql = "select place, namew, won
            from Winner
            WHERE win_comp = $comp_id";
    $winners = null;
    $queryResult = doSqlComps($sql);
    while ($rowObj = $queryResult->fetchObject()){
        $place = $rowObj->place;
        $name = $rowObj->namew;
        $won = $rowObj->won;

        $winners .=  "<p>$place prize $won was won by $name</p>";
    }
return $winners;
}*/
function getAnswers($comp_id)
{


    $sql = "select question, ans, Date_text, main.id
                from cato JOIN main on (catID = comid)
                    JOIN answers on (main.id = answers.id)
                WHERE comid = $comp_id";
    $num = 1;
    $queryResult = doSqlComps($sql);
    while ($rowObj = $queryResult->fetchObject()) {
        $qutext = $rowObj->question;
        $Date_text = $rowObj->Date_text;
        $anstext = $rowObj->ans;
        $id = $rowObj->id;
        if ($id == 13 ){
            $qutext = "Fabergé created 50 Imperial Easter Eggs for the Russian Royal Family from 1885 -  1916 when the company was run by Peter Carl Fabergé. When and where is he buried";
        }

        echo "<p> $Date_text, Question $num  $qutext? </p>";
        echo "<p> <span class='ans'>Answer:</span> $anstext </p>";
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

function comDetails($id){
    $details = null;

    if ($id == 1){
        $details = <<<Detail
 <p>The prizes were:</p>

    <div class="prize">

        <div id="prize1">

            <h2>First place</h2>

            <p> One year subscription to <a href="https://www.newspapers.com">www.newspapers.com</a> </p>

            <div class="prizeimg">

                <img class="prizeimg" src="../images/Newspapers.jpg">

            </div>

        </div>

        <div id="prize2">

            <h2>Second place</h2>

            <p>One year subscription to <a href="https://www.fold3.com">www.fold3.com</a> </p>

            <div class="prizeimg">

                <img  class="prizeimg" src="../images/fold3.png">

            </div>



        </div>

        <div id="prize3">

            <h2>Thrid place</h2>

            <p>One month subscription to <a href="https://www.findmypast.co.uk/">www.findmypast.co.uk/</a> </p>

            <div class="prizeimg">

                <img  class="prizeimg" src="../images/fmp%20logo.PNG">

            </div>

        </div>

    </div>

    <div class="top">

        <p>

            Welcome to our Christmas 2017 competition.  We hope you enjoy it as much as last year.</p>



            <p>Starting on Boxing Day 2017, one question per day will be posted up to and including the 6 January 2018.

            All answers can be found on free sites and all sites used in compiling this competition can be found in our

            <a href="../usefulLinks/"> library.</a></p>



            <p id="xmas">Merry Christmas from everyone at Genealogy Research Assistance</p>

Detail;

    }
    if ($id == 2){
     $details = <<<details
 <p>The prizes are:</p>

    <div class="prize">

        <div id="prize1">

            <h2>First place</h2>

            <p>One month subscription to <a href="https://www.findmypast.co.uk/">www.findmypast.co.uk/</a> </p>

            <div class="prizeimg">

                <img  class="prizeimg" src="../images/fmp%20logo.PNG">

            </div>
         </div>
            
        <div id="prize2">
            <div class="prizeimg">
                
                <img  class="prizeimg" src="../images/easter.jpg">

            </div>

        </div>
        <div id="prize3">
            <h2>Second place</h2>


            <p>One month subscription to <a href="https://www.findmypast.co.uk/">www.findmypast.co.uk/</a> </p>

            <div class="prizeimg">

                <img  class="prizeimg" src="../images/fmp%20logo.PNG">

            </div>
        </div>
    </div>

    <div class="top">

        <p>Welcome to our Easter 2018 competition.  We hope you enjoy it as much as last year</p>

            <p>Starting on Good Friday one question per day will be posted up to and including Easter Monday


            All answers can be found on free sites and all sites used in compiling this competition can be found in our

            <a href="../usefulLinks/"> library.</a></p>



            <p id="xmas">Happy Easter from Genealogy Research Assistance</p>

details;

    }

    return $details;
}


function getWinners($id){
    $sql = "SELECT place, namew, won, id FROM Winner WHERE win_comp = $id";
    $queryResult = doSqlComps($sql);
    $winners = "<h2> The winners were</h2>";
    while ($rowObj = $queryResult->fetchObject()) {
        if ($rowObj->id == 5 ){
         $winners .= "<p> Unfortunately there was no second prize winner because nobody else got all the questions correct so this prize will be used shortly in a new competition</p>";
        }
        else {
            $winners .= "<p> <span class='ans'>" . $rowObj->place . "</span> prize was " . $rowObj->won . " was won by " . $namew = $rowObj->namew . ".</p>";
        }
    }
    
    return $winners;
}