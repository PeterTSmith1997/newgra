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

    <form action="addQu.php" method="get">
        <fieldset>
            <label for="quest">Question</label>
            <input id="quest" name="quest" type="text"/><br/>
            <?php
                echo "<select name='comp_id'>";
                $sql = "select catID, Cat_name
                from cato";
            $queryResult = $dbConn->query($sql);
            if($queryResult === false) {
                echo "<p>Query failed: ".$dbConn->error."</p>\n</body>\n</html>";
                exit;
            }

            else {

                while ($rowObj = $queryResult->fetch_object()) {
                  $catid = $rowObj->catID;
                  $cat_name = $rowObj->Cat_name;
                  echo "<option value='$catid'>$cat_name</option>";
                }
            }

            ?>
        </fieldset>
        <input type="submit" value="post quesstion"/>
    </form>
</main>
</body>
</html>
