<section class="hero">
    <div class="hero__content">
            <?php if(get_field('hero_title')): ?>
                <h2 class="hero__title"><?= get_field('hero_title'); ?></h2>
            <?php endif; ?>

            <?php if(get_field('hero_subtitle')): ?>
                <p class="hero__subtitle"><?= get_field('hero_subtitle'); ?></p>
            <?php endif; ?>

            <?php if(get_field('hero_buttons')): ?>
                <div class="hero__buttons">
                    <?php foreach(get_field('hero_buttons') as $button): ?>
                        <a href="<?= $button['button_url']; ?>"
                           class="button button__<?= $button['button_style']; ?>">
                            <?= $button['button_text']; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
    </div>
    <?php if(get_field('hero_image')): ?>
        <div class="hero__image">
            <?= wp_get_attachment_image(get_field('hero_image'), 'full'); ?>
        </div>
    <?php endif; ?>
</section>