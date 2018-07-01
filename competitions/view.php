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

    include_once '../includes/database_conn.php';

    ?>
    <meta charset="UTF-8">

    <link href="../css/main.css" rel="stylesheet" type="text/css">

    <meta name = "viewport" content="width=device-width, maximum-scale=1.0"/>

    <link rel="icon" href="../images/favicon.ico" type="image/x-icon"/>

    <title>competitions - Genealogy Research Assistance</title>

</head>

<body>

<?php
include '../includes/navBar.php';
?>
<main>

    <h1 id="home"> View our current competitions</h1>


    <?php

    require_once '../includes/functions.php';
    $comp_id = isset($_REQUEST['comp_id']) ? $_REQUEST['comp_id'] : NULL;
    require_once  '../includes/database_conn.php';      // make db connection
    $link = getURL();
    if (is_int($comp_id)){
     sqlError($link);
     exit;
    }
    echo comDetails($comp_id);

    $ansPost = getCompDates($comp_id);

    $today = date('Y-m-d');

    if ($today < $ansPost){

        compQuestion($comp_id, $today);

    }



    if ($today == $ansPost or $today > $ansPost){

        getAnswers($comp_id);

    }
    
    
    if ($comp_id < 3){
        echo getWinners($comp_id);
    }

    ?>

    <p>HINT -- The competition answers can be found in our <a href="../usefulLinks/index.php">library</a> use the dropdowns wisely </p>

    <p>Please read our Terms <a href="termsAndConditions.php">HERE</a>

    <p>Also as a treat <a href="https://www.petersweb.me.uk/invoicing/link.php?id=4"> petersWeb</a>

        have a discount use 'easter2018' at there <a href="https://www.petersweb.me.uk/invoicing/link.php?id=4"> store</a> for 50% off hosting</p>

</main>



<?php

include '../includes/footer.php';

echo poweredBy("https://www.petersweb.me.uk/invoicing/link.php?id=3");

?>

</body>

</html>