<?php
// Icons
$fb_icon = get_field('fb_icon', 'option');
$youtube_icon = get_field('youtube_icon', 'option');
$instagram_icon = get_field('instagram_icon', 'option');

// URLs
$fb_icon_link = get_field('fb_icon_link
', 'option');
$youtube_icon_link = get_field('youtube_icon_link
', 'option');
$instagram_icon_link = get_field('instagram_icon_link
', 'option');

//Message
$footer_message = get_field('footer_message', 'option');

?>

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

<?php if ($footer_message) : ?>
    <section class="message">
        <p><?php echo esc_attr($footer_message); ?></p>
    </section>
<?php endif;
