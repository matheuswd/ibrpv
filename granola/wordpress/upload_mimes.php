<?php
// phpcs:disable PSR1.Files.SideEffects

/* extended upload mime types */
add_filter('upload_mimes', 'granola_extended_upload_mimes');

function granola_extended_upload_mimes($mime_types = array())
{
    global $GRANOLA_MIME_TYPES;

    if (is_array($GRANOLA_MIME_TYPES)) {
        foreach ($GRANOLA_MIME_TYPES as $key => $value) {
            $mime_types[$key] = $value;
        }
    }

    return $mime_types;
}
