<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'database_conn.php';      // make db connection
    ?>
    <meta charset="UTF-8">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <meta name="viewpoint" content="width=device-width, maximum-scale=1.0">
    <title>Title</title>
</head>
<body>
<nav>
    <ul class="menu">
        <li class="dropdown">
            <a href="comps.html" class="dropbtn">Add a question</a>
        </li>
        <li class="dropdown">
            <a href="Tips.html" class="dropbtn">Tips</a>
            <div class="dropdown-content">
                <a href="Tips.html"> TIP 1</a>
            </div>

    </ul>
</nav>

<main>
    <h1 id="home"> Add a question</h1>
<?php

$comp_id = isset($_REQUEST['comp_id']) ? $_REQUEST['comp_id'] : NULL;
$quest = isset($_REQUEST['quest']) ? $_REQUEST['quest'] : null;
if ($quest == null){
    echo "error";
}
else {
    $quest = $dbConn->escape_string($quest);

    $sql = "insert into main (`question`, `comid`) VALUES ('$quest', $comp_id)";

    $queryResult = $dbConn->query($sql);
    if ($queryResult === false) {
        echo "<p>Query failed: " . $dbConn->error . "</p>\n</body>\n</html>";
        exit;
    } else {
        echo "added $quest to comp $comp_id";
    }
}




$dbConn->close();

?>
    </main>
</body>
</html>
