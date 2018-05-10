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
    <meta name="viewpoint" content="width=device-width, maximum-scale=1.0">
    <link href="../../../css/main.css" rel="stylesheet" type="text/css">
    <title>USA Census -Genealogy Research Assistance</title>
</head>
<body>
<?php
include '../../../includes/navBar.php'
?>


<main>
    <h1>USA Census</h1>
    <p>The census records are very important documents when researching your family tree because they are a snapshot of a household at a given point in time.  From 1850 to 1940 the following information can be found:-</p>
    <ul>
        <?php
        require_once '../../../includes/functions.php';

        $list = array("Names of family members", "Their ages at a certain point", "Their State or Country of birth", "Street address", "Their parents place of birth", "Their year of immigration if they originate from other countries",
"Their marital status and year of marriage",
"Their occupations",
"The value of their home and personal belongings",
"And in agricultural schedules, the crops that they grew");
        echo makeList($list);
        ?>
    </ul>
    <p>The information available varies from census to census but from what is available a picture of the family emerges.</p>
    <p>From 1790 – 1840 only the head of the household is recorded and the number of household members in selected age group.</p>
    <p>USA census records are available online at familysearch.org.  You need to register but it is a free site.   They are also available on subscriptions sites e.g. ancestry and findmypast.</p>
    <p>Offline they can be viewed at the National Archive in Washington DC or one of the regional offices at Anchorage, Atlanta, Boston, Chicago, Denver, Fort Worth, Kansas City, New York City, Philadelphia, Riverside, CA, San Francisco and Seattle.</p>
    <p>It is generally believed that the 1890 census was lost or destroyed however there is the 1890 “Veterans Census” This census is often overlooked however it does contain the following information:-</p>

    <ul>
        <?php
        $list2 = array("Union Veterans",
"Widows of Union Veterans",
"Rank",
"Company",
"Date of discharge",
"Length of service",
"Post office address",
"Any disability incurred whilst in service",
"General remarks");
        echo makeList($list2);
        ?>
    </ul>
    <p>This special enumeration was conducted at the request of the U.S. Pension Office to aid Union veterans to locate comrades who could testify in pension claims and also determine the number of survivors and widows in line with pension legislation.</p>

        <p>More information can be found on the National Archives website.</p>
</main>


<?php
include '../../../includes/footer.php';
echo poweredBy("https://www.petersweb.me.uk/invoicing/link.php?id=3")
?>
</body>
</html>