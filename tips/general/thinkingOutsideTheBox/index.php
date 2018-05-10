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
    <title>Thinking Outside The Box -Genealogy Research Assistance</title>
</head>
<body>
<?php
include '../../../includes/navBar.php'
?>


<main>
    <h1>Thinking Outside The Box</h1>
    <p>We all hit brick walls when researching our family trees and when this happens we need to start thinking outside the         box!</p>

    <p>The person we are looking for has disappeared from the census records and electoral rolls but the rest of the family         are still where you expect them.  We cannot find a death or an obituary or a burial what do we do next?</p>
    <ul>
        <li>Check immigration records</li>
        <li>Check newspapers archives</li>
        <li>Check military records</li>
        <li>Misspelt names especially if a commercial traveller boarding on the road or a servant
            Workhouse records</li>
        <li>Google is your friend</li>
        <li>Other countries records e.g. Australia had an assisted passenger programme where the immigration records may not            be online or survived or only available on their website.</li>
        <li>If a child, some orphans and children of the poor were transported to other countries under the Home Children scheme for what was supposed to be a better life however in many cases this was not the reality!</li>
        <li>Check the original document in case the person has been missed off the transcription.</li>
    </ul>

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