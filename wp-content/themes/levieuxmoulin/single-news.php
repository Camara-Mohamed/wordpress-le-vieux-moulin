<?php get_header() ?>

    <main id="main-content" class="main__content" itemscope itemtype="https://schema.org/WebPage">
        <section class="news__hero">
            <div class="news__hero--content">
                <h2><?php the_title(); ?></h2>
                <time class="news__hero--date"><?php echo get_the_date(); ?></time>
                <p class="news__hero--content"><?php the_excerpt(); ?></p>
            </div>
            <div class="news__hero--image">
                <?php the_post_thumbnail('large', [
                    'loading'       => 'eager',
                    'fetchpriority' => 'high',
                    'sizes'         => '(max-width: 1019px) 100vw, 50vw',
                ]); ?>
            </div>
        </section>

        <?php if (get_field('gallery')) : ?>
            <section class="gallery">
                <h2 class="gallery__title">Galerie</h2>
                <div class="gallery__grid">
                    <?php
                    $images = get_field('gallery');
                    foreach ($images as $image) : ?>
                        <a href="<?php echo esc_url($image['url']); ?>"
                           title="Voir l'image en plus grand"
                           data-fancybox="gallery">
                            <?php echo wp_get_attachment_image($image['ID'], 'medium_large', false, [
                                'loading' => 'lazy',
                                'sizes'   => '(max-width: 599px) 100vw, (max-width: 1019px) calc(50vw - 1.5rem), 33vw',
                            ]); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>
    </main>

<?php get_footer() ?>