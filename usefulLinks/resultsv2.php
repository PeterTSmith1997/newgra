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
    <meta name="description" content="We have worked with and found many good sites to aid your family history">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <meta name="viewpoint" content="width=device-width, maximum-scale=1.0">
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
include_once '../includes/database_conn.php';      // make db connection
    $lo_idf = isset($_REQUEST['location']) ? $_REQUEST['location'] : NULL;
    $ty_idf = isset($_REQUEST['type']) ? $_REQUEST['type']: NULL;
    $start = microtime(true);
    //Connect  to database
    $dbConn = getConnetionLinks();
    // set sql query.
    $sql = setSQL($lo_idf, $ty_idf);
    $queryResult = $dbConn->query($sql);
    if($queryResult === false) {
        sqlError();
    }
        $count = 0;
        echo "<table class='sql' id='#top' summary='Useful research sites'>";
        echo "<th class='sql' scope='col'>Name of resource</th>
                    <th class='sql'scope='col'>Description</th>
                    <th class='sql' scope='col'>Type</th>
                    <th class='sql' scope='col'>Location covered</th>";

        while ($rowObj = $queryResult->fetchObject()) {
            $name = $rowObj->Sitename;
            $Link = $rowObj->Link;
            $Disc = $rowObj->Disc;
            $location = $rowObj->lo_Name;
           $type = $rowObj->Typename;
            echo "
                   <tr class='sql'>
                    <td class='short'><a href='$Link'>$name</a></td>
                    <td class='Desc'>$Disc</td>
                    <td class='short'>$type</td>
                    <td class='lo'>$location</td>
                    </tr>";
            $count ++;

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

        $dbConn = close();


?>
    </main>
</body>
</html>