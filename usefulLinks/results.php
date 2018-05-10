<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-55673568-5', 'auto');
        ga('send', 'pageview');

    </script>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, maximum-scale=1.0"/>
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon"/>
    <title>Library -  Genealogy Research Assistance</title>
</head>
<body>
<?php
include '../includes/navBar.php';
?>


<main>
    <h1>Library</h1>
    <p>In the table below are useful research sites. </p>
    <?php
    require_once  '../includes/database_conn.php';      // make db connection
    $dbConn = getConnetionLinks();
    $lo_idf = isset($_REQUEST['location']) ? $_REQUEST['location'] : NULL;
    $ty_idf = isset($_REQUEST['type']) ? $_REQUEST['type']: NULL;
    $start = microtime(true);

        echo "<form class='links' action='results.php'>
        <label for='location'>location</label>
            <select name='location' id='location'>
                <option value=''>All</option>";
    $dbConn = getConnetionLinks();
    $sql = "SELECT Lo_ID, Lo_Name
                    FROM location";
    $queryResult = $dbConn->query($sql);
    if($queryResult === false) {
        echo "<p>Query failed: please email  webmaster@genealogyresearchassistance.co.uk and let them know what page your looking at 'Library'
    and the time " . date("h:i:sa"). " also copy the full web address.";
        exit;
    }

    else {

        while ($rowObj = $queryResult->fetchObject()) {
            $Lo_ID = $rowObj->Lo_ID;
            $Lo_Name = $rowObj->Lo_Name;
            if ($lo_idf != $Lo_ID) {
                echo "<option value='$Lo_ID'>$Lo_Name</option>";
            } else {
                echo "<option value='$Lo_ID' selected>$Lo_Name</option>";
            }
        }
    }
echo "
    </select>
<label for='type'> Type of site: </label>
<select name='type' id='type'>

    <option value=''>All</option>";
    $dbConn = getConnetionLinks();
    $sql = "SELECT TypeID, Typename 
                    FROM type_tab
                    ORDER BY Typename";
    $queryResult = $dbConn->query($sql);
    if($queryResult === false) {
        echo "<p>Query failed: please email  webmaster@genealogyresearchassistance.co.uk and let them know what page your looking at 'Library'
    and the time " . date("h:i:sa"). " also copy the full web address.";
        exit;
    }

    else {
        while ($rowObj = $queryResult->fetchObject()) {

            $typeid = $rowObj->TypeID;
            $Typename = $rowObj->Typename;
            if ($typeid != 2) {
                if ($ty_idf != $typeid) {
                    echo "<option value='$typeid'>$Typename</option>";
                }
                else{
                    echo "<option value='$typeid' selected>$Typename</option>";
                }
            }
        }
    }
?>

    </select>
    <div class="submit-btn">
        <input type="submit" value="SUBMIT"/>
    </div>
    </form>
    <?php

    $dbConn = close();


    //Connect  to database
    $dbConn = getConnetionLinks();
    // set sql query.
    $sql = setSQL($lo_idf, $ty_idf);
    $queryResult = $dbConn->query($sql);
    if($queryResult === false) {

        echo "<p>There has been an error loading your page please email webmaster@genealogyresearchassistance.co.uk and include:-</p>
        <ul>
            <li>The date " . date("d/m/Y") ." and time time " . date("h:i:sa"). "</li>";
        echo    "<li>Copy and paste web address </li>";
        echo "</ul>
        <p>We apologise for the inconvenience caused.</p>";

        exit;
    }
    $count = $queryResult->rowCount();
        echo "<table class='sql' id='#top' summary='Useful research sites'>";
        echo "<th class='sql' scope='col'>Name of resource</th>
                    <th class='sql'scope='col'>Description</th>
                    <th class='sql' scope='col'>Type</th>
                    <th class='sql' scope='col'>Location covered</th>";

        while ($rowObj = $queryResult->fetchObject()) {
            echo "
                   <tr class='sql'>
                    <td class='short'><a href='$rowObj->Link'>$rowObj->Sitename</a></td>
                    <td class='Desc'>$rowObj->Disc</td>
                    <td class='short'>$rowObj->Typename</td>
                    <td class='lo'>$rowObj->lo_Name</td>
                    </tr>";


        }
        echo "</table>";
        echo "<p> Your query returns $count matches</p>";

        $end = microtime(true);
        $diff = $end - $start;

        $time = number_format($diff, 10);
        echo "<p> $time</p>";
        if ($count > 10) {
            echo "<a href='#top'>Return to top</a>";
        }
        echo "<p>Please report any broken links to <a href='mailto=webmaster@genealogyresearchassistance.co.uk'>the webmaster</a></p>";
        echo "<p>We would like to extend the library as much as possible and would appreciate any suggestions of sites that have helped you with your research, please <a href='https://goo.gl/forms/EgqSEFEf98pApmGZ2'>submit them here</a></p> ";
        include '../includes/footer.php';
        echo poweredBy("https://www.petersweb.me.uk/invoicing/link.php?id=3")
?>
    </main>
</body>
</html>