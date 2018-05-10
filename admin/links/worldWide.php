<form id="add" action="addww.php" method="get">
    <label for="name" id="name">Name of site</label>
    <input type="text" name="name" required="yes"><br/>
    <label for="link" id="link">Link of site</label>
    <input type="url" name="link" required="yes"><br/>
    <label for="desc" id="desc">A bit about the site</label>
    <textarea name="desc" required="yes"></textarea><br/>

    <label for="type"> Type of site: </label>
    <?php
    include 'database_conn.php';
    $sql = "SELECT TypeID, Typename 
                    FROM type_tab";
    $queryResult = $dbConn->query($sql);
    if($queryResult === false) {
        echo "<p>Query failed: ".$dbConn->error."</p>\n</body>\n</html>";
        exit;
    }

    else {
        echo "<select name='type' id='type'>";
        while ($rowObj = $queryResult->fetch_object()) {
            $typeid = $rowObj->TypeID;
            $Typename = $rowObj->Typename;
            echo "<option value='$typeid'>$Typename</option>";
        }

        echo "</select>";
    }


    $dbConn->close();

    ?>

    <input type="submit" value="send it!">
    <input type="reset" value="Reset">