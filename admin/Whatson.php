<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
    <meta name = "viewport" content="width=device-width, maximum-scale=1.0"/>
    <meta charset="UTF-8">
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-55673568-4', 'auto');
        ga('send', 'pageview');

    </script>
    <title>Home | Walbottle village Institute</title>
</head>
<body>
<header>
    <a href="index.html">
        <img id="logo" src="images/theHall.jpg" alt="walbottle village hall"/>
    </a>
    <nav>
        <ul id="nav">
            <li> <a href="index.html">Home</a> </li>
            <li> <a href="contact.html">Contact</a> </li>
            <li> <a href="what'sOn.html"> What's on</a> </li>
            <li> <a href="index.html">About</a> </li>
        </ul>
    </nav>

    <a href="https://www.facebook.com/walbottle/" target="_blank">
        <img id="socaillinks" src="images/fblogo.jpg" alt="TEXXT">
    </a>
</header>
<main>
    <h1> What's on </h1>
<?php

include 'database_conn.php';      // make db connection
$lo_idf = isset($_REQUEST['location']) ? $_REQUEST['location'] : NULL;
$ty_idf = isset($_REQUEST['type']) ? $_REQUEST['type']: null;
$start = microtime(true);
    $sql = "select name, Disc, start, end, day_day, td_time, COST
from Day join main on (ID_day = Day)
join Time_of_day on (Time_of_day = TD_id)
ORDER BY ID_day";

$end = microtime(true);
$diff = $end - $start;
$queryResult = $dbConn->query($sql);
if($queryResult === false) {
    echo "<p>Query failed: ".$dbConn->error."</p>\n</body>\n</html>";
    exit;
}

else {
    echo "<p class='cost'> Pleas note times are represented using the following .25 is quater past etc</p> ";
    $num = 0;
    echo "<table>";
    echo "<th> Name of group</th>
          <th>About the group</th>
          <th>Day</th>
          <th>Time of day</th>
          <th>Start time</th>
          <th>End time</th>
          <th>Cost</th>";
    while($rowObj = $queryResult->fetch_object()){
        $name = $rowObj-> name;
        $startsql= $rowObj-> start;
        $Disc = $rowObj -> Disc;
        $endsql = $rowObj -> end;
        $day = $rowObj -> day_day;
        $timesql = $rowObj->td_time;
        $cost = $rowObj->COST;
        echo "<tr>";
        echo "<td>$name</td>";
        echo "<td>$Disc</td>";
        echo "<td class='narrow'>$day</td>";
        echo "<td class='narrow'>$timesql</td>";
        echo "<td class='time'>$startsql</td>";
        echo "<td class='time'>$endsql</td>";
        echo "<td class='time'>$cost</td>";
        echo "</tr>";

        $num = $num + 1;

    }
    echo "</table>";
    echo "<p> Your query returms $num matchs</p>";

    $time = number_format($diff, 10);
    echo "<p> $time</p>";
}
$queryResult->close();
$dbConn->close();
?>
