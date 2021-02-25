<style>
body {
    color: #CCC;
    background: #111;
}
</style>
<h1>Hello World !</h1>

<?php

function maFonction($fonction)
{
    echo 'maFonction';
    $fonction();
}

$mavar = function()
{
    echo 'maFonction Anonyme';
};

maFonction($mavar);

maFonction(function() {
    echo 'maFonction Anonyme';
});




