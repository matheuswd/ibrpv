<?php
// ----------------------------------------------------
// Return a string that is clean to use in a id attribute
// ----------------------------------------------------
function granola_clean_for_id($string)
{
    return strtolower(
        preg_replace("/[^a-z0-9]/i", "", $string)
    );
}
