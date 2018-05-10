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
    <title>Other peoples trees -Genealogy Research Assistance</title>
</head>
<body>
<?php
include '../../../includes/navBar.php'
?>


<main>
    <h1>Other Peoples Trees</h1>
    <p>Avoid the pitfall of copying information from someone else’s tree!  The author may be perfectly correct in their             research but equally may have copied information from someone else whose research is not as thorough!</p>

    <p>If you are serious about researching a factual family history then do not accept anything at face value.  Check all          the sources especially when families have used a naming pattern and you find cousins have been given identical names         which, in my family, happened with my grandmother and her cousin.  It was also complicated by the fact they lived 3          doors away from each other and were born two days apart.  Birth certificates were the only way to sort this out              leaving no element of doubt. Verify personally all data before accepting it into your tree.</p>

    <p>Other’s trees can be useful when viewed as a possibility but that is all they can ever be.  They are not primary             sources and should never be accepted as such.  They are only someone else’s interpretation of the records.</p>

    <p>Good luck with your research</p>

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