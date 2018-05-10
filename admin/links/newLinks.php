
<form id="add" action="add.php" method="get">
    <label for="name" id="name">Name of site</label>
    <input type="text" name="name" required="yes"><br/>
    <label for="link" id="link">Link of site</label>
    <input type="url" name="link" required="yes"><br/>
    <label for="desc" id="desc">A bit about the site</label>
    <textarea name="desc" required="yes"></textarea><br/>
    <label for="location"> Location:</label>
        <?php
require_once 'database_conn.php';
        $dbConn = getConnetionLinks();
        $sql = "SELECT Lo_ID, Lo_Name 
                    FROM location";
        $queryResult = $dbConn->query($sql);
        if($queryResult === false) {
            echo "<p>Query failed: ".$dbConn->error."</p>\n</body>\n</html>";
            exit;
        }

        else {

            while ($rowObj = $queryResult->fetchObject()) {
                $Lo_ID = $rowObj->Lo_ID;
                $Lo_Name = $rowObj->Lo_Name;
                echo "<input type='checkbox' name='location[]' value='$Lo_ID'>$Lo_Name<br/>";
            }
        }
        $dbConn =close();

        ?>
    <label for="type"> Type of site: </label>
            <?php
            $dbConn = getConnetionLinks();
            $sql = "SELECT TypeID, Typename 
                    FROM type_tab";
            $queryResult = $dbConn->query($sql);
            if($queryResult === false) {
                echo "<p>Query failed: ".$dbConn->error."</p>\n</body>\n</html>";
                exit;
            }

            else {
                echo "<select name='type' id='type'>";
                while ($rowObj = $queryResult->fetchObject()) {
                    $typeid = $rowObj->TypeID;
                    $Typename = $rowObj->Typename;
                    echo "<option value='$typeid'>$Typename</option>";
                }

                echo "</select>";
            }


            $dbConn = close();

            ?>

    <input type="submit" value="send it!">
    <input type="reset" value="Reset">
</form>