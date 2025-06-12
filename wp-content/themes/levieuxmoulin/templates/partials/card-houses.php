<article class="house__card">
    <?php if(get_field('image')): ?>
        <div class="house__card--image">
            <?= wp_get_attachment_image(get_field('image'), 'medium'); ?>
        </div>
    <?php endif; ?>

    <div class="card--content">
        <?php if($title = get_field('title')): ?>
            <h4 class="card--title"><?= $title; ?></h4>
        <?php endif; ?>

        <?php if($description = get_field('description')): ?>
            <div class="card--description">
                <?= $description; ?>
            </div>
        <?php endif; ?>
    </div>
</article>