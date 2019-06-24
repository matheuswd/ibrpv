<?php

// phpcs:disable PSR1.Files.SideEffects


add_filter('embed_oembed_html', 'granola_wrap_iframes', 99, 3);

function granola_wrap_iframes($html, $url, $attr)
{

    // The url parameter provided is the url pasted in to the wysiwyg
    // Therefore, to get the oembed url, we need to pass the iframe and extract it
    $doc = new DOMDocument();
    $doc->loadHTML($html);
    $iframe = $doc->getElementsByTagName('iframe')->item(0);

    // Lets check if the first index is not null
    if (!is_null($iframe)) {
        // Lets retrieve the oembed URL from the object
        $src = $iframe->getAttribute('src');

        // If the oembed is youtube, lets clean up the embed
        if (strpos($url, 'youtube') > 0) {
            $src .= "&rel=0&showinfo=0&autohide=1";
        }

        return "<p class='responsive-embed'><iframe class='responsive-embed__item' src='$src'></iframe></p>";
    }

    return $html;
}
