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
    <link href="../../../css/main.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="../../../images/favicon.ico" type="image/x-icon"/>
    <title>Logging your findings - Genealogy Research Assistance</title>
</head>
<body>
<?php
include '../../../includes/navBar.php';
?>
<main>
    <h1>Logging your findings</h1>


            <p>An important step when researching your family tree. Logging your findings help you keep a track of:</p>
            <ul>
                <li> What you have researched </li>
                <li> What you still need to be researched</li>
                <li>Records reviewed and discounted as not being your ancestor</li>
                <li>sources (enables another researcher to check your findings)</li>
                <li>Sources can be a website, a certificate, a research archive etc...</li>
            </ul>


        <h2>What does a research log look like?</h2>

    <div class="right">
        <img src="../../../images/log.png" class="imageR" alt="A simple research log"/>
        <p>A example can be downloaded <a href="../../../docs/UK/Task%20Sheet%20WW.pdf">here.</a> </p>

    </div>
    <p>This depends entirely on yourself.  It is your tree so you have complete control over what you research about it.  I recommend that it contains a task list which can be used as a quick check for what has been found and what still needs to be found.</p>
    <p>The research log should also contain images of your finding for each person e.g. the 1911 census record showing their marital status, parents/children/siblings, occupation, age and address.</p>

        <p>If you have any questions post your query in our <a href="https://www.facebook.com/groups/1559717927680523/">group</a> </p>

    <?php
    require_once '../../../includes/functions.php';
    $url = getURL();
    echo getNext($url);
    ?>
    </main>

<?php
include '../../../includes/footer.php';
echo poweredBy("https://www.petersweb.me.uk/invoicing/link.php?id=3")
?>
</body>
</html>