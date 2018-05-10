<?php
function poweredBy($link){
    $text =  <<< TEXT
    <footer>
    <div id="centre">
        <p>PS: This site is powered with care by <a href="$link">Petersweb</a> </p>
        <p><a href="https://www.genealogyresearchassistance.co.uk/docs/admin/privacyPolicy.pdf">Privacy Policy</a></p>
    </div>
</footer>
TEXT;
    return  $text;

}
?>
