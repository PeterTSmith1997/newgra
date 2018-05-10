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
    <?php
    include 'database_conn.php'
    ?>
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width=device-width, maximum-scale=1.0">

    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon"/>
    <meta name="description" content="We have worked with and found many good sites to aid your family history">
    <title>Library -  Genealogy Research Assistance</title>
</head>
<body>
<?php
include '../includes/navBar.php';
?>
    <main>
        <h1>Library</h1>
        <p> Useful research sites, use the dropdowns below to narrow your search. </p>
        <form id="links" action="results.php" method="get">
        <label for="location">location</label>
            <select name="location" id="location">
                <option value="">All</option>
                <?php
                include_once '../includes/database_conn.php';
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
echo "<option value='$Lo_ID'>$Lo_Name</option>";
}
}

$dbConn = close()

?>
</select>
<label for="type"> Type of site: </label>
<select name="type" id="type">

    <option value="">All</option>
    <?php
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
                echo "<option value='$typeid'>$Typename</option>";
            }
        }
    }


    $dbConn = close();

    ?>
</select>
<div class="submit-btn">
    <input type="submit" value="SUBMIT"/>
</div>
    </form>
        <p class="top">Happy searching</p>
    </main>

<?php
include '../includes/footer.php';
echo poweredBy("https://www.petersweb.me.uk/invoicing/link.php?id=3")
?>
</body>
</html>