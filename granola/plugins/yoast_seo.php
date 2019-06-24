<?php
// phpcs:disable PSR1.Files.SideEffects
add_filter("wpseo_metabox_prio", 'granola_change_seo_box_priority');

// ----------------------------------------------------
// The YoastSEO meta box loves to sit above meta boxes
// that contain content, this is not helpful...Lets
// lower the priority of the meta box so its lower
// on the page
// ----------------------------------------------------
function granola_change_seo_box_priority()
{
    return "low";
}
