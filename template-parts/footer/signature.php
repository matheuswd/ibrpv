<?php

$fb_icon = get_field('fb_icon', 'option');
$youtube_icon = get_field('youtube_icon', 'option');
$instagram_icon = get_field('instagram_icon', 'option');
$footer_message = get_field('footer_message', 'option');

?>

<section class="icons">
    <?php if ($fb_icon) : ?>
        <div class="icons__fb">
            <img src="<?php echo $fb_icon['url']; ?>" alt="<?php echo $fb_icon['alt'] ?>">
        </div>
    <?php endif; ?>
    <?php if ($youtube_icon) : ?>
        <div class="icons__youtube">
            <img src="<?php echo $youtube_icon['url']; ?>" alt="<?php echo $youtube_icon['alt'] ?>">
        </div>
    <?php endif; ?>
    <?php if ($instagram_icon) : ?>
        <div class="icons__instagram">
            <img src="<?php echo $instagram_icon['url']; ?>" alt="<?php echo $instagram_icon['alt'] ?>">
        </div>
    <?php endif; ?>
</section>

<?php if ($footer_message) : ?>
    <section class="message">
        <p><?php echo esc_attr($footer_message); ?></p>
    </section>
<?php endif;
