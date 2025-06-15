<?php get_header() ?>

    <main id="main-content" class="main__content">
        <section class="news__hero">
            <div class="news__hero--content">
                <h2><?php the_title(); ?></h2>
                <time class="news__hero--date"><?php echo get_the_date(); ?></time>
                <p class="news__hero--content"><?php the_excerpt(); ?></p>
            </div>
            <div class="news__hero--image">
                <?php the_post_thumbnail('large'); ?>
            </div>
        </section>

        <?php if (get_field('gallery')) : ?>
            <section class="gallery">
                <h2 class="gallery__title">Galerie</h2>
                <div class="gallery__grid">
                    <?php
                    $images = get_field('gallery');
                    foreach ($images as $image) : ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>
    </main>

<?php get_footer() ?>