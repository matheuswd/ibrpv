<?php
// Icons
$fb_icon = get_field('fb_icon', 'option');
$youtube_icon = get_field('youtube_icon', 'option');
$instagram_icon = get_field('instagram_icon', 'option');

// URLs
$fb_icon_link = get_field('fb_icon_link', 'option');
$youtube_icon_link = get_field('youtube_icon_link', 'option');
$instagram_icon_link = get_field('instagram_icon_link', 'option');

//Message
$logo = get_field('no_text_logo', 'option');
$footer_message = get_field('footer_message', 'option');

// Visiting Section
$time_entries = get_field('time_entry', 'options');
$address = get_field('address','options');
$gmaps_address = get_field('gmaps_address','options');

?>

<?php if ($footer_message) : ?>
    <section class="message">
        <img src="<?php echo esc_html($logo); ?>" alt="Logo da Igreja Batista Reformada Palavra Viva">
        <div>
        <p class="footer-message"><?php echo esc_attr($footer_message); ?></p>
        </div>
    </section>
<?php endif; ?>
<section class="visit-us">
    <span class="visit-us__title"><?php esc_html_e('Venha nos visitar', 'IBRPV'); ?></span>
    <section class="visit-us__info">
        <button class="button--white-dark-blue"><a href="<?php echo esc_html($gmaps_address); ?>"><?php esc_html_e('Google Maps', 'ibrpv'); ?></a></button>
        <p class="visit-us__message"><?php echo esc_html($time_entries); ?></p>
        <p class="visit-us__message"><?php echo esc_html($address); ?></p>
    </section>
</section>
<section class="follow-us">
    <span class="follow-us__title"><?php esc_html_e('Siga-nos', 'IBRPV'); ?></span>
    <section class="icons">
        <?php if ($fb_icon && $fb_icon_link ) : ?>
            <div class="icons__fb">
                <a href="<?php echo esc_attr($fb_icon_link); ?>">
                    <img src="<?php echo $fb_icon['url']; ?>" alt="<?php echo $fb_icon['alt'] ?>">
                </a>
            </div>
        <?php endif; ?>
        <?php if ($youtube_icon && $youtube_icon_link) : ?>
            <div class="icons__youtube">
                <a href="<?php echo esc_attr($youtube_icon_link); ?>">
                    <img src="<?php echo $youtube_icon['url']; ?>" alt="<?php echo $youtube_icon['alt'] ?>">
                </a>
            </div>
        <?php endif; ?>
        <?php if ($instagram_icon && $instagram_icon_link) : ?>
            <div class="icons__instagram">
                <a href="<?php echo esc_attr($instagram_icon_link); ?>">
                    <img src="<?php echo $instagram_icon['url']; ?>" alt="<?php echo $instagram_icon['alt'] ?>">
                </a>
            </div>
        <?php endif; ?>
    </section>
    <p class="follow-us__message"><?php bloginfo('name') ?></p>
</section>