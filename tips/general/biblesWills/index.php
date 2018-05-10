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
    <title>Bibles and Wills -Genealogy Research Assistance</title>
</head>
<body>
<?php
include '../../../includes/navBar.php'
?>


<main>
    <h1>Bibles and Wills</h1>
    <p>We all know about census, birth, marriage and death records and regularly search for our ancestors using them however other records exist which can tell us a great deal about them e.g. 1939 Register in the UK   This was taken on the cusp of world war 2 so that identity cards could be issued but it became much more than this because it was used to set up the NHS and was updated until 1990. This helps with married names of women and full dates of births but only if the person we are searching for died before 1990 or are over 100 years old or someone has produced a death certificate and had a redacted record opened.</p>
    <p>Family Bibles during the 1800s and probably before were treasured possessions and a place where families who were literate recorded vital information like birth, marriages and death etc...  in their family lives.  They were the original genealogists as Bibles were often passed on down the generations.  The practice seems to have died out but it is always worth asking other family members if they had ever come across one when clearing out relatives houses.</p>
    <p>Another potential source of information is a Will.  Contained within can be a wealth of information that you will not find anywhere else.  Apart from monetary sums sometimes they give details of children born in and out of wedlock and the kind of relationships the deceased had with other relatives.  In one Will that I uncovered was a reference to a daughter Ann, who married William Musgrove, the thresher, who must not benefit from the Will in any way, shape or form because she has had more than her fair share in my lifetime.     It is obvious on reading in context that her father, in this case, was not impressed she had married William and thought she had married “beneath” her.</p>
    <p>Copies of Wills are relatively easy and not too expensive to obtain.  Where to look for them depends on when and to some extent where your ancestors died.  The most critical “when” is before 12 January 1858 the Wills of those residing in the southern part of Britain were proven at the Preerogative Court of Canterbury.  Copies are held at the National Archives but some are also available on Ancestry, FindmyPast and also <a href="http://discovery.nationalarchives.gov.uk/results/r?_q=Wills"> here </a></p>
    <p>Wills after 12 January 1858 can be ordered <a href="https://probatesearch.service.gov.uk/#wills">here</a> </p>

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