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
    <title>Military Records of the UK- Genealogy Research Assistance</title>
</head>
<body>
<?php
include '../../../includes/navBar.php'
?>


<main>
    <h1>Military Records of the UK</h1>
    <p>Military records can be a very good source of information not only of the soldier but also his family however the wealth of information varies significantly from record to record.  They can contain all or some of the following details:-</p>
    <ul>
        <?php
            require_once '../../../includes/functions.php';

            $list = array("Name", "Birth year", "Birth county", "Birth country", "Service number (i.e. regimental number)",
        "Rank", "Regiment", "Unit/Battalion", "Age at attestation in years and months", "Attestation date", "Attestation corps", "Manoeuvres they took part in", "Conduct", "A description of the soldier e.g. height, eye colour etc.....",
        "Residence", "Spouse’s name", "When and where they married", "Names of Children", "Next of Kin", "Pension",
        "Death date – if the individual died during service", "Document type – attestation or discharge");
        echo makeList($list);
        ?>
    </ul>
    <p>Many World War 1 records were destroyed in World War 2 when the archive they were they were held was bombed but some have survived.  They are available to view off line at the National Archives at Kew Garden for free but can also be searched and downloaded from their website.  In addition, the surviving records are available on other subscription sites e.g. Ancestry, FindmyPast, Forces War Records and Fold 3 to name a few.</p>
    <p>In the main World War 2 records are not online however, Forces War Records do hold some Regimental records which can give some details.  However, you can apply to the Ministry of Defence for service records.   These records may contain some or all of the following details:-</p>
    <p>Records date from 1920 and may include:</p>
    <ul>
    <?php
        $list2 = array("Surname, first name, service number, rank and regiment or corpssurname, first name, service number, rank and regiment or corps", "Place and date of birth", "Date they joined and left the armed forces", "Date of death, if they died in service", "Good conduct medals", "Details about their career, for example the units they served in - you can only get these 25 years after the date they died, unless you have consent from their next of kin");
    echo makeList($list2);
    ?>
    </ul>
    <p>Details of how to apply can be found here:- <a href="https://www.gov.uk/get-copy-military-service-records/apply-for-someone-elses-records">https://www.gov.uk/get-copy-military-service-records/apply-for-someone-elses-records</a> </p>
    <p>There are also specialist record collections held in different archives around Britain:-</p>
    <p>Imperial War Museums hold a plethora of records
        The National War Museum of Scotland
        The National Army Museum
        The Museum of Military Medicine
    </p>
    <p>There are obviously other wars and other records but rather than listing them here I found this website which details records and where you can find the records of interest.
        <a href="https://www.familysearch.org/wiki/en/British_Military_Records_Online">https://www.familysearch.org/wiki/en/British_Military_Records_Online</a> </p>
</main>


<?php
include '../../../includes/footer.php';
echo poweredBy("https://www.petersweb.me.uk/invoicing/link.php?id=3")
?>
</body>
</html>