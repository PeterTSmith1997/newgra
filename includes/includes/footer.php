<?php
function poweredBy($link){
    $text =  <<< TEXT
    <footer>
    <div id="centre">
        <p>PS: This site is powered with care by <a href="$link">Petersweb</a> </p>
    </div>
</footer>
TEXT;
    return  $text;

}
?>
