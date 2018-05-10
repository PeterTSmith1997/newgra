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
    <title>Ask the Family -Genealogy Research Assistance</title>
</head>
<body>
<?php
include '../../../includes/navBar.php'
?>


<main>
    <h1>Ask the Family</h1>

    <p>It’s a fact of life that at some point we will all die so as the recorders of our family histories it is necessary to talk to as many family members as possible before it is too late!</p>

    <p>Our elderly relatives are a wealth of unwritten family stories, which, although in the first instance should be treated with suspicion, can also carry a grain of truth and act as pointers to uncovering the facts.</p>

    <p>What you get back in responses to your questions will depend on how the question was posed in the first place, and how comfortable the relative is to talk about the family secrets.  Try not to ask leading questions which can be answered with a simple yes or no.</p>

    <p>Meeting in person is better than by letter because a question can be expanded upon.  Also when visiting the relative may have documents, photographs, newspaper clippings etc.... which you can photograph with your phone.  Take along some photos and see if they can name the people.</p>

    <p>As questions using a fact that you know is not quite right e.g. was your mother’s name Alice? The response could be no, Alice was her middle name, she was actually Frances Alice.</p>

    <p>Building it up into a conversation rather than a questions and answer session will be less intimidating and make a note of the questions asked or if the relative is receptive, record the conversation not only for future reference but capturing someone’s voice as a sound byte will enhance your family tree because future generations will be able to hear their ancestors speak which will add depth to your research.</p>

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